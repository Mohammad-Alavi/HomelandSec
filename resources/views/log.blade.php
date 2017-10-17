@extends('layouts.master')
@section('title', 'Log')
@section('content')
    <div class="content">

    <div class="title m-b-md">
        <a href="{{ url('/') }}">HomelandSec</a>
    </div>
        <div>
        <h3 style="font-weight: bold; color: orangered">Log List</h3>
    </div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>System UUID</th>
            <th>Log Content</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $log)
        <tr>
            <td id="log-id">{{ $log->id }}</td>
            <td id="log-uuid">{{ $log->uuid }}</td>
            <td id="log-content"><a href="{{ url('api/dllog/'.$log->id) }}">Download Log</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $logs->links() !!}
    </div>
@endsection
