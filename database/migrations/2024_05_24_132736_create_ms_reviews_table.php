<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_reviews', function (Blueprint $table) {
            $table->id('ReviewID');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->foreignId('TransactionID')->constrained('transaction_headers', 'TransactionID')->onDelete('cascade');
            $table->foreignId('ProductID')->nullable()->constrained('ms_products', 'ProductID')->onDelete('cascade');
            $table->foreignId('AuctionID')->nullable()->constrained('ms_auctions', 'AuctionID')->onDelete('cascade');
            $table->text('Reviews');
            $table->integer('Rating');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_reviews');
    }
};
