<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Adduserfields extends Migration
{
    public function up()
    {
        // Add new fields to the "users" table
        $fields = [
            'restaurant_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'contact_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'contact_address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        // Remove the added fields from the "users" table
        $this->forge->dropColumn('users', 'restaurant_name');
        $this->forge->dropColumn('users', 'contact_name');
        $this->forge->dropColumn('users', 'contact_number');
        $this->forge->dropColumn('users', 'contact_address');
    }

}
