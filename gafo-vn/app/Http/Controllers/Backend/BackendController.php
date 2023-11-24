<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class BackendController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.dashboard.index');
    }
}
