<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\users;
use App\games;

use App\Http\Requests;

class testcontroller extends Controller
{

    public function test()
    {
        $users = new users;
        $users->username = "test";
        $users->save();

        return "$users->username";
    }
}
