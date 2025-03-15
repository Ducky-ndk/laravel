<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'member',
        ]);

        DB::table('roles')->insert([
            'name' => 'instructor',
        ]);

        DB::table('roles')->insert([
            'name' => 'administrator',
        ]);

        DB::table('roles')->insert([
            'name' => 'system-administrator',
        ]);
    }
}
