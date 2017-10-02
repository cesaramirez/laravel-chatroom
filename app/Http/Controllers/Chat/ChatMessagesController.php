<?php

namespace App\Http\Controllers\Chat;

use App\Events\Chat\MessageCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Chat\Message;

class ChatMessagesController extends Controller
{
    /**
     * Index chat messages.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $messages = Message::with('user')->latest()->limit(100)->get();

        return response()->json($messages, 200);
    }

    /**
     * Store messages from chat.
     *
     * @param \App\Http\Requests\StoreMessageRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreMessageRequest $request)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body,
        ]);

        broadcast(new MessageCreated($message))->toOthers();

        return response()->json($message, 200);
    }
}
