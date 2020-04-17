<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisaMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_months', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('purpose_id')->nullable();
            $table->string('month_text', 255)->nullable();
            $table->smallInteger('month_number')->nullable();
            $table->float('month_fee')->nullable();
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
        Schema::dropIfExists('visa_months');
    }
}
