<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_videos', function (Blueprint $table) {
            $table->id('VideoID');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->text('VideoImage');
            $table->text('VideoLinkEmbedded');
            $table->string('Title', 255);
            $table->text('Description');
            $table->time('PostTime');
            $table->integer('Views')->default(0);
            $table->integer('Like')->default(0);
            $table->integer('Dislike')->default(0);
            $table->string('VideoType', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_videos');
    }
};
