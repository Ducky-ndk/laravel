<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Create System Admin Account
         *
         */
        \App\Models\User::factory()->create([
            'name' => 'SYS ADMIN',
            'email' => 'sysadmin@example.com',
            'password' => Hash::make('sysadmin'),
        ]);

        DB::table('user_roles')->insert([
            'user_id' => 1,
            'roles_id' => 4,
        ]);

        /**
         * Create Admin Account
         *
         */
        \App\Models\User::factory()->create([
            'name' => 'ADMIN',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
        ]);

        DB::table('user_roles')->insert([
            'user_id' => 2,
            'roles_id' => 3,
        ]);

        /**
         * Create Instructor Account
         *
         */
        \App\Models\User::factory()->create([
            'name' => 'INSTRUCTOR',
            'email' => 'instructor@example.com',
            'password' => Hash::make('instructor'),
        ]);

        DB::table('user_roles')->insert([
            'user_id' => 3,
            'roles_id' => 2,
        ]);


        /**
         * Create Member Account
         *
         */
        \App\Models\User::factory()->create([
            'name' => 'MEMBER',
            'email' => 'member@example.com',
            'password' => Hash::make('member'),
        ]);

        DB::table('user_roles')->insert([
            'user_id' => 4,
            'roles_id' => 1,
        ]);
    }
}
