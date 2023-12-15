<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slidebar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;

class SlidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function slidebar()
    {
        $result= DB::table('slidebar')->get();
        return response()->json($result);
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
        $image= $request->file;
        $extention=$request->file->getClientOriginalExtension();
        $name = time().'.'.$request->file->getClientOriginalName();
        Storage::disk('public')->put($name,File::get($image));
        $pathname="\uploads\\".''.$name;
        $fileUpload =  Slidebar ::create([
            'title'     => $request->input('title'),
            'pathimage' =>$pathname
        ]);
    return response()->json($fileUpload);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $slidebar = Slidebar::find($id);
        $slidebar->title =  $request->input('title');
        // Storage::disk('public')->delete($slidebar->file);
        if($request->file){
            // unlink("public/uploads/".$id->file);
            $image= $request->file;
        $extention=$request->file->getClientOriginalExtension();
        $name = time().'.'.$request->file->getClientOriginalName();
        Storage::disk('public')->put($name,File::get($image));
        $pathname="\uploads\\".''.$name;
        $slidebar->pathimage=$pathname;
        }
        $slidebar->save();
    
        return response([
            'slidebar' => $slidebar
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Slidebar::find($id);
        $image->delete();
        return response([
            'result' => 'success'
        ], 200);
    }
}
