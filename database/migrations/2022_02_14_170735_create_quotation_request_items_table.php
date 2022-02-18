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
            $table->foreignId('material_id');
            $table->foreign('material_id')->references('id')->on('materials')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('quantity');
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
