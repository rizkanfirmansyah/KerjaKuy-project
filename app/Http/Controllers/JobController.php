<?php

namespace App\Http\Controllers;

use App\Models\ApplyJob;
use App\Models\Job;
use App\Models\Rating;
use App\Models\Profile;
use App\Models\Message;
use App\Models\Region;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        return view('AddJobs', compact('regions'));
    }

    public function jobs_list()
    {
        $jobs = Job::all();
        $jobs = Job::orderBy('CompanyName')->paginate(5)->withQueryString();
        return view('/jobs', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;

        $request->validate([
            'CompanyName' => 'required|unique:jobs',
            'JobCategory' => 'required|min:5|max:255',
            'description' => 'required',
            'Age' => 'required',
            'Gender' => 'required',
            'region' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $image = $request->image;
        $imageName = date('HiSd') . '-' . $image->getClientOriginalName();

        $job = new Job();
        $job->CompanyName = $request->CompanyName;
        $job->JobCategory = $request->JobCategory;
        $job->Description = $request->description;
        $job->Age = $request->Age;
        $job->Gender = $request->Gender;
        $job->Image = $imageName;
        $job->region_id = $request->region;
        $job->user_id = $user;

        $image->move(public_path() . '/images/JobsImage', $imageName);
        $job->save();

        return redirect()->back()->with('success', 'Your data has been added');
    }

    public function ShowJobDetail(Job $Job)
    {
        $user = Auth::user()->id;
        $applys = ApplyJob::where('user_id', $user)->where('job_id', $Job->id)->get();
        if ($applys->count() > 0) {
            foreach ($applys as $apply) {
                $apply_job = $apply->job_id;
            }
        } else {
            $apply_job = null;
        }
        return view('JobDetail', compact('Job', 'apply_job'));
    }

    public function ApplyJob(Job $job)
    {

        $user = Auth::user()->id;
        $ApplyJob = new ApplyJob();

        $ApplyJob->user_id = $user;
        $ApplyJob->job_id = $job->id;

        $ApplyJob->save();

        return redirect("/notifications");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showUpdate($id)
    {
        $regions = Region::all();
        $job = Job::find($id);
        return view('Update_job', compact('job', 'regions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function cancel(Request $request, $apply)
    {
        $message = new Message();
        $message->receiver = Message::find($request->id)->from;
        $message->from = auth()->user()->id;
        $message->Company_id = $request->Company_id;
        $message->status = "Rejected";
        $message->comment = "Anda belum lolos tahap interview";
        $message->date = $request->date;

        $message->save();

        Message::destroy($request->id);

        return redirect('/notifications')->with('success', 'Notification has been send');
        ApplyJob::destroy($apply);
        return redirect('notifications');
    }

    public function cancel_request(Request $request, $apply)
    {
        $message = new Message();
        $message->receiver = Message::find($request->id)->from;
        $message->from = auth()->user()->id;
        $message->Company_id = $request->Company_id;
        $message->status = "Request Cancelled";
        $message->comment = "Pengajuan Tanggal Interview belum diterima";
        $message->date = $request->date;
        $message->request_date = null;

        $message->save();

        Message::destroy($request->id);

        return redirect('/notifications')->with('success', 'Notification has been send');
    }

    public function accept_interview(Request $request)
    {
        $message = new Message();
        $message->receiver = Message::find($request->id)->from;
        $message->from = Message::find($request->id)->receiver;
        $message->Company_id = $request->Company_id;
        $message->status = "Interview Accepted";
        $message->comment = $request->comment;
        $message->date = $request->date;
        $message->request_date = null;

        $message->save();
        Message::destroy($request->id);

        return redirect('/notifications')->with('success', 'Notification has been send');
    }

    public function accepted(Request $request)
    {
        $message = new Message();
        $message->receiver = Message::find($request->id)->from;
        $message->from = Message::find($request->id)->receiver;
        $message->Company_id = $request->Company_id;
        $message->status = "Accepted";
        $message->comment = $request->comment;
        $message->date = $request->date;
        $message->request_date = null;


        $ApplyJob = new ApplyJob();

        $ApplyJob->user_id =  Message::find($request->id)->from;
        $ApplyJob->job_id = $request->id;


        $message->save();
        Message::destroy($request->id);
        $ApplyJob->save();

        return redirect('/notifications')->with('success', 'Notification has been send');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $request->validate([
            'CompanyName' => 'required|unique:jobs,CompanyName,' . $id,
            'JobCategory' => 'required|min:5|max:255',
            'description' => 'required',
            'Age' => 'required',
            'Gender' => 'required',
            'region' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'CompanyName' => $request->CompanyName,
            'JobCategory' => $request->JobCategory,
            'Description' => $request->description,
            'Age' => $request->Age,
            'Gender' => $request->Gender,
            'region_id' => $request->region,
            'user_id' => $user
        ];

        if ($request->image) {
            $image = $request->image;
            $imageName = date('HiSd') . '-' . $image->getClientOriginalName();
            $data['Image'] = $imageName;
            $image->move(public_path() . 'images/JobsImage/', $imageName);
        }

        Job::find($id)->update($data);

        return redirect('home')->with('success', 'Your data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);

        if ($job) {
            $job->delete();
        }

        return redirect()->back()->with('success', 'Your data has been deleted');
    }

    public function show_job()
    {
        $jobs = Job::all();
        return view('admin/jobs/job',compact('jobs'));
    }
    
    public function show_job_detail(Job $Job)
    {
        $user = Auth::user()->id;
        $applys = ApplyJob::where('user_id',$user)->where('job_id',$Job->id)->get();
        $profiles = Profile::where('user_id',$Job->user_id)->get();
        $ratings = Rating::where('job_id',$Job->id)->avg('rating');
        $cekMsg = Message::where('receiver',$user)->where('Company_id', $Job->id)->where('status', 'Accepted')->get();
        if($cekMsg->count() > 0)
        {
            foreach($cekMsg as $msg)
            {
                $rate = $msg->receiver;
            }    
        }else{
            $rate = null;
        }
        if($applys->count() > 0)
        {
            foreach($applys as $apply)
            {
                $apply_job = $apply->job_id;
            }    
        }else{
            $apply_job = null;
        }
        return view('JobDetail',compact('Job','apply_job','profiles','ratings', 'rate', 'cekMsg'));
    }

    public function show_job_detail_admin(Job $Job)
    {
        $user = Auth::user()->id;
        $applys = ApplyJob::where('user_id',$user)->where('job_id',$Job->id)->get();
        $profiles = Profile::where('user_id',$Job->user_id)->get();
        $ratings = Rating::where('job_id',$Job->id)->avg('rating');
        if($applys->count() > 0)
        {
            foreach($applys as $apply)
            {
                $apply_job = $apply->job_id;
            }    
        }else{
            $apply_job = null;
        }
        return view('admin/jobs/JobDetail',compact('Job','apply_job','profiles', 'ratings'));
    }

    public function myJob()
    {
        $user = Auth::user()->id;
        $jobs = Job::where('user_id',$user)->paginate(5)->withQueryString();

        if($jobs->count() < 1){
            $jobs = null;
        }

       return view('myJobs',compact('jobs'));
    }
}
