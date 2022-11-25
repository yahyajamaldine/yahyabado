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
            $table->date('date_receive');
            $table->string('ijrae_type');
            $table->string('marge_ref');
            $table->string('taleb');
            $table->string('matlob');
            $table->date('date_creation');
            $table->string('resume');
            $table->date('watika_reciev')->nullable();
            $table->string('add_file');
            $table->text('note');
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
