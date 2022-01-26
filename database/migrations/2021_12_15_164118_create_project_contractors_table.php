<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_contractors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('contractor_id');
            $table->foreign('contractor_id')->references('id')->on('contractors')->onUpdate('cascade')->onDelete('restrict');
            $table->string('code')->unique();
            $table->string('taxId')->unique()->nullable();
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('restrict');
            $table->string('address')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('email')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->boolean('isActive')->default(true);
            $table->boolean('isLocked')->default(false);
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
        Schema::dropIfExists('project_contractors');
    }
}
