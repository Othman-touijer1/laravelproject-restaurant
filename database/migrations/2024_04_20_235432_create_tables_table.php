<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('user_name'); // Nom de l'utilisateur
            $table->string('email'); // Adresse email
            $table->decimal('price', 8, 2); // Prix (8 chiffres max, 2 décimales)
            $table->integer('num'); // Numéro (champ numérique entier)
            $table->timestamps(); // Champs pour les horodatages (created_at et updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
