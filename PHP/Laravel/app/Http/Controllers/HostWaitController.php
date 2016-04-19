<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HostWaitController extends Controller
{
    public function index()
    {
        return view('hostwait');
    }
}
