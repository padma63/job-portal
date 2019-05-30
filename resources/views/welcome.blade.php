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
                    <td><img src="{{asset('avatar/man.jpg')}}" width="70"></td>
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
@endsection
<style>
.fa{
    color: #4183D7;
}
</style>