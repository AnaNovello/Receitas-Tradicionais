<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('receita', function (Blueprint $table) {
            $table->text('ingredientes')->nullable();
            $table->text('preparo')->nullable();
        });
    }

    
    public function down(): void
    {
        Schema::table('receita', function (Blueprint $table) {
            $table->dropColumn('ingredientes');
            $table->dropColumn('preparo');
        });
    }
};
