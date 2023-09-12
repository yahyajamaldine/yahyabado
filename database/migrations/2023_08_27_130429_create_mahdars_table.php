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
        Schema::create('mahdar', function (Blueprint $table) {
            $table->id();
            $table->string('sub');
            $table->string('Flist',500)->nullable();
            $table->date('date_mahdar');
            $table->boolean('wife');
            $table->boolean('child');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('date_creation');
            $table->bigInteger('aasel');
            $table->bigInteger('saair');
            $table->bigInteger('lmofawad');
            $table->bigInteger('lkhazina');
            $table->bigInteger('tva');
            $table->bigInteger('total');
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
        Schema::dropIfExists('mahdars');
    }
};
