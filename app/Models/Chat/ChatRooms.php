<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRooms extends Model
{
    use HasFactory;

    protected $table = 'chat_rooms';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title'
    ];
}
