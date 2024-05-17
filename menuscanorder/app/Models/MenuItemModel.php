<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuItemModel extends Model
{
    protected $table = 'MenuItem';
    protected $primaryKey = 'item_id';
    protected $allowedFields = ['user_id', 'name', 'description', 'price','item_id'];
    protected $returnType = 'array';
    
    
    public function deleteItemById($item_id)
    {
        $result = $this->delete($item_id);
        if ($result) {
            return true;
        } else {
            log_message('error', 'Failed to delete menu item with ID ' . $item_id . '. Error: ' . $this->error());
            return false;
        }
    }

}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
