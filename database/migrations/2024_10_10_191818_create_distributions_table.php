<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionsTable extends Migration
{
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('waste_id')->constrained(); // Ajoutez cette ligne
            $table->integer('quantity_to_distribute');
            $table->string('status');
            $table->foreignId('delivery_agence_id')->constrained();
            $table->foreignId('recycling_center_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distributions');
    }
}
