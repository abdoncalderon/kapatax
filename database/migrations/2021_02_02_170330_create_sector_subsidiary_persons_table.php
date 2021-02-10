<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorSubsidiaryPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_subsidiary_persons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('subsidiaryPerson_id');
            $table->foreign('subsidiaryPerson_id')->references('id')->on('subsidiary_persons')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('sector_subsidiary_persons');
    }
}
