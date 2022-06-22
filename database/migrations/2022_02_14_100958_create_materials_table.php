<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
           
            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('Subcategories')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('model_id');
            $table->foreign('model_id')->references('id')->on('mode1s')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('partOf')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('sku');
            $table->string('upc')->nullable();
            $table->foreignId('unity_id');
            $table->foreign('unity_id')->references('id')->on('unities')->onUpdate('cascade')->onDelete('restrict');
            $table->decimal('weight')->default('0.0');
            $table->decimal('volume')->default('0.0');
            $table->unique(['name','project_id'],'material_project_unique');
            $table->unique(['SKU','project_id'],'material_project_sku_unique');
            $table->decimal('stock')->default('0.0');
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
        Schema::dropIfExists('materials');
    }
}
