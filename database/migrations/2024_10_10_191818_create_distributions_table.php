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
        Schema::create('distributions', function (Blueprint $table) {
            $table->id(); // ID of the distribution
            $table->integer('quantity_to_distribute'); 
            $table->enum('status', ['pending', 'in_progress', 'completed', 'canceled'])->default('pending'); // Optional: set default value            
            $table->foreignId('delivery_agence_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('recycling_center_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('distributions');
    }
};
