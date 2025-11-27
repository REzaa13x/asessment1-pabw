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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade'); // Relasi ke tabel campaigns
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('role_selected'); // Misal: Logistik, Medis
            $table->text('reason')->nullable();
            // INI PENTING: Default pending biar gak langsung lolos
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
