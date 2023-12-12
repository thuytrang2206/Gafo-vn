<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slidebar;

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
 
        //  $fileUpload = new Slidebar;
 
        //  if($request->file()) {
        //      $file_name = time().'_'.$request->file->getClientOriginalName();
        //      $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');
 
        //      $fileUpload->title = <title></title>
        //      $fileUpload->pathimage = '/storage/' . $file_path;
        //      $fileUpload->save();
 
        //      return response()->json($fileUpload);
        //  }
        $fileUpload =  Slidebar ::create([
            'title'     => $request->input('title'),
            // 'Describes'=>$request->input('Describes'),
        ]);;
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
        //
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
