<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
    public function up()
    {
        // Define the Admin table
        $this->forge->addField([
            'admin_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addKey('admin_id', TRUE); // Set admin_id as primary key
        $this->forge->createTable('Admin'); // Create the Admin table
    }

    public function down()
    {
        // Drop the Admin table if needed
        $this->forge->dropTable('Admin');
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
