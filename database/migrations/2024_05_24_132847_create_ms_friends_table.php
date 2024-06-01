<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_friends', function (Blueprint $table) {
            $table->id('FriendListID');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->foreignId('FriendID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->string('Status', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_friends');
    }
};
