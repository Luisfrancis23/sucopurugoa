<?php

namespace App\Models;

use CodeIgniter\Model;

class FamilyCardModel extends Model
{
    protected $table = 'family_cards';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'number', 'nik', 'head_name', 'gender', 'birth_date',
        'address', 'aldeia_id', 'rt_id', 'phone', 'photo',
        'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;

    public function getWithRelations()
    {
        return $this->select('family_cards.*, aldeias.name as aldeia_name, rts.number as rt_number')
            ->join('aldeias', 'aldeias.id = family_cards.aldeia_id', 'left')
            ->join('rts', 'rts.id = family_cards.rt_id', 'left')
            ->findAll();
    }

    public function getTotal()
    {
        return $this->countAll();
    }

    public function search($keyword)
    {
        return $this->select('family_cards.*, aldeias.name as aldeia_name, rts.number as rt_number')
            ->join('aldeias', 'aldeias.id = family_cards.aldeia_id', 'left')
            ->join('rts', 'rts.id = family_cards.rt_id', 'left')
            ->like('family_cards.number', $keyword)
            ->orLike('family_cards.nik', $keyword)
            ->orLike('family_cards.head_name', $keyword)
            ->orLike('family_cards.phone', $keyword)
            ->findAll();
    }
}
