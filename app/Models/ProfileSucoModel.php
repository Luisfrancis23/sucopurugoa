<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileSucoModel extends Model
{
    protected $table = 'profile_suco';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'logo', 'photo', 'municipality',
        'administrative_post', 'address', 'email', 'phone',
        'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
