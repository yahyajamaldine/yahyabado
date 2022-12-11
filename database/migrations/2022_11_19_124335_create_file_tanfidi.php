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
        Schema::create('file_tanfidi', function (Blueprint $table) {
            $table->id();
            $table->string('Raqem');
            $table->string('ramz');
            $table->date('date_receive');
            $table->string('ijrae_type');
            $table->string('taleb')->nullable();
            $table->string('matlob')->nullable();
            $table->date('date_creation')->nullable();
            $table->string('resume')->nullable();
            $table->date('watika_reciev')->nullable();
            $table->string('add_file')->nullable();
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
        Schema::dropIfExists('file_tanfidi');
    }
};
