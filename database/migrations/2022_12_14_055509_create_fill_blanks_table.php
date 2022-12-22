<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFillBlanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fill_blanks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quiz_id');
            $table->longText('text')->default(NULL);
            $table->string('is_blank')->default(NULL);
            $table->string('blank_answer')->default(NULL);
            $table->string('is_newline')->default(NULL);
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
        Schema::dropIfExists('fill_blanks');
    }
}
