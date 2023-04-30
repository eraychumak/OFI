<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("responses", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("respondent_id");
            $table->unsignedBigInteger("question_id");
            $table->unsignedBigInteger("choice_id");
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
        Schema::dropIfExists("responses");
    }
}
