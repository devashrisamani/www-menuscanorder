<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admindata extends Migration
{
    public function up()
    {
        $adminData = [
            [
                'username' => 'abc@abc.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
            ],
            [
                'username' => 'abc2@abc.com',
                'password' => password_hash('password789', PASSWORD_DEFAULT),
            ],
        ];

        $this->db->table('Admin')->insertBatch($adminData);
    }

    public function down()
    {
        $this->db->table('Admin')->where('username', 'admin1@example.com')->delete();
        $this->db->table('Admin')->where('username', 'admin2@example.com')->delete();
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
