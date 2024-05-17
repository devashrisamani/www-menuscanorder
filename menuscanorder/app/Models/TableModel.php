<?php

namespace App\Models;

use CodeIgniter\Model;

class TableModel extends Model
{
    protected $table = 'tables';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'user_id', 'table_no', 'table_QR'];
    public function getTableByUserId($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}

// Referenced Generative AI to develop this page. Chat GPT and Pop AI.

