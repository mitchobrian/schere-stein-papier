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
            $match = DB::table('match')
                ->where('gamecode', $user->gamecode)
                ->where('winner', '<', 1)
                ->first();

            $choice = $match->user_a_decision;
            $p2choice = $match->user_b_decision;

            $player1 = $match->user_a_name;
            $player2 = $match->user_b_name;

            $hoster = true;
        }
        else {
            $match = DB::table('match')
                ->where('gamecode', $user->gamecode)
                ->where('winner', '<', 1)
                ->first();

            $choice = $match->user_b_decision;
            $p2choice = $match->user_a_decision;

            $player1 = $match->user_b_name;
            $player2 = $match->user_a_name;

            $hoster = false;
        }
        
        
        return view('gameend', compact('choice', 'p2choice', 'match', 'player1', 'player2', 'hoster'));
    }

    public function insertmatchwinner() {
        $match_id = $this->fetch(user_id);
        $winner = $this->fetch(winner);
        var_dump($match_id);
        var_dump($winner);

        if ($winner == 1) {
            DB::table('match')
                ->where('id', $match_id)
                ->update(array('winner' => 1));
        }
        else if($winner == 2) {
            DB::table('match')
                ->where('id', $match_id)
                ->update(array('winner' => 2));
        }
        else {
                DB::table('match')
                    ->where('id', $match_id)
                    ->update(array('winner' => 3));
        }

    }

    protected function fetch($name)
    {
        $val = isset($_GET[$name]) ? $_GET[$name] : '';
        return $val;
    }

    protected function output($result, $output, $message = null, $latest = null)
    {
        echo json_encode(array(
            'result' => $result,
            'message' => $message,
            'output' => $output,
            'latest' => $latest
        ));
    }
}