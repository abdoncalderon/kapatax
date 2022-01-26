<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->unique()->nullable();
            $table->foreignId('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones')->onUpdate('cascade')->onDelete('restrict');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('sequence')->default('1');
            $table->date('startDate')->nullable();
            $table->date('finishDate')->nullable();
            $table->integer('max_time_open_folio')->default('24');
            $table->integer('max_time_create_dailyreport')->default('24');
            $table->integer('max_time_create_note')->default('24');
            $table->integer('max_time_create_comment')->default('24');
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
        Schema::dropIfExists('locations');
    }
}
