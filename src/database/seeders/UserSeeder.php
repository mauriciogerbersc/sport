<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin ',
                'email' => 'admin@example.com',
                'password' => bcrypt(123456),
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt(123456),
                'role' => 'user',
            ]
        ];

        foreach ($users as $user) {
            User::factory()->create(
                $user
            );
        }
    }
}
