<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisaPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_persons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('month_id')->nullable();
            $table->integer('urgent_id')->nullable();
            $table->smallInteger('person_number')->nullable();
            $table->string('person_text', 255)->nullable();
            $table->string('country_allow', 500)->nullable();
            $table->float('person_fee')->nullable();
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
        Schema::dropIfExists('visa_persons');
    }
}
