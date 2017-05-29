<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chat\Message;

class ChatMessagesController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->limit(100)->get();
        return response()->json($messages, 200);
    }
}
