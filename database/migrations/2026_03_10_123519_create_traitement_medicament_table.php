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
        Schema::create('traitement_medicaments', function (Blueprint $table) {
            $table->id();
            $table->timestamps() ;
            $table->string('duree') ;
            $table->foreignId('traitement_id')->constrained() ;
            $table->foreignId('medicament_id')->constrained() ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traitement_Medicaments');
    }
};
