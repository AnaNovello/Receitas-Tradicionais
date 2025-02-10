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
        Schema::table('receita', function(Blueprint $table){
            $table->string('nome');
            $table->string('categoria');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receita', function(Blueprint $table){
            $table->dropColumn('nome');
            $table->dropColumn('categoria');
        });
    }
};
