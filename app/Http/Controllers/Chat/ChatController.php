<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    /**
     * Chat Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index chat
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat.index');
    }
}
