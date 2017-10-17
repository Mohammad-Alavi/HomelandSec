@extends('layouts.master')
@section('title', 'Home');
@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <a href="{{ url('/') }}">HomelandSec</a>
                </div>
                <div id="log-title">
                    <a href="{{ url('/log') }}">Show Logs</a>
                </div>
                <a id="upload" href="#">Upload</a>
                @if (!empty($file))
                <div id=fileinfo>
                    <p id=filetitle>File Info</p>
                    {{--<p class="pretext">File Name: </p>--}}
                    {{--<p>{{ $file->getClientOriginalName() }}</p>--}}
                    {{--<p class="pretext">File Extension: </p>--}}
                    {{--<p>{{ $file->getClientOriginalExtension() }}</p>--}}
                    {{--<p class="pretext">File Real Path: </p>--}}
                    {{--<p>{{ $file->getRealPath() }}</p>--}}
                    {{--<p class="pretext">File Size: </p>--}}
                    {{--<p>{{ $file->getSize() }}</p>--}}
                    {{--<p class="pretext">File Mime Type: </p>--}}
                    {{--<p>{{ $file->getMimeType() }}</p>  --}}
                    <p class="pretext">File Path: </p>
                    <p><a target="_blank" href={{ $path }}>{{ $path }}</a></p>
                </div>
                @endif

                <div class="form">
                    <div>
                            {{ Form::open(array('url' => 'api/store','files'=>'true')) }}
                    </div>
                    <div>
                            {{'Select the file to upload.'}}
                    </div>
                    <div>
                            {{ Form::file('file') }}
                    </div>
                    <div id="submit">
                            {{ Form::submit('Upload File') }}
                    </div>
                    {{ Form::token() }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
@endsection 

