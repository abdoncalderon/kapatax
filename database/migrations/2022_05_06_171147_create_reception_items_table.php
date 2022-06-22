<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reception_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reception_id');
            $table->foreign('reception_id')->references('id')->on('receptions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('purchase_order_item_id');
            $table->foreign('purchase_order_item_id')->references('id')->on('purchase_order_items')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('quantity');
            $table->dateTime('date');
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
        Schema::dropIfExists('reception_items');
    }
}
