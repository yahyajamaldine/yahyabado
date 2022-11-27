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
        Schema::create('ijraa', function (Blueprint $table) {
            $table->id();
            $table->integer('Raqem');
            $table->string('ijraa_type');
            $table->date('date_receive');
            $table->string('taleb');
            $table->string('matlob');
            $table->date('creat_date');
            $table->string('ijraa_rs')->nullable();
            $table->date('watika_reciev')->nullable();
            $table->string('watika_up')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('ijraa');
    }
};
