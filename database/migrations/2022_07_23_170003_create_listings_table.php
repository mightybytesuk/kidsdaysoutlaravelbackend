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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->string('long');
            $table->string('lat');
            $table->string('price');
            $table->string('website');
            $table->string('line_one');
            $table->string('line_two');
            $table->string('town');
            $table->string('county');
            $table->string('country');
            $table->string('postcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
};
