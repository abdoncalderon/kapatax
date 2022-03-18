<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationProjectUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_project_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('project_user_id');
            $table->foreign('project_user_id')->references('id')->on('project_users')->onUpdate('cascade')->onDelete('restrict');
            $table->boolean('dailyreport_collaborator')->default(false);
            $table->boolean('dailyreport_approver')->default(false);
            $table->boolean('folio_approver')->default(false);
            $table->boolean('receive_notification')->default(false);
            $table->unique(['project_user_id','location_id'],'project_user_location_unique');
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
        Schema::dropIfExists('location_project_users');
    }
}
