<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruncateTablesSeeder extends Seeder
{
    public function run()
    {
        // Step 1: Disable foreign key checks to avoid constraint errors
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Step 2: Get all table names
        $tables = DB::select('SHOW TABLES');
        $tableKey = 'Tables_in_' . env('DB_DATABASE');

        // Step 3: Loop through and truncate each table
        foreach ($tables as $table) {
            $tableName = $table->$tableKey;
            DB::table($tableName)->truncate();
            $this->command->info("Table {$tableName} has been truncated.");
        }

        // Step 4: Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('All tables have been truncated successfully!');
    }
}
