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
            $table->foreignId('person_id');
            $table->foreign('person_id')->references('id')->on('persons')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('stakeholder_id');
            $table->foreign('stakeholder_id')->references('id')->on('stakeholders')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('leader')->nullable();
            $table->string('businessEmail')->unique();
            $table->date('contractFrom');
            $table->date('contractTo');
            $table->decimal('salary',8,2);
            $table->date('dateOut');
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
