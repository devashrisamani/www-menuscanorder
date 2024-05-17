<?php

namespace App\Models;

use CodeIgniter\Model;

class CartItemModel extends Model
{
    protected $table = 'cart_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['item_id', 'user_id', 'table_no', 'quantity'];
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
