<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


use App\users;
use App\games;
use DB;
use App\match;

use App\Http\Requests;


use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\Input;


class GamePageController extends Controller
{
    public function index()
    {
        return view('gamepage');
    }

    public function gamestart(Request $request) {

        $id = session::get('id');
        $code = session::get('gamecode');

        $newgame = DB::table('games')
            ->where('gamecode', $code)
            ->first();

    if(session::get('ishost') == 1) {
        $match = new match();

        $match->f_game_id = $newgame->id;
        $match->f_user_a_id = $newgame->f_user_a_id;
        $match->f_user_b_id = $newgame->f_user_b_id;
        $match->save();

        $user_a_score = $newgame->user_a_score;
        $user_b_score = $newgame->user_b_score;
    }
    else {
        $user_a_score = $newgame->user_b_score;
        $user_b_score = $newgame->user_a_score;

    }
        $playername = Session::get('username');


        $enemy = DB::table('users')
            ->select('username', 'id', 'gamecode')
            ->where('id', $newgame->f_user_b_id)
            ->first();

        $enemyname = $enemy->username;




        return view('gamepage', compact('newgame', 'id', 'enemyname', 'playername', 'user_b_score', 'user_a_score'));




    }
}