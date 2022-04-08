<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
           
            $table->string('cardId')->unique();
            $table->string('fullName')->nullable();;
            $table->string('firstName');
            $table->string('lastName');
            $table->foreignId('gender_id');
            $table->foreign('gender_id')->references('id')->on('genders')->onUpdate('cascade')->onDelete('restrict');
            $table->date('birthDate');
            $table->string('jobTitle')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('restrict');
            $table->string('address')->nullable();;
            $table->string('homePhone')->nullable();
            $table->string('mobilePhone');
            $table->string('photo')->default('noPhoto.png');
            $table->string('signature')->default('noSignature.png');
            $table->boolean('isActive')->default(false);
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
        Schema::dropIfExists('people');
    }
}
