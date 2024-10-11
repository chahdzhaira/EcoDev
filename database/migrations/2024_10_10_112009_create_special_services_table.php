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
            $table->string('name');               // Nom du service spécial
            $table->float('additional_cost', 8, 2); // Coût additionnel du service
            $table->date('expiration_date')->nullable(); // Date d'expiration du service
            
            // Clé étrangère vers DeliveryAgence
            $table->foreignId('delivery_agence_id')->constrained()->onDelete('cascade');

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
