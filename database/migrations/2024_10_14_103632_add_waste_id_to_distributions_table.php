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
        Schema::table('distributions', function (Blueprint $table) {
            $table->foreignId('waste_id')->constrained()->after('recycling_center_id'); // Assurez-vous que la table 'wastes' existe
        });
    }
    
    public function down()
    {
        Schema::table('distributions', function (Blueprint $table) {
            $table->dropForeign(['waste_id']);
            $table->dropColumn('waste_id');
        });
        
    }
};
