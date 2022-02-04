<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeholdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakeholders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('restrict');
            $table->string('code')->unique();
            $table->string('taxId')->unique()->nullable();
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('restrict');
            $table->string('address')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('email')->nullable();
            $table->string('logofile')->default('logo.png');
            $table->foreignId('stakeholder_types_id');
            $table->foreign('stakeholder_types_id')->references('id')->on('stakeholder_types')->onUpdate('cascade')->onDelete('restrict');
            $table->boolean('isActive')->default(true);
            $table->boolean('isLocked')->default(false);
            $table->unique(['name','project_id'],'contractor_project_unique');
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
        Schema::dropIfExists('stakeholders');
    }
}
