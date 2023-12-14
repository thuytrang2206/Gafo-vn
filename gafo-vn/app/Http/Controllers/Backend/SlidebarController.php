<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slidebar;
use Illuminate\Support\Str;

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
        //  if($request->file()) {
            //   $file_name = time().'_'.$request->file('file')->getClientOriginalName();
            //   $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');
            $fileName = time().'.'.$request->file->getClientOriginalExtension();
            $file_path=  $request->file->move(public_path('uploads'), $fileName);
            $delimiter = 'public';
            $pathstr= Str::after($file_path, 'public');
            $fileUpload =  Slidebar ::create([
                'title'     => $request->input('title'),
                'pathimage' =>$pathstr
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
        // $fileName = time().'.'.$request->file('file')->getClientOriginalExtension();
         $file_path=  $request->file->move(public_path('uploads'), $request->pathimage);
        $delimiter = 'public';
        // $pathstr= Str::after($file_path, 'public');
        $slidebar->title =  $request->input('title');
        $slidebar->pathimage=$pathstr;
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
