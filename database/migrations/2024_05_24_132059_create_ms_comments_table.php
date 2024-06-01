<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_comments', function (Blueprint $table) {
            $table->id('CommentID');
            $table->foreignId('PostID')->nullable()->constrained('ms_posts', 'PostID')->onDelete('cascade');
            $table->foreignId('VideoID')->nullable()->constrained('ms_videos', 'VideoID')->onDelete('cascade');
            $table->foreignId('ForumID')->nullable()->constrained('ms_forums', 'ForumID')->onDelete('cascade');
            $table->foreignId('CommentParentID')->nullable()->constrained('ms_comments', 'CommentID')->onDelete('cascade');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->text('Comments');
            $table->integer('Like')->default(0);
            $table->integer('Dislike')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_comments');
    }
};
