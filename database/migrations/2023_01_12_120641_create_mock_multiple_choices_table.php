<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMockMultipleChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mock_multiple_choices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mock_question_id');
            $table->string('text');
            $table->string('option_text');
            $table->string('is_correct');
            $table->integer('marks');
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
        Schema::dropIfExists('mock_multiple_choices');
    }
}
