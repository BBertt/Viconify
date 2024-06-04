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
            $table->foreignId('ReceiverID')->constrained('ms_users', 'UserID')->onDelete('cascade'); // Corrected spelling
            $table->foreignId('SenderID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->text('message');
            $table->string('Status', 255)->default('unread');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_messages');
    }
};
