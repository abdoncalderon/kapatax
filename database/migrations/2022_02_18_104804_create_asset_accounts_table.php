<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_group_id');
            $table->foreign('asset_group_id')->references('id')->on('asset_groups')->onUpdate('cascade')->onDelete('restrict');
            $table->string('assetAccount')->nullable();
            $table->string('accumulatedDepreciationAccount')->nullable();
            $table->string('depreciationAccount')->nullable();
            $table->string('disposalRevenewAccount')->nullable();
            $table->string('disposalLostAccount')->nullable();
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
        Schema::dropIfExists('asset_accounts');
    }
}
