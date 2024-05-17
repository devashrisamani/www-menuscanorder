<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addtocarttable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
                'auto_increment' => FALSE
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
                'auto_increment' => FALSE
            ],
            'table_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE
            ]
        ]);

        // Adding a primary key
        // You can adjust this based on your requirements or add more keys
        $this->forge->addKey('item_id', TRUE);
        $this->forge->addKey('user_id', TRUE);

        // Create the table
        $this->forge->createTable('cart_items', TRUE);
    }

    public function down()
    {
        // Drop the table if needed
        $this->forge->dropTable('cart_items', TRUE);
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
