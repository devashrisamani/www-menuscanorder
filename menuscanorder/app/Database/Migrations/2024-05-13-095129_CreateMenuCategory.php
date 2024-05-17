<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuCategory extends Migration
{
    public function up()
    {
        // Creates the 'MenuCategory' table with necessary fields
        $this->forge->addField([
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
        ]);

        $this->forge->addKey('category_id', TRUE); // Sets 'category_id' as the primary key
        //$this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE'); // Adds a foreign key constraint to 'user_id' which references the 'id' in 'users' table
        $this->forge->createTable('MenuCategory'); // Creates the table
    }

    public function down()
    {
        // Drops the 'MenuCategory' table
        $this->forge->dropTable('MenuCategory', TRUE);
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
