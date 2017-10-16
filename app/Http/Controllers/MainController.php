<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function upload(Request $request)
    {
        $file = $request->file('result');
        // $file = $request->input('Name');
        //Move Uploaded File
        //$destinationPath = 'uploads';
        //$file->move($destinationPath,$file->getClientOriginalName());
        
        $file->move(public_path('storage/results'),
            $file . ".txt"//.$file->getClientOriginalExtension())
        );

        $response = [
            'msg'               => 'Upload successfull',
        ];

        return $response;
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        //Move Uploaded File
        //$destinationPath = 'uploads';
        //$file->move($destinationPath,$file->getClientOriginalName());
        
        $path = $file->move(public_path('storage/upload'),
            //date("Y.m.d.H.i.s".".".$file->getClientOriginalExtension()
            'remotecommand.'.$file->getClientOriginalExtension()
        );
        return view('home', compact('file', 'path'));
    }

    public function download()
    {
        $path = public_path('storage/upload/remotecommand.ps1');
        return response()->download($path);
    }
}
