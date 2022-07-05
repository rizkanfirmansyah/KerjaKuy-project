<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Region;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function Logout(){
        Auth::logout();
        return redirect('/');
    }

    public function profile_after_login(){
        $user = Auth::user()->id;
        $profiles = Profile::where('user_id',$user)->get();
        $id = Auth::user()->id;
        $user = User:: where('id','=', $id)->first();
        $regions = Region::all();

        return view('/profile_after_login',compact('user','regions','profiles'));
    }

    public function profile()
    {
        $user = Auth::user()->id;
        $profiles = Profile::where('user_id',$user)->get();
        $id = Auth::user()->id;
        $user = User:: where('id','=', $id)->first();
        $regions = Region::all();
        if($profiles->count() == 0)
        {
            return view('/profile_after_login',compact('user','regions','profiles'));
        }else{
            return view('/profile',compact('user','regions','profiles'));
        }
    }

    public function Update_profile($id)
    {
        $regions = Region::all();
        $profile = Profile::find($id);
        return view('/Update_profile',compact('profile','regions'));
    }

    public function Update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $userName = Auth::user()->name;
        $userEmail = Auth::user()->email;
        $request->validate([
            'fullName' => 'required',
            'region' => 'required',
            'PhoneNumber' => 'required',
            'CVLink' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'username' => $userName,
            'full_name' => $request->fullName,
            'email' => $userEmail,
            'phone_number' => $request->PhoneNumber,
            'attachment' => $request->CVLink,
            'user_id' => $user,
            'region_id' => $request->region
        ];

        if ($request->image) {
            $image = $request->image;
            $imageName = date('HiSd') . '-' . $image->getClientOriginalName();
            $data['image'] = $imageName;
            $image->move(public_path().'/image', $imageName);
        }
        Profile::find($id)
            ->update($data);

            return redirect('profile')->with('success', 'Your data has been updated');
    }

    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $userName = Auth::user()->name;
        $userEmail = Auth::user()->email;

        $image = $request->image;
        $imageName = $image->getClientOriginalName();

        $profile = new Profile();

        $profile->username = $userName;
        $profile->full_name = $request->fullName;
        $profile->email = $userEmail;
        $profile->phone_number = $request->PhoneNumber;
        $profile->image = $imageName;
        $profile->attachment = $request->CVLink;
        $profile->user_id = $user;
        $profile->region_id = $request->region;

        $image->move(public_path().'/image', $imageName);
        $profile->save();

        return redirect('profile');
    }

    public function show_user()
    {
        $profiles = Profile::where('role','user')->get();
        return view('admin/users/user',compact('profiles'));
    }
    
    public function show_user_detail($id)
    {
        $profiles = Profile::where('user_id',$id)->get();
        $jobs = Job::where('user_id',$id)->get();
        return view('admin/users/userDetail',compact('profiles','jobs'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }

        return redirect()->back()->with('success', 'Your data has been deleted');
    }


}
