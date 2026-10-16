<?php

namespace App\Models;

use CodeIgniter\Model;

class RtModel extends Model
{
    protected $table = 'rts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['number', 'chief_name', 'aldeia_id', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getWithAldeia()
    {
        return $this->select('rts.*, aldeias.name as aldeia_name')
            ->join('aldeias', 'aldeias.id = rts.aldeia_id')
            ->findAll();
    }

    public function getTotal()
    {
        return $this->countAll();
    }
}
