<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('taxId')->unique()->nullable();
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('restrict');
            $table->string('address')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->foreignId('subsidiary_id');
            $table->foreign('subsidiary_id')->references('id')->on('subsidiaries')->onUpdate('cascade')->onDelete('restrict');
            $table->date('startDate')->nullable();
            $table->date('finishDate')->nullable();
            $table->boolean('isActive')->default(true);
            $table->boolean('isLocked')->default(false);
            $table->unsignedBigInteger('stakeholderLogo1_id')->nullable();
            $table->unsignedBigInteger('stakeholderLogo2_id')->nullable();
            $table->unsignedBigInteger('stakeholderLogo3_id')->nullable();
            $table->unsignedBigInteger('stakeholderLogo4_id')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
