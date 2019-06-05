@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Update a job</div>
                <form action="{{route('job.update',[ $job->id])}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                        value="{{ $job->title }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid 
                        @enderror" >{{ $job->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <textarea name="roles" class="form-control @error('roles') is-invalid 
                        @enderror"> {{ $job->roles }}</textarea>
                        @error('roles')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach(App\Category::all() as $cat)
                                <option value="{{$cat->id}}"
                                    {{ $cat->id == $job->category_id ? 'selected' : ''}}>
                                    {{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" 
                        value="{{ $job->position }}">
                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" 
                        value="{{ $job->address }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select class="form-control" name="type">
                            <option value="fulltime"{{$job->type == 'fulltime'? 'selected' : ''}}>Fulltime</option>
                            <option value="partime"{{$job->type == 'partime'? 'selected' : ''}}>Partime</option>
                            <option value="casual"{{$job->type == 'casual'? 'selected' : ''}}>Casual</option>        
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" name="status">
                            <option value="1" {{$job->status == 1 ? 'selected' : ''}}>Live</option>
                            <option value="0" {{$job->status == 0 ? 'selected' : ''}}>Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lastdate">Last date</label>
                        <input type="text" id="datepicker" name="last_date" class="form-control @error('last_date') is-invalid @enderror" 
                        value="{{ $job->last_date }}">
                        @error('last_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark">Update</button>
                    </div>


                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
