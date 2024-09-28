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
        Schema::create('sales_centers', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('address'); 
            $table->integer('phoneNumber'); 
            $table->string('image')->nullable();
            $table->time('opening_hours'); 
            $table->time('closing_hours'); 
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
        Schema::dropIfExists('sales_centers');
    }
};
