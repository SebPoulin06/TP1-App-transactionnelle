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
        Schema::create('commande_coupon', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

<<<<<<< HEAD
            $table->foreignId('commande_id')->constrained();
            $table->foreignId('coupon_id')->constrained();
=======
            $table->foreignId('id_commande')->constrained('commandes');
            $table->foreignId('id_coupon')->constrained('coupons');
>>>>>>> page-catalogue
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_coupon');
    }
};
