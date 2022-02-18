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
           
            $table->foreignId('asset_category_id');
            $table->foreign('asset_category_id')->references('id')->on('asset_categories')->onUpdate('cascade')->onDelete('restrict');
            $table->string('serialNumber')->nullable();
            $table->string('partNumber')->nullable();
            $table->string('internalCode')->nullable();
            $table->unsignedBigInteger('partOf')->nullable();
            $table->foreignId('purchase_invoice_item_id');
            $table->foreign('purchase_invoice_item_id')->references('id')->on('purchase_invoice_items')->onUpdate('cascade')->onDelete('restrict');
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
