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
        Schema::create('notes', function (Blueprint $table) {
            $table->id('id_note');
            $table->string('valeur');
            $table->string('date_note');

            // Clé étrangère pour l'enseignant
            $table->unsignedBigInteger('id_enseignant');
            $table->foreign('id_enseignant')
                  ->references('id_enseignant')
                  ->on('enseignants')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            // Clé étrangère pour l'étudiant
            $table->unsignedBigInteger('id_etudiant');
            $table->foreign('id_etudiant')
                  ->references('id_etudiant')
                  ->on('etudiants')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            // Clé étrangère pour la matière
            $table->unsignedBigInteger('id_matiere');
            $table->foreign('id_matiere')
                  ->references('id_matiere')
                  ->on('matieres')
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
        Schema::dropIfExists('notes');
    }
};
