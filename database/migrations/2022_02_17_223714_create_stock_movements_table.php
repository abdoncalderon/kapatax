<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->integer('transactionType_id');
            $table->foreignId('material_id');
            $table->foreign('material_id')->references('id')->on('materials')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('quantity');
            $table->decimal('unitPrice')->default('0.0');
            $table->decimal('balance');
            $table->foreignId('warehouse_id');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('project_user_id');
            $table->foreign('project_user_id')->references('id')->on('project_users')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('stakeholder_person_id')->nullable();
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
        Schema::dropIfExists('stock_movements');
    }
}

