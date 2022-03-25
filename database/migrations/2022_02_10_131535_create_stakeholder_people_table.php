<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeholderPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakeholder_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stakeholder_id');
            $table->foreign('stakeholder_id')->references('id')->on('stakeholders')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('person_id');
            $table->foreign('person_id')->references('id')->on('people')->onUpdate('cascade')->onDelete('restrict');
            $table->date('admissionDate');
            $table->date('departureDate')->nullable();
            $table->foreignId('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('leader_id')->nullable();
            $table->string('businessEmail')->unique()->nullable();
            $table->date('hiredSince')->nullable();
            $table->date('contractedUntil')->nullable();
            $table->decimal('salary',8,2)->nullable();
            $table->string('contractFile')->nullable();
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
        Schema::dropIfExists('stakeholder_people');
    }
}
