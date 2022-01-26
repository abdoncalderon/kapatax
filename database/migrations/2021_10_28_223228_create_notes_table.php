<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('folio_id');
            $table->foreign('folio_id')->references('id')->on('folios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('turn_id');
            $table->foreign('turn_id')->references('id')->on('turns')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('date');
            $table->text('note');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('notes');
    }
}
