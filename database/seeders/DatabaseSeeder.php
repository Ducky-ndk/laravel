<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('subscriptions')->insert([
            'name' => 'basic',
        ]);

        DB::table('sport_classes')->insert([
            'name' => 'Zumba',
        ]);

        $this->call([
            RolesSeeder::class,
            UserSeeder::class,
        ]);
    }
}
