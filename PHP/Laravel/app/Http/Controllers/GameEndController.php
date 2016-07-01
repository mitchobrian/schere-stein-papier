<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;



use Illuminate\Support\Facades\Input;

use App\users;
use App\games;
use DB;
use App\match;



class GameEndController extends Controller
{
    public function index(Request $request)
    {
        
        $userid = input::get('id');

        $user = DB::table('users')
            ->where('id', $userid)
            ->first();

        $game = DB::table('Games')

            ->where('user_a_id', $user->id)
            ->first();

        if ($game) {
            $r1 = DB::table('match')
                ->where('gamecode', $user->gamecode)
                ->where('winner', '<', 1)
                ->first();

            $r2 = DB::table('match')
                ->where('gamecode', $user->gamecode)
                ->where('winner', '<', 1)
                ->first();

            $choice = $r1->user_a_decision;
            $p2choice = $r2->user_b_decision;
        }
        else {
            $r1 = DB::table('match')
                ->select('user_b_decision')
                ->where('gamecode', $user->gamecode)
                ->where('winner', '<', 1)
                ->first();

            $r2 = DB::table('match')
                ->select('user_a_decision')
                ->where('gamecode', $user->gamecode)
                ->where('winner', '<', 1)
                ->first();
            $choice = $r1->user_b_decision;
            $p2choice = $r2->user_a_decision;
        }
        
        
        return view('gameend', compact('choice', 'p2choice'));
    }
}