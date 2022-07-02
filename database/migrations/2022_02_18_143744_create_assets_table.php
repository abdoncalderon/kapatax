<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('asset_category_id')->nullable();
            $table->string('serialNumber')->nullable();
            $table->string('partNumber')->nullable();
            $table->string('internalCode')->nullable();
            $table->unsignedBigInteger('partOf')->nullable();
            $table->foreignId('stock_movement_id');
            $table->foreign('stock_movement_id')->references('id')->on('stock_movements')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('assets');
    }
}
