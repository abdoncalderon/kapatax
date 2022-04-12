<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_request_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_request_id');
            $table->foreign('quotation_request_id')->references('id')->on('quotation_requests')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('need_request_item_id');
            $table->foreign('need_request_item_id')->references('id')->on('need_request_items')->onUpdate('cascade')->onDelete('restrict');
            $table->text('reference');
            $table->integer('quantity');
            $table->foreignId('unity_id');
            $table->foreign('unity_id')->references('id')->on('unities')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('quotation_request_items');
    }
}
