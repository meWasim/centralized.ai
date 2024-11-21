<?php

namespace Database\Seeders;
use App\Models\Company;
use App\Models\User;
use App\Models\Hr;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create 10 companies, each with 5 HR records
        Company::factory(10)
            ->hasHr(5) // Assuming the relationship is defined
            ->create();
    }
}
