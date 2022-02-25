<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_daily_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_report_id');
            $table->foreign('daily_report_id')->references('id')->on('daily_reports')->onUpdate('cascade')->onDelete('restrict');
            $table->string('filename');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('attachment_daily_reports');
    }
}
