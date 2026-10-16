<?php

namespace App\Models;

use CodeIgniter\Model;

class AldeiaModel extends Model
{
    protected $table = 'aldeias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['code', 'name', 'chief_name', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    protected $validationRules = [
        'code' => 'required|is_unique[aldeias.code,id,{id}]',
        'name' => 'required',
    ];

    public function getTotal()
    {
        return $this->countAll();
    }
}
