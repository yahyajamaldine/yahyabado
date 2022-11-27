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
        Schema::create('filetablighi', function (Blueprint $table) {
            $table->id();
            $table->integer('Raqem');
            $table->string('kad_type');
            $table->date('jalsa_date');
            $table->string('it_source');
            $table->integer('rakmoha_rakem');
            $table->string('kadiya_type');
            $table->date('date_receive');
            $table->string('taleb');
            $table->string('matlob');
            $table->date('date_ijraa');
            $table->date('watika_reciev')->nullable();
            $table->string('watika')->nullable();
            $table->string('add_notif')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('file_tablighi');
    }
};
