<?php

namespace App\Http\Controllers;

use App\Models\ApplyJob;
use App\Models\Job;
use App\Models\Rating;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $jobs = [];
        $user = Auth::user()->id;
        $profiles = Profile::where('user_id', $user)->get();
        $regions = Region::all();
        $datas = DB::table('jobs')
            ->join('regions', 'jobs.region_id', '=', 'regions.id')
            ->selectRaw('*, jobs.id as idjobs');
            $jobs = $datas->get();

        if ($request->region || $request->searchSp) {
            $queryJobOrProvince = $datas->where('JobCategory', 'like', '%' . $request->searchSp . '%')->get();
            $queryJobProvince = $datas->where('JobCategory', 'like', '%' . $request->searchSp . '%')->where('region_id',  $request->region)->get();

            if ($queryJobProvince->count() > 0) {
                $jobs = $queryJobProvince;
            } else {
                $jobs = $queryJobOrProvince;
            }
        }

        foreach ($profiles as $profile) {
            $region = $profile->region_id;
        }

        $recJobs = Job::where('region_id', $region)->paginate(4)->withQueryString();
        #$jobs = Job::orderBy('CompanyName')->paginate(4)->withQueryString();


        return view('/home', compact('request', 'jobs', 'recJobs', 'regions'));
    }

    public function adminHome()
    {
        $user = Auth::user()->id;
        $profiles = Profile::where('user_id',$user)->get();
        return view('admin.dashboard', compact('profiles'));
    }

    public function notification()
    {
        $user = Auth::user()->id;
        $jobs = Job::all();
        $pr = [];
        $messeges = Message::where('receiver', $user)->get();
        $applys = DB::table('jobs')->join('apply_jobs', 'jobs.id', '=', 'apply_jobs.job_id')->select('apply_jobs.id', 'apply_jobs.job_id', 'jobs.JobCategory', 'jobs.CompanyName', 'apply_jobs.status', 'jobs.region_id', 'jobs.Image')->where('apply_jobs.user_id', '=', $user)->get();
        $notifications = DB::table('jobs')->join('apply_jobs', 'jobs.id', '=', 'apply_jobs.job_id')->join('users', 'users.id', '=', 'apply_jobs.user_id')->select('apply_jobs.id', 'apply_jobs.user_id', 'apply_jobs.status', 'jobs.JobCategory', 'jobs.CompanyName', 'jobs.region_id', 'jobs.Image', 'users.name', 'users.email')->where('jobs.user_id', '=', $user)->get();
        if ($messeges->count() > 0) {
            foreach ($messeges as $messege) {
                #$jobs = Job::where('id',$messege->Company_id)->get();
                #foreach($jobs as $job)
                #{
                #$test = [
                #'CompanyName' => $job->CompanyName,
                #'Image' => $job->Image
                #];
                #array_push($pr,$test);

                #}

            }
            return view('/notifications', compact('messeges', 'jobs', 'notifications', 'applys'));
        } else {
            $messages = null;
            return view('/notifications', compact('messeges', 'notifications', 'applys'));
        }
    }

    public function notification_detail($notification)
    {
        $applys = ApplyJob::where('id', $notification)->get();

        foreach ($applys as $apply) {
            $user = $apply->user_id;
        }

        $profiles = Profile::where('user_id', $user)->get();

        return view('/notification_detail', compact('profiles', 'applys'));
    }

    public function message(ApplyJob $apply, Request $request)
    {
        $message = new Message();
        $message->receiver = $apply->user_id;
        $message->Company_id = $apply->job_id;
        $message->status = "Pending";
        $message->comment = $request->description;

        $message->save();

        ApplyJob::destroy($apply->id);

        return redirect('/notifications')->with('success', 'Your message has been send');
    }

    public function accept(Request $request)
    {
        $message = new Message();
        $message->receiver = Message::find($request->id)->from;
        $message->from = auth()->user()->id;
        $message->Company_id = $request->Company_id;
        $message->status = "Accepted";
        $message->comment = $request->comment;
        $message->date = $request->date;


        $ApplyJob = new ApplyJob();

        $ApplyJob->user_id =  Message::find($request->id)->from;
        $ApplyJob->job_id = $request->Company_id;

        $ApplyJob->save();

        $message->save();
        Message::destroy($request->id);

        return redirect('/notifications')->with('success', 'Your message has been send');
    }

    public function message_accept(Request $request)
    {
        $message = new Message();
        $message->receiver = Job::find($request->id)->user_id;
        $message->from = auth()->user()->id;
        $message->Company_id = $request->id;
        $message->status = "Applied";
        $message->comment = 'Works has been applied';
        $message->date = $request->date;

        $message->save();

        Message::destroy($request->id);

        return redirect('/notifications')->with('success', 'Your message has been send');
    }

    public function accepts(Request $request)
    {
        $message = new Message();
        $message->receiver = Message::find($request->id)->from;
        $message->from = auth()->user()->id;
        $message->Company_id = $request->Company_id;
        $message->status = "Interview";
        $message->comment = $request->description ? $request->description : 'Selamat anda berhasil lolos seleksi pertama';
        $message->date = $request->date;

        $message->save();

        Message::destroy($request->id);

        return redirect('/notifications')->with('success', 'Your message has been send');
    }

    public function request(Request $request)
    {
        $message = new Message();
        $message->receiver = Message::find($request->id)->from;
        $message->from = auth()->user()->id;
        $message->Company_id = $request->Company_id;
        $message->status = "Waiting";
        $message->comment = $request->description ? $request->description : 'Selamat anda berhasil lolos seleksi pertama';
        $message->date = Message::find($request->id)->date;
        $message->request_date = $request->date;

        $message->save();

        Message::destroy($request->id);

        return redirect('/notifications')->with('success', 'Your message has been send');
    }

    public function reject(ApplyJob $apply)
    {
        $jobs = Job::where('id', $apply->job_id)->get();

        foreach ($jobs as $job) {
            $CompanyName = $job->CompanyName;
        }

        $message = new Message();
        $message->receiver = $apply->user_id;
        $message->Company_id = $apply->job_id;
        $message->status = "Rejected";
        $message->comment = "Rejected by $CompanyName";

        $message->save();


        ApplyJob::destroy($apply->id);

        return redirect('/notifications')->with('success', 'Your message has been send');
    }

    public function postStar (Request $request, Job $job) {
        $rating = new Rating;
        $rating->user_id = Auth::id();
        $rating->rating = $request->input('star');
        $job->ratings()->save($rating);
        return redirect()->back()->with('success', 'Job has been rated');
  }
}
