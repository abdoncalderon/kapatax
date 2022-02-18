<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stakeholder_person_id')->nullable();
            $table->foreign('stakeholder_person_id')->references('id')->on('stakeholder_people')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('leader_id')->nullable();
            $table->string('businessEmail')->unique()->nullable();
            $table->date('hiredSince');
            $table->date('contractedUntil');
            $table->decimal('salary',8,2);
            $table->date('admissionDate')->nullable();
            $table->date('departureDate')->nullable();
            $table->string('contractFile')->nullable();
            $table->boolean('isActive')->default(true);
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
        Schema::dropIfExists('employees');
    }
}
