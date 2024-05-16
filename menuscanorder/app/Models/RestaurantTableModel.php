<?php

namespace App\Models;

use CodeIgniter\Model;

class RestaurantTableModel extends Model
{
    protected $table = 'Restaurant'; // Use the actual table name
    protected $primaryKey = 'id'; // Primary key of the table
    protected $allowedFields = ['restaurant_name', 'phone_number'];
  
}

