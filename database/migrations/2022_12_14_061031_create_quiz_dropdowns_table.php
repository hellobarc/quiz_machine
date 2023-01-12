<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizDropdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_dropdowns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quiz_id');
            $table->longText('text');
            $table->string('option_text');
            $table->string('is_correct');
            $table->integer('marks');
            // $table->string('is_dropdown');
            // $table->string('correct_answer');
            // $table->string('is_newline');
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
        Schema::dropIfExists('quiz_dropdowns');
    }
}
