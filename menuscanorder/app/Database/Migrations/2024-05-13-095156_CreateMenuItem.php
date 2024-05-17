<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuItem extends Migration
{
    public function up()
    {
        // Creates the 'MenuItem' table with necessary fields
        $this->forge->addField([
            'item_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT'
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ]
        ]);

        $this->forge->addKey('item_id', TRUE); // Sets 'item_id' as the primary key
        $this->forge->addForeignKey('category_id', 'MenuCategory', 'category_id', 'CASCADE', 'CASCADE'); // Adds a foreign key constraint to 'category_id'
        $this->forge->createTable('MenuItem'); // Creates the table
    }

    public function down()
    {
        // Drops the 'MenuItem' table
        $this->forge->dropTable('MenuItem', TRUE);
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.

