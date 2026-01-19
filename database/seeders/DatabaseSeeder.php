<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TeamSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@flowcrm.com',
            'password'=> bcrypt('password'),
            'role' => 'manager',
            'team_id' => null,
        ]);

        User::factory()->create([
            'name' => 'Sales Rep',
            'email' => 'sales@flowcrm.com',
            'password'=> bcrypt('password'),
            'role' => 'sales',
            'team_id' => 1,
        ]);
    }
}
