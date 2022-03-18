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
            $table->string('code');
            $table->foreignId('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones')->onUpdate('cascade')->onDelete('restrict');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('sequence')->default('1');
            $table->date('startDate');
            $table->date('finishDate');
            $table->integer('max_time_open_folio')->default('48');
            $table->integer('max_time_create_dailyreport')->default('48');
            $table->integer('max_time_create_note')->default('48');
            $table->integer('max_time_create_comment')->default('48');
            $table->unique(['name','zone_id'],'zone_location_name_unique');
            $table->unique(['code','zone_id'],'zone_location_code_unique');
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
