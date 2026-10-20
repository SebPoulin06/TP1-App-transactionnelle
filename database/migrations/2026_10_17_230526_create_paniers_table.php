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
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedInteger('quantiter');
<<<<<<< HEAD
            $table->foreignId('produit_id')->constrained();
            $table->foreignId('user_id')->constrained();
=======
            $table->foreignId('id_produit')->constrained('produits');
            $table->foreignId('id_client')->constrained('users');
>>>>>>> page-catalogue
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paniers');
    }
};
