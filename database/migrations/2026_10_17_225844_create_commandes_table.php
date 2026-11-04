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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('gestionnaire_du_paiement');
            $table->string('id_du_paiement')->unique();
            $table->date('date');
            $table->decimal('rabais_du_paiement')->default(0);
            $table->decimal('prix_total');

            $table->foreignId('user_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
