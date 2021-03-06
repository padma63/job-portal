<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use Auth;
use App\Http\Requests\JobPostRequest;

class JobsController extends Controller
{

    public function __construct(){

        $this->middleware('employer',['except' => array('index','show','apply')]);
    
    }
    public function index(){

        $jobs = Job::latest()->limit(10)
                    ->where('status',1)->get();
      //  $companies = Company::latest()->limit(12)->get();
          $companies = Company::get()->random(12);
        return view('welcome', compact('jobs','companies'));
    }

    public function create(){
        return view('jobs.create');
    }

   
    public function store(JobPostRequest $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;

        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'roles' => $request->roles,
            'category_id' => $request->category,
            'position' => $request->position,
            'address' => $request->address,
            'type' => $request->type,
            'status' => $request->status,
            'last_date' => $request->last_date,
        ]);
        return redirect()->back()->with('message', 'Job Created Successfully!');

    }

    public function show($id, Job $job){
        return view('jobs.show', compact('job'));
    }

    public function edit($id){
        $job = Job::findOrFail($id);
        return view('jobs.edit',compact('job'));
    }

    public function update(Request $request,$id){

       // dd(request()->all());
       $job = Job::findorFail($id);
       $job->update(request()->all());

       return redirect()->back()->with('message', 'Job Updated Successfully!');
    }
    

    public function myJob(){
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob',compact('jobs'));
    }

    public function apply(Request $request,$id){
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Application Sent!');
    }

    public function applicant(){
        $applicants = Job::has('users')
                        ->where('user_id',auth()->user()->id)
                        ->get();
        return view('jobs.applicants', compact('applicants'));
    }



}
