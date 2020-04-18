<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisaUrgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_urgents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('purpose_id');
            $table->float('day_number')->nullable();
            $table->string('day_text', 255)->nullable();
            $table->float('fee', 255)->nullable();
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
        Schema::dropIfExists('visa_urgents');
    }
}
