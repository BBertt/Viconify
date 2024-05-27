<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id('TransactionID');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->time('TransactionDate');
            $table->string('PaymentMethod', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_headers');
    }
};
