<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('folio_id');
            $table->foreign('folio_id')->references('id')->on('folios')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('turn_id');
            $table->foreign('turn_id')->references('id')->on('turns')->onUpdate('cascade')->onDelete('restrict');
            $table->text('report');
            $table->foreignId('project_user_id');
            $table->foreign('project_user_id')->references('id')->on('project_users')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedBigInteger('approvedby')->nullable();
            $table->unsignedBigInteger('reviewedby')->nullable();
            $table->unsignedBigInteger('responsible')->nullable();
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
        Schema::dropIfExists('daily_reports');
    }
}
