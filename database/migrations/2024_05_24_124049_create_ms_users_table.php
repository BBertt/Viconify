<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_users', function (Blueprint $table) {
            $table->id('UserID');
            $table->text('ProfileImage')->nullable();
            $table->string('Name', 50);
            $table->string('password');
            $table->string('email')->unique();
            $table->string('Address', 200);
            $table->string('Role', 50);
            $table->integer('Balance')->default(0);
            $table->integer('LockedBalance')->default(0);
            $table->string('PhoneNumber', 20);
            $table->text('StoreDescription')->nullable();
            $table->string('StoreName', 150)->nullable();
            $table->text('StoreBanner')->nullable();
            $table->string('StoreStatus', 50)->nullable();
            $table->double('StoreRating', 10, 2)->default(0);
            $table->time('StoreStartTime')->nullable();
            $table->time('StoreEndTime')->nullable();
            $table->time('StoreDeliveryTime')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_users');
    }
};
