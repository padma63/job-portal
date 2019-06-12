@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            {{-- <thead>
                <th>Logo</th>
                <th>Position</th>
                <th>Address</th>
                <th>Date</th>
                <th></th>
            </thead> --}}
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="80"></td>
                    <td>Position: {{ $job->position }}
                        <br>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; {{ $job->type }}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>
                    &nbsp;Address: {{ $job->address }}</td>
                    <td><i class="fa fa-globe" aria-hidden="true"></i>
                        &nbsp;Date:{{ $job->created_at->diffForHumans() }}</td>
                    <td><a href="{{ route('jobs.show', [$job->id, $job->slug])}}">
                            <button class="btn btn-success btn-sm">Apply</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <button type="button" class="btn btn-primary btn-lg btn-block">Browse all jobs</button>
        <br><br>
        <div class="container">
            <div class="row">
                @foreach($companies as $company)
                <div class="col-md-3">
                    <div class="card" style="width:18rem;">
                        <img src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="" width="80">
                        <h5 class="card-body">
                            <h5 class="card-title">{{$company->cname}}</h5>
                            <p class="card-text">
                                {{str_limit($company->description,20)}}
                            </p>
                            <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit Company</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
<style>
.fa{
    color: #4183D7;
}
</style>