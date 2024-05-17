<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Adduserid extends Migration
{
    public function up()
    {
        $this->forge->addColumn('Restaurant', [
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
        ]);

        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'SET NULL');
    }

    public function down()
    {
        $this->forge->dropForeignKey('Restaurants', 'restaurants_user_id_foreign');
        $this->forge->dropColumn('Restaurants', 'user_id');
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
