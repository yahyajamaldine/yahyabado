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
        Schema::create('fileTBnB', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rakem_kad');
            $table->string('ramez_kad');
            $table->unsignedBigInteger('year_kad');
            $table->unsignedBigInteger('filetablighi_id')->index();
            $table->foreign('filetablighi_id')->references('id')->on('filetablighi');
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
        Schema::dropIfExists('file_tb_nb');
    }
};
