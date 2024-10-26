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
        Schema::create('recycled_products', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('image')->nullable(); 
            $table->text('description'); 
            $table->integer('quantity');  
            $table->float('price', 8, 2); 

            $table->foreignId('sales_center_id')->constrained()->onDelete('cascade');
            
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
        Schema::dropIfExists('recycled_products');
    }
};
