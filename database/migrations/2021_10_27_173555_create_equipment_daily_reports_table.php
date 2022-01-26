<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_daily_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_report_id');
            $table->foreign('daily_report_id')->references('id')->on('daily_reports')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('contractor_id');
            $table->foreign('contractor_id')->references('id')->on('contractors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('equipment_id');
            $table->foreign('equipment_id')->references('id')->on('equipments')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('equipment_daily_reports');
    }
}
