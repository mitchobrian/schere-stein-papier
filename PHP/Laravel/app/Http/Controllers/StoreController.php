<?php

namespace App\Http\Controllers;

use App\users;
use App\games;
use DB;
use App\match;

use Illuminate\Http\Request;

use App\Http\Requests;


use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Session;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Http\Controllers\ChatController;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $users = new users;
        $users->username = input::get("name");
        $users->gamecode = $randomString;
        $users->save();
        
        Session::put('id', $users->id);
        Session::put('gamecode', $users->gamecode);
        Session::put('ishost', 1);
        Session::put('username', $users->username);
        
        return view('hostwait', compact('users'));

    }

    public function joinstore(Request $request)
    {

        $gamecode = input::get("code");
        $users = null;

        $users = DB::table('users')->select('username', 'id', 'gamecode')->where('gamecode', $gamecode)->first();

        if ($users) {

            $checkgame = DB::table('games')
                ->select('gamecode')
                ->where('gamecode', $gamecode)
                ->first();

            if (!$checkgame) {

                //Erstellt Datensatz User in Users Tabelle
                $joinusers = new users;
                $joinusers->username = input::get("name");
                $joinusers->gamecode = $gamecode;
                $joinusers->save();
                
                //Schreibe User in Session
                Session::put('id', $users->id);
                Session::put('gamecode', $users->gamecode);
                Session::put('ishost', 0);
                Session::put('username', $users->username);

                //Erstellt Datensatz Game in games Tabelle
                $newgame = new games;
                $newgame->gamecode = input::get("code");
                $newgame->f_user_a_id = $users->id;
                $newgame->f_user_b_id = $joinusers->id;
                $newgame->save();

                $id = $joinusers->id;

                
                
                

                return view("gamepage", compact('newgame', 'id'));
            }
            else {
                return "Spiel gibt es schon";
            }

        } else {
            return "gamecode existiert nicht";
        }
    }

    public function hostwaitpolling()
    {
        sleep(1);
        $gamecode = $this->fetch('gamecode');
        $host_id = $this->fetch('host_id');
        $results = DB::table('users')
            ->select('gamecode', 'id')
            ->where('gamecode', $gamecode)
            ->where('id', 'not like', $host_id)
            ->first();
        if ($results) {
            $this->output(true, $gamecode);
        } else {
            $this->output(false, $gamecode);
        }
    }

    public function hostgamepage(Request $request) {


        $id = input::get('id');

        $newgame = DB::table('games')

            ->where('f_user_a_id', $id)
            ->first();
        
        $ishost = session::get('ishost');

        return view('gamepage', compact('newgame', 'id'));
    }
    
    public function insertselection() {
        
        $selection = $this->fetch('selection');
        $gameid = $this->fetch('gameid');


        $result = DB::table('match')
            ->join('games', 'match.f_game_id' , '=', 'games.id')
            ->select('games.gamecode')
            ->where('games.gamecode', Session::get('gamecode'))
            ->where('match.winner', '=', 0)
            ->first();

        var_dump($result);
        


        if($result) {
            if(Session::get('ishost') == 1) {
                
                DB::table('match')
                    ->join('games', 'match.f_game_id' , '=', 'games.id')
                    ->where('games.gamecode', Session::get('gamecode'))
                    ->where('match.winner', '<', 1)
                    ->update(array('user_a_decision' =>$selection));
            }
            else {
                DB::table('match')
                    ->join('games', 'match.f_game_id' , '=', 'games.id')
                    ->where('games.gamecode', Session::get('gamecode'))
                    ->where('match.winner', '<', 1)
                    ->update(array('user_b_decision' =>$selection));
            }
        }
        else {
           
        }

    }

    public function gamepolling() {

        if(Session::get('ishost') == 1) {
            $results = DB::table('match')
                ->join('games', 'match.f_game_id' , '=', 'games.id')
                ->select('match.user_b_decision', 'games.gamecode', 'match.winner')
                ->where('match.winner', '<', 1)
                ->where('games.gamecode', Session::get('gamecode'))
                ->where('match.user_b_decision', 'not like', "0")
                ->first();

        }
        else {
            $results = DB::table('match')
                ->join('games', 'match.f_game_id' , '=', 'games.id')
                ->select('match.user_a_decision', 'games.gamecode', 'match.winner')
                ->where('match.winner', '<', 1)
                ->where('games.gamecode', Session::get('gamecode'))
                ->where('match.user_a_decision', 'not like', "0")
                ->first();

        }

        if ($results) {
            $this->output(true, "ja");
        } else {
            $this->output(false, "nein");
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
