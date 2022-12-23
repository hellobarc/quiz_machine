<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('exam_id');
            $table->string('title');
            $table->longText('instruction');
            $table->enum('quiz_type',['fill-blank', 'multiple-choice', 'drop-down', 'radio','true-false']);
            $table->integer('marks');
            $table->enum('status', ['active', 'pause']);
            $table->enum('templete', ['with_passage', 'with_audio', 'general']);
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
        Schema::dropIfExists('quizzes');
    }
}
