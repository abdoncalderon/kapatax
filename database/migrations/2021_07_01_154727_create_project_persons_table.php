<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_persons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id');
            $table->foreign('person_id')->references('id')->on('persons')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('restrict');
            $table->string('jobId')->unique()->nullable();
            $table->foreignId('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('leader')->nullable();
            $table->date('contractFrom');
            $table->date('contractTo');
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
        Schema::dropIfExists('project_persons');
    }
}
