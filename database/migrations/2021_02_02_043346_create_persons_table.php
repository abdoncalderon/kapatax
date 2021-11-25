<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('cardId')->unique();
            $table->string('fullname');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('gender');
            $table->date('birthDate');
            $table->string('email')->unique();
            $table->string('jobTitle')->nullable();
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('restrict');
            $table->string('address');
            $table->string('homePhone')->nullable();
            $table->string('mobilePhone')->nullable();
            $table->string('photo')->default('nophoto.png');
            $table->string('signature')->default('nosignature.png');
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
        Schema::dropIfExists('persons');
    }
}
