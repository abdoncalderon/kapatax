<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_turns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turn_id');
            $table->foreign('turn_id')->references('id')->on('turns')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('dateFrom');
            $table->dateTime('dateTo');
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
        Schema::dropIfExists('location_turns');
    }
}
