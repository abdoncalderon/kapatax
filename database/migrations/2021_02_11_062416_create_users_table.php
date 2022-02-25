<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people')->onUpdate('cascade')->onDelete('restrict');
            $table->string('user')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('isActive')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
