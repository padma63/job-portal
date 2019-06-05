<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;

class CompanyController extends Controller
{
    public function index($id, Company $company){
        return view('company.index',compact('company'));
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'address' => 'required',
            'phone' => 'required|min:10|numeric',
            'website' => 'required|min:10',
            'slogan' => 'required|min:10',
            'description' => 'required|max:200',
        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone' => request('phone'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description'),
        ]);
        return redirect()->back()->with('message', 'Profile Successfully Updated!');

    }

    public function companylogo(Request $request){
        $this->validate($request,[
            'logo' => 'required|mimes:png,jpeg,jpg|max:20000',
        ]);
        $user_id = Auth::user()->id;
        if($request->hasfile('logo')){
            
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/logo/',$fileName);
            Company::where('user_id', $user_id)->update(['logo' => $fileName]);
            return redirect()->back()->with('message', 'Your Company logo updated successfully');
        }
    }

    public function coverphoto(Request $request){
        $this->validate($request,[
            'cover_photo' => 'required|mimes:png,jpg,jpeg|max:20000',
        ]);
        $user_id = Auth::user()->id;
        if($request->hasfile('cover_photo')){
            
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('uploads/coverphoto/',$fileName);
            Company::where('user_id', $user_id)->update(['cover_photo' => $fileName]);
            return redirect()->back()->with('message', 'Your Company Cover Photo updated successfully');
        }
    }
}
