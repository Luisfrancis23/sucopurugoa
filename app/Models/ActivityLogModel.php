<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table = 'activity_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'username', 'action', 'description',
        'ip_address', 'user_agent', 'created_at'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';

    public function getRecent($limit = 20)
    {
        return $this->orderBy('created_at', 'DESC')->findAll($limit);
    }
}
