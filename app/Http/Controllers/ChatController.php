<?php

namespace App\Http\Controllers;

use App\Models\Chat\ChatMessages;
use App\Models\Chat\ChatRooms;
use App\Models\Chat\ChatRoomsMembers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($id = null)
    {
        $userId = Auth::id();

        if($id){
            if(User::where('id', $id)->exists()){
                $user = User::find($id);

                $chatRoom = ChatRooms::firstOrCreate([
                    'title' => $userId . '-' . $id
                ]);

                ChatRoomsMembers::create([
                    'chat_room_id' => $chatRoom->id, 'user_id' => $userId
                ]);

                $messages = ChatMessages::where('chat_room_id', $chatRoom)->get();
                return view('chat.index', ['room_id' => $chatRoom->id, 'messages' => $messages]);
            }
        } else {
            $chatRoomId = ChatRooms::firstOrCreate(
                ['title' => 'Test']
            )->id;

            if (!ChatRoomsMembers::where('user_id', $userId)
                ->where('chat_room_id', $chatRoomId)->exists()) {
                ChatRoomsMembers::create([
                    'user_id' => $userId,
                    'chat_room_id' => $chatRoomId
                ]);
            }

            $messages = ChatMessages::where('chat_room_id', $chatRoomId)->get();

            return view('chat.index', ['room_id' => $chatRoomId, 'messages' => $messages]);
        }

        //ToDO
        /**
         * 1. По айди в адресе получить юзера
         *
         * 2. Создавать или получать чат рум с названием -> user id - auth id
         *
         * 3. Получать все сообщения, и выводить их во вью
         */
    }

}
