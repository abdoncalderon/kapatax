<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('need_request_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('need_request_id');
            $table->foreign('need_request_id')->references('id')->on('need_requests')->onUpdate('cascade')->onDelete('restrict');
            $table->text('reference');
            $table->integer('quantity');
            $table->foreignId('unity_id');
            $table->foreign('unity_id')->references('id')->on('unities')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('status_id');
            $table->integer('class_id')->default('0');
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
        Schema::dropIfExists('need_request_items');
    }
}
