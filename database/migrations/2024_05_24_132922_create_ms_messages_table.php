<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_messages', function (Blueprint $table) {
            $table->id('MessageID');
            $table->foreignId('FriendListID')->constrained('ms_friends', 'FriendListID')->onDelete('cascade');
            $table->foreignId('SenderID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->string('Status', 255);
            $table->time('CreatedAt');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_messages');
    }
};
