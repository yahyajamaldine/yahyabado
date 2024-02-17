<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
          // Drop the existing primary key
          Schema::table('file_tanfidi', function (Blueprint $table) {
            $table->dropPrimary();
        });

        // Add composite primary key
        Schema::table('file_tanfidi', function (Blueprint $table) {
            $table->primary(['id', 'date_receive']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('file_tanfidi', function (Blueprint $table) {
            $table->dropPrimary();
        });

        // Add back the original primary key (assuming it's an auto-incrementing id)
        Schema::table('file_tanfidi', function (Blueprint $table) {
            $table->primary('id');
        });
    }
};
