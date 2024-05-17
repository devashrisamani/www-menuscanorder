<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddQuantityToCartItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('cart_items', [
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
                'default' => 1
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('cart_items', 'quantity');
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
