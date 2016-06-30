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

        $users = new Users;
        $users->username = input::get("name");
        $users->gamecode = $randomString;
        $users->save();

        Session::flush();

        Session::put('username', $users->username);
        Session::put('id', $users->id);
        Session::put('gamecode', $users->gamecode);
        Session::put('ishost', '1');



        //Abfragen ob es den Code schon gibt!!!!
        //extra Tabelle gamecode???


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
                $joinusers = new Users;
                $joinusers->username = input::get("name");
                $joinusers->gamecode = $gamecode;
                $joinusers->save();

                //Erstellt Datensatz Game in Games Tabelle
                $newgame = new Games;
                $newgame->gamecode = input::get("code");
                $newgame->user_a_id = $users->id;  // DAS KLAPPT NICHT
                $newgame->user_b_id = $joinusers->id;
                $newgame->user_b_name = $joinusers->username;
                $newgame->save();

                //Session Daten löschen
                Session::flush();

                //User Daten neu in die Session einfügen
                Session::put('username', $users->username);
                Session::put('id', $users->id);
                Session::put('gamecode', $users->gamecode);
                Session::put('ishost', '0');

                return view("gamepage", compact('newgame'));
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
        $results = DB::table('Users')
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
        return view('gamepage');
    }
    
    public function insertselection() {
        
        $selection = $this->fetch('selection');
        var_dump($selection);

        $result = DB::table('match')
            ->select('gamecode')
            ->where('gamecode', Session::get('gamecode'))
            ->first();
        if($result) {
            if(Session::get('ishost') == '1') {
                DB::table('match')
                    ->where('gamecode', Session::get('gamecode'))
                    ->where('winner', '<', 0)
                    ->update(array('user_a_id' => Session::get('id')))
                    ->update(array('user_a_name' => Session::get('username')))
                    ->update(array('user_a_decision' => $selection));
            }
            else {
                DB::table('match')
                    ->where('gamecode', Session::get('gamecode'))
                    ->where('winner', '<', 0)
                    ->update(array('user_b_id' => Session::get('id')))
                    ->update(array('user_b_name' => Session::get('username')))
                    ->update(array('user_b_decision' => $selection));
            }
        }
        else {
            $match = new match();
            $match->gamecode = Session::get('gamecode');

            if(Session::get('ishost') == '1') {

                $match->user_a_id = Session::get('id');
                $match->user_a_name = Session::get('username');
                $match->user_a_decision = $selection;

            }
            else {
                $match->user_b_id = Session::get('id');
                $match->user_b_name = Session::get('username');
                $match->user_b_decision = $selection;
            }
            $match->save();
        }
        return view('gamepage');
    }

    public function gamepolling() {

        if(Session::get('ishost') == '1') {
            $results = DB::table('match')
                ->select('user_b_decision', 'gamecode', 'winner')
                ->where('winner', '<', 0)
                ->where('gamecode', session::get('gamecode'))
                ->where('user_b_decision', 'not like', "0")
                ->first();

        }
        else {
            $results = DB::table('match')
                ->select('user_a_decision', 'gamecode', 'winner')
                ->where('winner', '<', 0)
                ->where('gamecode', session::get('gamecode'))
                ->where('user_a_decision', 'not like', "0")
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
