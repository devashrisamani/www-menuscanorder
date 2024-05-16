<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin1@admin1.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT)  // Using password hashing for security
            ],
            [
                'username' => 'admin2@admin2.com',
                'password' => password_hash('admin234', PASSWORD_DEFAULT)
            ]
        ];

        // Using a loop to insert multiple users
        foreach ($data as $datum) {
            $this->db->table('Admin')->insert($datum);
        }
    }
}
