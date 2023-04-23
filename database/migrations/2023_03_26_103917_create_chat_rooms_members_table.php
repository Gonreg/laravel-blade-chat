<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_rooms_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_room_id')
                ->nullable();
            $table->foreign('chat_room_id')
                ->on('chat_rooms')
                ->references('id')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_rooms_members');
    }
};
