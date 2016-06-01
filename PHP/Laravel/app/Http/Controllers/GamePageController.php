<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;

class GamePageController extends Controller
{
    public function index()
    {
        return view('gamepage');
    }

    public function gamestart(Request $request) {


        return view('gamepage', $request->websocket);

    }
}