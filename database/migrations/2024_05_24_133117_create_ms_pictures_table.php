<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_pictures', function (Blueprint $table) {
            $table->id('PictureID');
            $table->foreignId('PostID')->nullable()->constrained('ms_posts', 'PostID')->onDelete('cascade');
            $table->foreignId('ProductID')->nullable()->constrained('ms_products', 'ProductID')->onDelete('cascade');
            $table->foreignId('AuctionID')->nullable()->constrained('ms_auctions', 'AuctionID')->onDelete('cascade');
            $table->text('PictureData');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_pictures');
    }
};
