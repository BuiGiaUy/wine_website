<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@wine.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@wine.com',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->command->info('Admin account created successfully!');
        $this->command->info('Email: admin@wine.com');
        $this->command->info('Password: admin123');
        $this->command->warn('Please change the password after first login!');
    }
}
