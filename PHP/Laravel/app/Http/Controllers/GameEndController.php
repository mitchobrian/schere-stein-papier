<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GameEndController extends Controller
{
    public function index(Request $request)
    {
        $choice = $request->get('txtSel');
        return view('gameend',compact('choice'));
    }
}