<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'Admin';
    protected $allowedFields = ['username', 'password'];

    // Method to validate admin credentials
    public function validateAdmin($email, $password)
    {
        // Find the admin by email or username
        $admin = $this->asArray()
                      ->where(['email' => $email])
                      ->orWhere(['username' => $email])
                      ->first();

        // Check if admin exists and password is correct
        if ($admin && password_verify($password, $admin['password'])) {
            return true;
        }

        return false;
    }
}
