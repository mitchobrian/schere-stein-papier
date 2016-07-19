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

        $match = DB::table('match')
            ->select('match.id', 'user_a_decision', 'user_b_decision')
            ->join('Games', 'match.f_game_id' , '=', 'Games.id')
            ->where('Games.gamecode', Session::get('gamecode'))
            ->where('match.winner', '<', 1)
            ->first();





        if (Session::get('ishost')) {



            $choice = $match->user_a_decision;
            $p2choice = $match->user_b_decision;

        }
        else {
            

            $choice = $match->user_b_decision;
            $p2choice = $match->user_a_decision;

        }

        $ishost = session::get('ishost');
        
        return view('gameend', compact('choice', 'p2choice', 'match', 'ishost'));
    }

    public function insertmatchwinner() {
        $match_id = $this->fetch('match_id');
        $winner = $this->fetch('winner');
        var_dump($match_id);
        var_dump($winner);

            var_dump("beim ersten");
            DB::table('match')
                ->where('match.id','LIKE', $match_id)
                ->update(array('winner' => $winner));




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