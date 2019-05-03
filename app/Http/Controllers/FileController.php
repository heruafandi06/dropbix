<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = File::where('user_id', Auth::user()->id)
                ->where('is_active',1)
                ->get();
        ;
        return view('file.list-file', ['file'=>$file]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file     = $request->file('file');
        $url       = "";
        if($file != null){
            $destinationPath    = 'file/';
            $name               = $file->getClientOriginalName();
            $move               = $file->move($destinationPath, $name);
            $url                = "{$name}";
            File::create([
                "user_id"    => Auth::user()->id,
                "name"       => $request->nama_file,
                "url"        => $url,
                'is_active'  => 1
            ]);
            return redirect()->route('list-file');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::where('user_id', Auth::user()->id)
                ->where('is_active',1)
                ->where('id', $id)
                ->first();
        ;

        if($file == NULL){
          return abort(404);
        }
        return view('file.detail-file', ['file'=>$file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->submit == "update"){
          $file     = $request->file('file');
          $url       = "";
          if($file != null){
              $destinationPath    = 'file/';
              $name               = $file->getClientOriginalName();
              $move               = $file->move($destinationPath, $name);
              $url                = "{$name}";
          }

        File::where('is_active', 1)
        ->where('id', $id)
        ->update(['url' => $url, 'name' => $request->nama_file]);

        return redirect()->route('detail-file', ['id' => $id]);

        }else{
            File::where('is_active',1)
            ->where('id', $id)
            ->update(['is_active' => 0]);

            return redirect()->route('list-file');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
