<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoomsMembers extends Model
{
    use HasFactory;

    protected $table = 'chat_rooms_members';

    protected $primaryKey = 'id';

    protected $fillable = [
        'chat_room_id',
        'user_id'
    ];
}
