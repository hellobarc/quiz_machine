<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMockQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mock_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('mock_id');
            $table->string('question_title');
            $table->string('question_type');
            $table->enum('module', ['reading', 'writing', 'listening', 'speaking']);
            $table->integer('passage_id')->nullable();
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
        Schema::dropIfExists('mock_questions');
    }
}
