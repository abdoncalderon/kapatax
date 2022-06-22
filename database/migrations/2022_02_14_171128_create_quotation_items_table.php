<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id');
            $table->foreign('quotation_id')->references('id')->on('quotations')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('purchase_request_item_id');
            $table->foreign('purchase_request_item_id')->references('id')->on('purchase_request_items')->onUpdate('cascade')->onDelete('restrict');
            $table->text('description');
            $table->integer('quantity');
            $table->foreignId('unity_id');
            $table->foreign('unity_id')->references('id')->on('unities')->onUpdate('cascade')->onDelete('restrict');
            $table->decimal('unitPrice');
            $table->dateTime('deliveryDate');
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
        Schema::dropIfExists('quotation_items');
    }
}
