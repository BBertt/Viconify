<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_forums', function (Blueprint $table) {
            $table->id('ForumID');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->string('ForumTitle', 255);
            $table->text('Description');
            $table->time('CreatedDate');
            $table->integer('UpVote')->default(0);
            $table->integer('DownVote')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_forums');
    }
};
