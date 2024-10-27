<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wastes', function (Blueprint $table) {
            $table->id(); // wasteID
            $table->string('image')->nullable();
            $table->integer('quantity');
            $table->dateTime('collection_date');
            $table->string('collection_location');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Enumération pour les catégories
            $table->enum('category', ['papier', 'bois', 'plastique', 'verre', 'métal','Autre'])->default('papier');
            $table->foreignId('depot_id')->constrained('depot_centers')->onDelete('cascade'); // Corrigé pour faire référence à 'depot_centers'
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wastes');
    }
}
