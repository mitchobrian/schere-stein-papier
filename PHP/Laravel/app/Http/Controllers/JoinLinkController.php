<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;



class JoinLinkController extends Controller
{
    public function index($gamecode = null) {
        if($gamecode)
        {
            $users = DB::table('users')->select('username', 'id', 'gamecode')->where('gamecode', $gamecode)->first();
            
            if ($users) {
                $checkgame = DB::table('games')
                    ->select('gamecode')
                    ->where('gamecode', $gamecode)
                    ->first();

                if (!$checkgame) {
                    
                 return view('joinlinkpage', compact('gamecode'));
                }
                else {
                    return view('landingPage');
                }
            }
            else {
                return view('landingPage');
            }
        }
        return view('landingPage');

    }
}
