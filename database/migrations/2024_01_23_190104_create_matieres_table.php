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
    Schema::create('matieres', function (Blueprint $table) {
        $table->id('id_matiere');
        $table->string('nom');
        $table->string('code_matiere');
        /***enseignant */
        $table->unsignedBigInteger('id_enseignant');
        $table->foreign('id_enseignant')
        ->references('id_enseignant')
        ->on('enseignants')
        ->onDelete('restrict')
        ->onUpdate('restrict');
        /****etudiant */
        $table->unsignedBigInteger('id_etudiant'); 
        
      
        $table->foreign('id_etudiant')
              ->references('id_etudiant')
              ->on('etudiants')
              ->onDelete('restrict')
              ->onUpdate('restrict');
        $table->timestamps();
    });
}

/**
 * Reverse the migrations.
 */
public function down(): void
{
    Schema::dropIfExists('matieres');
}
};
