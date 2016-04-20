<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GameEndController extends Controller
{
    public function index()
    {
        return view('gameend');
    }
}