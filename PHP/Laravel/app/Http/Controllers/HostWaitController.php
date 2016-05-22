<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class HostWaitController extends Controller
{
    public function index()
    {
        return view('hostwait');
    }
}