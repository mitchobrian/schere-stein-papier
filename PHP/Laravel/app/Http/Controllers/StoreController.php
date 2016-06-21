<?php

namespace App\Http\Controllers;

use App\users;
use App\games;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;


use Illuminate\Support\Facades\Input;

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
     * @param  \Illuminate\Http\Request  $request
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

        //Abfragen ob es den Code schon gibt!!!!
        //extra Tabelle gamecode???



        return view('hostwait', compact('users'));


    }

    public function joinstore(Request $request)
    {

        $gamecode = input::get("code");

        $id = input::get("id");
        $users = null;
        $users = DB::table('users')
            ->select(DB::raw('*'))
            ->where('gamecode', 'LIKE', $gamecode)
            ->get();

        if($users) {

            $joinusers = new Users;
            $joinusers->username = input::get("name");
            $joinusers->gamecode = $gamecode;
            $joinusers->save();






            return "erstellt";
        } else {
            return $users;
        }







        //return view('gamepage', compact('code'));

    }

    public function hostwaitpolling()
    {
        $endtime = time() + 3;

        $gamecode = $this->fetch('gamecode');
        $host_id = $this->fetch('host_id');

        $users = Users::all();

        foreach ($users as $user) {
            if ($user->id == $host_id) {
                $this->output(true, $user->id);
            }
        }
        $this->output(false, $user->id);

    }

    protected function fetch($name)
    {
        $val = isset($_POST[$name]) ? $_POST[$name] : '';
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
