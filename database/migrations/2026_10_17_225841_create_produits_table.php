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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nom');
            $table->string('categorie');
            $table->string('marque');
            $table->decimal('prix',8,2);
            $table->unsignedInteger('stock');
            $table->string('taille')->nullable();
            $table->text('description');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
