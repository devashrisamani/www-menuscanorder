<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQrTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'table_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => true,
            ],
            'table_no' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'table_QR' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

        ]);
        
        $this->forge->addKey('table_id', TRUE); // Set user_id as primary key
        $this->forge->createTable('tables'); // Create the User table
    }
    public function down()
    {
        $this->forge->dropTable('tables');
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
