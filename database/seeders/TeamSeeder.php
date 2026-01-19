<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            ['name' => 'Team Alpha (Sales)'],
            ['name' => 'Team Beta (Enterprise)'],
            ['name' => 'Team Charlie (Support)'],
            ['name' => 'Team Delta (Marketing)'],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
