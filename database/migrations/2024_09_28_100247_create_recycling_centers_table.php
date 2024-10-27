<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecyclingCentersTable extends Migration
{
    public function up()
    {
        Schema::create('recycling_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phoneNumber')->nullable();
            $table->string('email')->nullable();
            $table->string('manager_name')->nullable();
            $table->time('opening_hours');
            $table->time('closing_hours');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recycling_centers');
    }
}


