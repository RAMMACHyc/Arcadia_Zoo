<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('veterinaire_avis', function (Blueprint $table) {
            $table->text('comment')->nullable()->after('detail_etat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('veterinaire_avis', function (Blueprint $table) {
            //
        });
    }
};
