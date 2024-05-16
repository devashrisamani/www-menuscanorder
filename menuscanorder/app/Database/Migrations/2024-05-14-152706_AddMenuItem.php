<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMenuItem extends Migration
{
    public function up()
    {
        // Adding a column 'user_id' to the 'MenuItem' table
        $this->forge->addColumn('MenuItem', [
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'price', // specify the column after which the new column should be added, if necessary
            ],
        ]);

        // Adding a foreign key relationship to the 'Users' table
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        // Removing the foreign key first, to avoid any dependency issues
        $this->forge->dropForeignKey('MenuItem', 'MenuItem_user_id_foreign');

        // Removing the column 'user_id' from the 'MenuItem' table
        $this->forge->dropColumn('MenuItem', 'user_id');
    }
}
