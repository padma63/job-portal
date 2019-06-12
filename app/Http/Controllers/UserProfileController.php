<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Company;
use Auth;

class UserProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('seeker');
    }

    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){
        $this->validate($request,[
            'address' => 'required',
            'phone_number' => 'required|min:10|numeric',
            'experience' => 'required|min:20',
            'bio' => 'required|min:20',
        ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'experience' => request('experience'),
            'bio' => request('bio'),
        ]);
        return redirect()->back()->with('message', 'Profile Successfully Updated!');

    }

    public function coverletter(Request $request){
        $this->validate($request,[
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:20000',
        ]);
        $user_id = Auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update(['cover_letter' => $cover]);
        return redirect()->back()->with('message','Cover letter updated successfully');
    }

    public function resume(Request $request){
        $this->validate($request,[
            'resume' => 'required|mimes:pdf,doc,docx|max:20000',
        ]);
        $user_id = Auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update(['resume' => $resume]);
        return redirect()->back()->with('message','Your Resume updated successfully');
    }
    public function avatar(Request $request){
        $this->validate($request,[
            'avatar' => 'required|mimes:png,jpeg,jpg|max:20000',
        ]);
        $user_id = Auth::user()->id;
        if($request->hasfile('avatar')){
            
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/avatar/',$fileName);
            Profile::where('user_id', $user_id)->update(['avatar' => $fileName]);
            return redirect()->back()->with('message', 'Your Profile picture updated successfully');
        }
    }

    
}
