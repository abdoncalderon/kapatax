<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_request_id');
            $table->foreign('quotation_request_id')->references('id')->on('quotation_requests')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('stakeholder_id');
            $table->foreign('stakeholder_id')->references('id')->on('stakeholders')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('sendDate');
            $table->dateTime('answerDate')->nullable();
            $table->decimal('totalPrice')->default('0.0');
            $table->foreignId('project_user_id');
            $table->foreign('project_user_id')->references('id')->on('project_users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('quotationFile')->nullable();
            $table->integer('status_id')->default('0');
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
        Schema::dropIfExists('quotations');
    }
}
