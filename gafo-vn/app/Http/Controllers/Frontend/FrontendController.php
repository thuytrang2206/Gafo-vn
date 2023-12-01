<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class FrontendController extends Controller
{
    //get index
    public function index(Request $request):View
    {
        return view('client.index');
    }

    
    public function about(Request  $request){
        return view('frontend/pages/about');
    }
    public function contact(Request  $request){
        return view('frontend/pages/contact');
    }
}
