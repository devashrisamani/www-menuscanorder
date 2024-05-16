<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'email', 'password', 'is_admin' , 'contact_name', 'contact_number', 'contact_address', 'restaurant_name']; // Correctly cased
    protected $returnType = 'array';

    public function getUserByEmail($email)
    {
        // Retrieves user information by email
        return $this->select('id, email, password, is_admin, contact_name, contact_number, contact_address, restaurant_name, name')
                    ->where('email', $email)
                    ->first();
    }
}


