<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        // Example: Insert initial user data
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'nowdidier@example.com',
                'password' => bcrypt('Gohhard@2025'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        $this->command->info('Initial data has been added successfully!');
    }
}
