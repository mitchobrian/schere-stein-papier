<?php

namespace App\Http\Controllers;

use App\users;
use App\games;
use DB;

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

            Session::flush();

            Session::put('username', $users->username);
            Session::put('id', $users->id);
            Session::put('gamecode', $users->gamecode);

            return view("gamepage", compact('newgame'));
        } else {
            return "gamecode existiert nicht";
        }
    }

    public function hostwaitpolling()
    {

        $gamecode = $this->fetch('gamecode');
        $host_id = $this->fetch('host_id');


        /*  $users = Users::all();



          foreach ($users as $user) {
              $result = strcmp($user->id, $host_id);
              if ($result == 0) {
                  $this->output(true, $user->id);
              }
          }
          $this->output(false, $users);*/

        /*$results = DB::table('Users')->select('*')
            ->where('gamecode', 'LIKE', $gamecode)
            ->get();

        if($results) {
            $this->output(true, $results->id);

        }
        else {
            $this->output(false, $results);

        }*/


        $results = DB::select(DB::raw("SELECT * FROM Users WHERE gamecode LIKE '$gamecode' AND id NOT LIKE $host_id"));
        if ($results) {
            $this->output(true, $gamecode);

        } else {
            $this->output(false, $gamecode);

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
