<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showroom_cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('vehicle_directory_id')->constrained()->onDelete('cascade');
            $table->string('color');
            $table->integer('price');
            $table->tinyInteger('sign_sold')->default(0);
            $table->dateTime('date_of_sale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showroom_cars');
    }
};
