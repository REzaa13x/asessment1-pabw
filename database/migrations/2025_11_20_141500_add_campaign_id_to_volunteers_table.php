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
        Schema::table('volunteers', function (Blueprint $table) {
            $table->unsignedBigInteger('volunteer_campaign_id')->nullable()->after('keahlian');
            $table->foreign('volunteer_campaign_id')->references('id')->on('volunteer_campaigns')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('volunteers', function (Blueprint $table) {
            $table->dropForeign(['volunteer_campaign_id']);
            $table->dropColumn('volunteer_campaign_id');
        });
    }
};