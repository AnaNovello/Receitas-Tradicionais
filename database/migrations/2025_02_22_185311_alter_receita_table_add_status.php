<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('receita', function (Blueprint $table) {
            $table->enum('status', ['pendente', 'aprovada', 'rejeitada'])->default('pendente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receita', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
