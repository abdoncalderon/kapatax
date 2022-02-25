<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id');
            $table->foreign('note_id')->references('id')->on('notes')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('date');
            $table->text('comment');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('comment_notes');
    }
}
