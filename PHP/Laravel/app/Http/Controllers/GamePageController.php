<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


use App\users;
use App\games;
use DB;
use App\match;

use App\Http\Requests;


use Illuminate\Support\Facades\Input;


class GamePageController extends Controller
{
    public function index()
    {
        return view('gamepage');
    }

    public function gamestart(Request $request) {

        $id = input::get('id');
        $code = input::get('code');

        $newgame = DB::table('Games')
            ->where('gamecode', $code)
            ->first();

            return view('gamepage', compact('newgame', 'id'));

    }
}