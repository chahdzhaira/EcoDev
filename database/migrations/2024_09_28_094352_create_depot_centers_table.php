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
        Schema::create('depot_centers', function (Blueprint $table) {
            $table->id(); // Primary key (auto-incrementing ID)
            $table->string('name');
            $table->string('address');
            $table->integer('capacity');
            $table->string('image')->nullable(); // Image can be null
            $table->integer('total_quantity_available');
            $table->time('opening_hours');
            $table->time('closing_hours');
            $table->integer('phoneNumber');
            $table->string('manager_name');
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depot_centers');
    }
};
