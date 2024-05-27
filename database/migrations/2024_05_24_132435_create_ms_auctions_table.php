<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_auctions', function (Blueprint $table) {
            $table->id('AuctionID');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->string('AuctionProductName', 255);
            $table->integer('AuctionProductStartPrice');
            $table->integer('AuctionProductEndPrice');
            $table->text('AuctionProductDescription');
            $table->time('AuctionProductEndTime');
            $table->integer('AuctionTopBid')->default(0);
            $table->foreignId('AuctionTopBidUserID')->nullable()->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_auctions');
    }
};
