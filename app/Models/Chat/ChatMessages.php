<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    use HasFactory;

    protected $table = 'chat_messages';

    protected $primaryKey = 'id';

    protected $fillable = [
        'chat_room_id',
        'user_id',
        'message_text'
    ];
}
