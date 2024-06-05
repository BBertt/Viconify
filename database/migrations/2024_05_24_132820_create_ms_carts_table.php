<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_carts', function (Blueprint $table) {
            $table->id('CartID');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->foreignId('ProductID')->constrained('ms_products', 'ProductID')->onDelete('cascade');
            $table->integer('Quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_carts');
    }
};
