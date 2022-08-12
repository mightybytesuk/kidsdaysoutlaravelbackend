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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->string('long');
            $table->string('lat');
            $table->string('price')->nullable();
            $table->string('website')->nullable();
            $table->string('line_one');
            $table->string('line_two');
            $table->string('town');
            $table->string('county');
            $table->string('country');
            $table->string('postcode');
            $table->date('event_date');
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
        Schema::dropIfExists('events');
    }
};
