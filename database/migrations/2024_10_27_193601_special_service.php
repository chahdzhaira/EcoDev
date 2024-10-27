<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');               
            $table->float('additional_cost', 8, 2); 
            $table->date('expiration_date')->nullable(); 

            $table->foreignId('delivery_agence_id')->constrained()->onDelete('cascade');

            // Ajout des nouveaux champs
            $table->text('description')->nullable(); 
            $table->string('status')->default('active'); // Statut du service (par défaut 'active')

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_services');
    }
};
