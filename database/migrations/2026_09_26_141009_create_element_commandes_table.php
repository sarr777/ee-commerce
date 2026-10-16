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
        Schema::create('element_commandes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("prix");
            $table->integer("quantite");
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('element_commandes');
    }
};
