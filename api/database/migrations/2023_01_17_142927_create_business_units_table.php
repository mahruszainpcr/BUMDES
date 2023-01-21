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
        Schema::create('business_units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bumdes_id')->unsigned()->nullable();
            $table->bigInteger('category_bu_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('since');
            $table->integer('number_of_employee');
            $table->timestamps();
            $table->foreign('bumdes_id')->references('id')->on('bumdes');
            $table->foreign('category_bu_id')->references('id')->on('category_bus');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_units');
    }
};
