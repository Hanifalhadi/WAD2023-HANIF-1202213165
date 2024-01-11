<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response', function (Blueprint $table) {
            $table->id('response_id');
            $table->unsignedBigInteger('report_id');
            $table->dateTime('response_date');
            $table->text('response');
            $table->unsignedBigInteger('id_petugas');
            $table->timestamps();

            $table->foreign('report_id')->references('report_id')->on('report');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('response');
    }
}