<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_daily_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_report_id');
            $table->foreign('daily_report_id')->references('id')->on('daily_reports')->onUpdate('cascade')->onDelete('restrict');
            $table->string('cause');
            $table->time('start');
            $table->time('finish');
            $table->text('description');
            $table->boolean('haveImpact')->default(false);
            $table->foreignId('project_user_id');
            $table->foreign('project_user_id')->references('id')->on('project_users')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('event_daily_reports');
    }
}
