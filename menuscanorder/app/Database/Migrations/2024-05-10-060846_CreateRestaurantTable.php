<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRestaurantTable extends Migration
{
    public function up()
    {
        // Define the table structure
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'restaurant_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
        ]);

        // Set the primary key
        $this->forge->addKey('id', TRUE);

        // Create the table
        $this->forge->createTable('Restaurant', TRUE);
    }

    public function down()
    {
        // Drop the table if it exists
        $this->forge->dropTable('Restaurant', TRUE);
    }
}
