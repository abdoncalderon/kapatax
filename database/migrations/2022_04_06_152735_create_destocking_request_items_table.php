<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestockingRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destocking_request_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destocking_request_id');
            $table->foreign('destocking_request_id')->references('id')->on('destocking_requests')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('need_request_item_id');
            $table->foreign('need_request_item_id')->references('id')->on('need_request_items')->onUpdate('cascade')->onDelete('restrict');
            $table->text('reference');
            $table->integer('quantity');
            $table->foreignId('unity_id');
            $table->foreign('unity_id')->references('id')->on('unities')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('destocking_request_items');
    }
}
