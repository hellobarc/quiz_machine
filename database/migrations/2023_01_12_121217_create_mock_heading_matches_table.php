<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMockHeadingMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mock_heading_matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mock_question_id');
            $table->longText('text')->default(NULL);
            $table->enum('is_show', ['yes', 'no'])->default(NULL);
            $table->string('blank_answer')->default(NULL);
            $table->integer('marks');
            $table->mediumText('instruction')->nullable();
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
        Schema::dropIfExists('mock_heading_matches');
    }
}
