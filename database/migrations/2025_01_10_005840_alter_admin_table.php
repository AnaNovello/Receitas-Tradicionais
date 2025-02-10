<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('admin', function(Blueprint $table){
            $table->string('email');
            $table->string('senha');
            $table->string('nome');
            $table->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin', function(Blueprint $table){
            $table->dropColumn('email');
            $table->dropColumn('senha');
            $table->dropColumn('nome');
            $table->dropColumn('foto');
        });
    }
};
