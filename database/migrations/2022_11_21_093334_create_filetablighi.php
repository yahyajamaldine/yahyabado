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
            $table->string('ramz');
            $table->string('kad_type');
            $table->date('jalsa_date');
            $table->string('source')->nullable();
            $table->string('its_source')->nullable();
            $table->string('exits_source')->nullable();
            $table->integer('rakmoha_rakem')->nullable();
            $table->string('kadiya_type')->nullable();
            $table->date('date_receive')->nullable();
            $table->string('taleb')->nullable();
            $table->string('matlob')->nullable();
            $table->date('date_ijraa')->nullable();
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
