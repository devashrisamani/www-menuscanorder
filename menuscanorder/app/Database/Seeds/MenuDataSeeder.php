<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuDataSeeder extends Seeder
{
    public function run()
    {
        // Load the database
        $db = \Config\Database::connect();

        // Sample user data
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT), // Hash the password
                'is_admin' => false,
            ],
            [
                'name' => 'Admin User',
                'email' => 'abc@abc.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT), // Hash the password
                'is_admin' => true,
            ],
            // Add more users as needed
        ];

        // Insert data into the users table
        $builder = $db->table('users');
        $builder->insertBatch($users);
    }
}