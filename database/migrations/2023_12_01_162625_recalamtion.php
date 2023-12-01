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
        Schema::create("Reclamation", function (Blueprint $table) {
            $table->id("NumReclamation");
            $table->text("CorpReclamation");
            $table->date('DateReclamation')->default(now());
            $table->unsignedBigInteger('adherant_id');
            $table->foreign('adherant_id')->references('id')->on('users')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
