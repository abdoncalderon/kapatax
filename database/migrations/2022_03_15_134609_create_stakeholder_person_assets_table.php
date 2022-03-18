<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeholderPersonAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakeholder_person_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stakeholder_person_id');
            $table->foreign('stakeholder_person_id')->references('id')->on('stakeholder_people')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('asset_id');
            $table->foreign('asset_id')->references('id')->on('assets')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('deliveryDate');
            $table->dateTime('returnDate')->nullable();
            $table->unsignedBigInteger('deliveredBy');
            $table->unsignedBigInteger('receivedBy')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('stakeholder_person_assets');
    }
}
