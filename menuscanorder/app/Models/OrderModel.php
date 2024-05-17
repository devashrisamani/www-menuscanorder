<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders'; // The name of the database table
    protected $primaryKey = 'order_id'; // The primary key column name

    protected $allowedFields = ['table_id', 'status']; // Fields that are writable

    protected $useTimestamps = true; // If your table has created_at, updated_at, and deleted_at fields
    protected $createdField  = 'created_at'; // Column name for the created timestamp
    protected $updatedField  = 'updated_at'; // Column name for the updated timestamp
    protected $deletedField  = 'deleted_at'; // Column name for the deleted timestamp, if you are using soft deletes

    protected $returnType = 'array'; // The return type of the results (array or object)

    // Example method to get orders by table ID
    public function getOrdersByTable($tableId)
    {
        return $this->where('table_id', $tableId)->findAll();
    }
    
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
