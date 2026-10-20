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
        Schema::create('remboursements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('date_remboursement');
            $table->unsignedInteger('quantite');
            $table->string('cause_remboursement');


            $table->foreignId('id_commande_produit')->constrained('commande_produit');
            $table->foreignId('id_statut')->constrained('statuts');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remboursements');
    }
};
