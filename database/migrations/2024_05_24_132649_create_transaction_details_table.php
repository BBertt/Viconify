<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('TransactionID')->constrained('transaction_headers', 'TransactionID')->onDelete('cascade');
            $table->foreignId('ProductID')->nullable()->constrained('ms_products', 'ProductID')->onDelete('cascade');
            $table->foreignId('AuctionID')->nullable()->constrained('ms_auctions', 'AuctionID')->onDelete('cascade');
            $table->integer('Quantity');
            $table->integer('Price');
            $table->string('TransactionStatus', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
