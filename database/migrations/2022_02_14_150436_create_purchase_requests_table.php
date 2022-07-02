<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('need_request_id');
            $table->foreign('need_request_id')->references('id')->on('need_requests')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('sorter_id');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->dateTime('date');
            $table->integer('status_id')->default('0');
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
        Schema::dropIfExists('purchase_requests');
    }
}
