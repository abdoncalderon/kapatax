<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reception_item_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reception_item_id');
            $table->foreign('reception_item_id')->references('id')->on('reception_items')->onUpdate('cascade')->onDelete('restrict');
            $table->string('serialNumber')->nullable();
            $table->string('partNumber')->nullable();
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
        Schema::dropIfExists('reception_item_details');
    }
}
