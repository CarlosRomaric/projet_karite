<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nom_complet', 45)->nullable()->after('id');
            $table->string('nom_utilisateur', 45)->nullable()->after('nom_complet');
            $table->string('contact', 45)->nullable()->after('nom_utilisateur');
            $table->string('mot_passe', 255)->nullable()->after('contact');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
