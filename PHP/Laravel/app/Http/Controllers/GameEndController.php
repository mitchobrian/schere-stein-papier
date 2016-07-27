<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;



use Illuminate\Support\Facades\Input;


use Illuminate\Support\Facades\Session;

use App\users;
use App\games;
use DB;
use App\match;



class GameEndController extends Controller
{
    public function index(Request $request)
    {

        $userid = input::get('id');
        
        $enemyname = input::get('enemyname');

        $match = DB::table('match')
            ->select('match.id', 'user_a_decision', 'user_b_decision', 'f_game_id')
            ->join('games', 'match.f_game_id' , '=', 'games.id')
            ->where('games.gamecode', Session::get('gamecode'))
            ->where('match.winner', '<', 1)
            ->first();

        $game = DB::table('games')
            ->select('user_a_score', 'user_b_score')
            ->where('id', $match->f_game_id)
            ->first();

        if (Session::get('ishost')) {
            
            $user_a_score = $game->user_a_score;
            $user_b_score = $game->user_b_score;
            
            $choice = $match->user_a_decision;
            $p2choice = $match->user_b_decision;

        }
        else {
            $user_a_score = $game->user_b_score;
            $user_b_score = $game->user_a_score;

            $choice = $match->user_b_decision;
            $p2choice = $match->user_a_decision;

        }

        $ishost = session::get('ishost');


        switch ($choice) {
            case "Schere"://IF P1 CHOICE = SCHERE

                if ($p2choice == "Schere") {
                    $user_a_score++;
                    $user_b_score++;
                }

                if ($p2choice == "Papier") {
                    $user_a_score++;
                }

                if ($p2choice == "Stein") {
                    $user_b_score++;
                }
                break;

            case "Stein"://IF P1 CHOICE = STEIN

                if ($p2choice == "Stein") {
                    $user_a_score++;
                    $user_b_score++;

                }

                if ($p2choice == "Papier") {
                    $user_b_score++;

                }

                if ($p2choice == "Schere") {
                    $user_a_score++;

                }
                break;

            case "Papier": //IF P1 CHOICE = Papier

                if ($p2choice == "Papier") {
                    $user_a_score++;
                    $user_b_score++;

                }

                if ($p2choice == "Schere") {
                    $user_b_score++;

                }

                if ($p2choice == "Stein") {
                    $user_a_score++;

                }
                break;
        }






        
        return view('gameend', compact('choice', 'p2choice', 'match', 'ishost', 'enemyname', 'user_a_score', 'user_b_score'));
    }

    public function insertmatchwinner() {
        $match_id = $this->fetch('match_id');
        $winner = $this->fetch('winner');
        $game_id = $this->fetch('game_id');

            DB::table('match')
                ->where('match.id','LIKE', $match_id)
                ->update(array('winner' => $winner));
        
        if($winner == 1) {
            DB::table('games')
                ->where('id', $game_id)
                ->increment('user_a_score');
            
        }
        if ($winner == 2) {
            DB::table('games')
                ->where('id', $game_id)
                ->increment('user_b_score');
            
        }
        if ($winner == 3) {
            DB::table('games')
                ->where('id', $game_id)
                ->increment('user_a_score')
                ->increment('user_b_score');
            
        }


          

    }



 
    
    public function insertnochmaldecision() {
        $match_id = $this->fetch('match_id');

        if (Session::get('ishost')) {
            DB::table('match')
                ->where('id', $match_id)
                ->where('winner', '>', 0)
                ->update(array('nochmal_a' => 1));

        } else {
            DB::table('match')
                ->where('id', $match_id)
                ->where('winner', '>', 0)
                ->update(array('nochmal_b' => 1));

        }
            

        
    }
    
    public function nochmalspielen() {



        $matchid = $this->fetch('matchid');


        if (Session::get('ishost')) {
            $results = DB::table('match')
                ->where('id', $matchid)
                ->where('nochmal_b', '>', 0)
                ->first();
           

        } else {
            $results = DB::table('match')
                ->where('id', $matchid)
                ->where('nochmal_a', '>', 0)
                ->first();
        }
        
       
        if ($results) {
            $this->output(true, "");
        } else {
            $this->output(false, "");
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