<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items'; // The table this model is associated with
    protected $primaryKey = 'order_item_id'; // The primary key for the table

    protected $allowedFields = ['order_id', 'item_id', 'quantity']; // The fields that can be set through the model

    // If your table includes created_at, updated_at, or deleted_at columns, and you want to use them
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at'; // If you are using soft deletes

    // You can also specify the return type of the results this model will provide
    protected $returnType = 'array'; // Could be 'object' or a class name if using entities

    // If needed, define relationships with other tables, for example:
    protected $with = ['menu_items']; // This presumes you have defined the appropriate Entity with relations or are using an array

    // Custom methods for complex queries can be added here, for example, to get order items for a specific order:
    public function getOrderItemsByOrder($orderId)
    {
        return $this->where('order_id', $orderId)->findAll();
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
