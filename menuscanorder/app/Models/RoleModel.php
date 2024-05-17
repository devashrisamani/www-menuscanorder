<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles'; // The name of the database table
    protected $primaryKey = 'role_id'; // The primary key column name

    protected $allowedFields = ['role_name']; // Fields that are writable

    protected $useTimestamps = false; // Set this to true if you are using created_at, updated_at fields

    protected $returnType = 'array'; // The return type of the results (array or object)
    
    // If you have created_at, updated_at, or deleted_at fields, specify them here:
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // You can add custom methods for your role logic if needed
    // For example, a method to find a role by name might look like this:
    public function getRoleByName($roleName)
    {
        return $this->where('role_name', $roleName)->first();
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.
