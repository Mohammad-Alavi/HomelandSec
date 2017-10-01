@extends('layouts.master')

@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <a href="https://homestead.app">HomelandSec</a>
                </div>

                <a id="upload" href="#">Upload</a>
                @if (!empty($file))
                <div id=fileinfo>
                    <p id=filetitle>File Info</p>
                    <p class="pretext">File Name: </p>
                    <p>{{ $file->getClientOriginalName() }}</p>
                    <p class="pretext">File Extension: </p>
                    <p>{{ $file->getClientOriginalExtension() }}</p>
                    <p class="pretext">File Real Path: </p>
                    <p>{{ $file->getRealPath() }}</p>
                    <p class="pretext">File Size: </p>
                    <p>{{ $file->getSize() }}</p>
                    <p class="pretext">File Mime Type: </p>
                    <p>{{ $file->getMimeType() }}</p>
                    <p class="pretext">File Path: </p>
                    <p><a target="blank">{{ $path }}</a></p>
                </div>
                @endif

                <div class="form">
                    <div>
                            {{ Form::open(array('url' => '/','files'=>'true')) }}
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

