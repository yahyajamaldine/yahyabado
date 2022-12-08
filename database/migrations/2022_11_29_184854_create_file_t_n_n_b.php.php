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
        Schema::create('fileTFnB', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('rakem_kad');
        $table->string('ramez_kad');
        $table->unsignedBigInteger('year_kad');
        $table->unsignedBigInteger('file_tanfidi_id')->index();
        $table->foreign('file_tanfidi_id')->references('id')->on('file_tanfidi');
        $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
