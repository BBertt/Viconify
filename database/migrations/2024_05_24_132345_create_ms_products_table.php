
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ms_products', function (Blueprint $table) {
            $table->id('ProductID');
            $table->foreignId('UserID')->constrained('ms_users', 'UserID')->onDelete('cascade');
            $table->string('ProductName', 255);
            $table->integer('ProductPrice');
            $table->text('ProductDescription');
            $table->integer('Quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ms_products');
    }
};
