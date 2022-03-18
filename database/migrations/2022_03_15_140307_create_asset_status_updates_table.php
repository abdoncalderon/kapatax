<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetStatusUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_status_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id');
            $table->foreign('asset_id')->references('id')->on('assets')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('date');
            $table->unsignedBigInteger('oldStatus');
            $table->unsignedBigInteger('newStatus');
            $table->unsignedBigInteger('registeredBy');
            $table->string('backupDocument')->nullable();
            $table->text('comment');
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
        Schema::dropIfExists('asset_status_updates');
    }
}
