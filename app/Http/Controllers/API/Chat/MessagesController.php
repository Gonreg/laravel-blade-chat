<?php

namespace App\Http\Controllers\API\Chat;

use App\Events\Chat\NewMessage;
use App\Http\Controllers\Controller;
use App\Models\Chat\ChatMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function sendMessage(Request $request)
    {
        $userId = Auth::id();
        $chatRoomId = $request->chat_room_id;
        $messageText = $request->message_text;

        ChatMessages::create([
            'chat_room_id' => $chatRoomId,
            'user_id' => $userId,
            'message_text' => $messageText
        ]);

        broadcast(new NewMessage($messageText));

        return response()->json('Success');
    }
}
