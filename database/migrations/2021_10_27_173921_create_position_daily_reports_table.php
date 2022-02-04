<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_daily_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_report_id');
            $table->foreign('daily_report_id')->references('id')->on('daily_reports')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('stakeholder_id');
            $table->foreign('stakeholder_id')->references('id')->on('stakeholders')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('quantity');
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('position_daily_reports');
    }
}
