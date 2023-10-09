<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            //Admin
            [
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'username' => 'Admin 1',
                'email' => 'admin@admin.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
            //content_creator
            [
                'firstname' => 'Content',
                'lastname' => 'Creator',
                'username' => 'Content Creator 1',
                'email' => 'content_creator@content_creator.com',
                'password' => Hash::make('222'),
                'role' => 'content_creator',
                'status' => 'active',
            ],
            //curriculum_lead
            [
                'firstname' => 'Curriculum',
                'lastname' => 'Lead',
                'username' => 'Curriculum Lead 1',
                'email' => 'curriculum_lead@ccurriculum_lead.com',
                'password' => Hash::make('333'),
                'role' => 'curriculum_lead',
                'status' => 'active',
            ],
            //user
            [
                'firstname' => 'User',
                'lastname' => 'User',
                'username' => 'User 1',
                'email' => 'user@user.com',
                'password' => Hash::make('444'),
                'role' => 'user',
                'status' => 'active',
            ]
        ]);
    }
}
