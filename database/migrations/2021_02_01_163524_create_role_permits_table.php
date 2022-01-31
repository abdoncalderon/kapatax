<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('permit_id');
            $table->foreign('permit_id')->references('id')->on('permits')->onUpdate('cascade')->onDelete('restrict');
            $table->boolean('isActive')->default(false);
            $table->unique(['role_id','permit_id'],'role_permit_unique');
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
        Schema::dropIfExists('role_permits');
    }
}
