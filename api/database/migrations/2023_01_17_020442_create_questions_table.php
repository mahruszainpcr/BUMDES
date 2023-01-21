<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perspective_id')->unsigned()->nullable();
            $table->string('question')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('kind')->nullable();
            $table->timestamps();
            $table->foreign('perspective_id')->references('id')->on('perspectives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
