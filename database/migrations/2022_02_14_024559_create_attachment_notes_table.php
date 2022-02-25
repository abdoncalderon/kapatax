<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id');
            $table->foreign('note_id')->references('id')->on('notes')->onUpdate('cascade')->onDelete('restrict');
            $table->string('filename');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('attachment_notes');
    }
}
