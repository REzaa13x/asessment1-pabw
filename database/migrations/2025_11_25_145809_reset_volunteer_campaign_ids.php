<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get all volunteer campaigns ordered by their current ID
        $campaigns = DB::table('volunteer_campaigns')->orderBy('id')->get();

        // Temporarily disable foreign key checks to allow ID changes
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Store the current volunteer_campaign_id relationships
        $volunteerCampaignMap = [];
        foreach ($campaigns as $index => $campaign) {
            $newId = $index + 1;
            $volunteerCampaignMap[$campaign->id] = $newId;
        }

        // Get all volunteers with their current campaign associations
        $volunteers = DB::table('volunteers')->get();

        // Clear all volunteer_campaigns records
        DB::table('volunteer_campaigns')->truncate();

        // Reset auto-increment to 1
        DB::statement('ALTER TABLE volunteer_campaigns AUTO_INCREMENT = 1;');

        // Re-insert campaigns with sequential IDs
        foreach ($campaigns as $index => $campaign) {
            $newId = $index + 1;
            DB::table('volunteer_campaigns')->insert([
                'id' => $newId,
                'judul' => $campaign->judul,
                'lokasi' => $campaign->lokasi,
                'tanggal_mulai' => $campaign->tanggal_mulai,
                'tanggal_selesai' => $campaign->tanggal_selesai,
                'status' => $campaign->status,
                'created_at' => $campaign->created_at,
                'updated_at' => $campaign->updated_at,
            ]);
        }

        // Update the volunteer records with new campaign IDs
        foreach ($volunteers as $volunteer) {
            if ($volunteer->volunteer_campaign_id && isset($volunteerCampaignMap[$volunteer->volunteer_campaign_id])) {
                $newCampaignId = $volunteerCampaignMap[$volunteer->volunteer_campaign_id];
                DB::table('volunteers')
                    ->where('id', $volunteer->id)
                    ->update(['volunteer_campaign_id' => $newCampaignId]);
            }
        }

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // For the down migration, we would need to keep track of the original IDs
        // Since this is a complex operation that might not be easily reversible,
        // we'll add a warning and potentially leave this migration as irreversible
        throw new \Exception('This migration cannot be reverted. Please restore from backup.');
    }
};
