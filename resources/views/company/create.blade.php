@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-3">
            @if(empty(Auth::user()->company->logo))
                <img src="{{asset('logo/clogo.jpg')}}" alt="" width="100" style="width:100%;">
            @else
                <img src="{{asset('uploads/logo/')}}/{{Auth::user()->company->logo}}" alt="" width="100" style="width:100%;">
            @endif
            <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Update Logo</div>
                        <div class="card-body">
                            <input type="file"  name="logo"><br><br>
                            <button class="btn btn-success float-right" type="submit">Update</button>
                            @if($errors->has('logo'))
                                <div class="error" style="color:red;">{{$errors->first('logo')}}</div>
                            @endif
                        </div>
                </div>
            </form>
        </div>
        <div class="col-md-5">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Update Your Company Information</div>
                <form action="{{route('company.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address"
                            value="{{Auth::user()->company->address}}">
                            @if($errors->has('address'))
                            <div class="error" style="color:red;">{{$errors->first('address')}}</div>
                           @endif
                           
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone"
                            value="{{Auth::user()->company->phone}}">
                            @if($errors->has('phone'))
                            <div class="error" style="color:red;">{{$errors->first('phone')}}</div>
                           @endif
                           
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website"
                            value="{{Auth::user()->company->website}}">
                            @if($errors->has('website'))
                            <div class="error" style="color:red;">{{$errors->first('website')}}</div>
                           @endif
                           
                        </div>
                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <input type="text" class="form-control" name="slogan"
                            value="{{Auth::user()->company->slogan}}">
                            @if($errors->has('slogan'))
                            <div class="error" style="color:red;">{{$errors->first('slogan')}}</div>
                           @endif
                           
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description">{{Auth::user()->company->description}}</textarea>
                            @if($errors->has('description'))
                            <div class="error" style="color:red;">{{$errors->first('description')}}</div>
                           @endif
                           
                        </div>
                       
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </div>
                </form>              
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About your Company</div>
                <div class="card-body">
                    <p><strong>Company Name:</strong>&nbsp; {{Auth::user()->company->cname}} </p>
                    <p><strong>Address:</strong>&nbsp; {{Auth::user()->company->address}} </p>
                    <p><strong>Phone Number:</strong>&nbsp; {{Auth::user()->company->phone}} </p>
                    <p><strong>Website:</strong>&nbsp;<a href="{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a> </p>
                    <p><strong>Slogan:</strong>&nbsp; {{Auth::user()->company->slogan}} </p>
                    <p><strong>Company Page:</strong>&nbsp; <a href="company/{{Auth::user()->company->slug}}">View</a> </p>
                </div>
            </div>
            <br>
            <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Update Cover Photo</div>
                        <div class="card-body">
                            <input type="file"  name="cover_photo"><br><br>
                            <button class="btn btn-success float-right" type="submit">Update</button>
                            @if($errors->has('cover_photo'))
                                 <div class="error" style="color:red;">{{$errors->first('cover_photo')}}</div>
                            @endif
                        </div>
                    </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
