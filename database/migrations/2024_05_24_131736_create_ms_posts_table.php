<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_posts', function (Blueprint $table) {
            $table->id('PostID');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->string('Title', 255);
            $table->text('Description');
            $table->time('PostTime');
            $table->integer('Like')->default(0);
            $table->integer('Dislike')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_posts');
    }
};
