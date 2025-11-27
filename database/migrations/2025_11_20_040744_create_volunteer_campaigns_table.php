<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('volunteer_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('lokasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('volunteer_campaigns');
    }
};
