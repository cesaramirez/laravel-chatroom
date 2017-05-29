<?php

namespace App\Http\Controllers\Chat;

use App\Http\Requests\StoreMessageRequest;
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

    public function store(StoreMessageRequest $request)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body
        ]);

        return response()->json($message, 200);
    }
}
