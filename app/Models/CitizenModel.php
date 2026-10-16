<?php

namespace App\Models;

use CodeIgniter\Model;

class CitizenModel extends Model
{
    protected $table = 'citizens';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'photo', 'nik', 'full_name', 'gender', 'birth_place',
        'birth_date', 'age', 'religion', 'education', 'occupation',
        'marital_status', 'phone', 'address', 'aldeia_id', 'rt_id',
        'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nik'       => 'required|is_unique[citizens.nik,id,{id}]',
        'full_name' => 'required',
        'birth_date' => 'required',
    ];

    public function getWithRelations()
    {
        return $this->select('citizens.*, aldeias.name as aldeia_name, rts.number as rt_number')
            ->join('aldeias', 'aldeias.id = citizens.aldeia_id', 'left')
            ->join('rts', 'rts.id = citizens.rt_id', 'left')
            ->findAll();
    }

    public function getTotal()
    {
        return $this->countAll();
    }

    public function getTotalMale()
    {
        return $this->where('gender', 'M')->countAllResults();
    }

    public function getTotalFemale()
    {
        return $this->where('gender', 'F')->countAllResults();
    }

    public function getTotalBornThisMonth()
    {
        return $this->where('MONTH(created_at)', date('m'))
            ->where('YEAR(created_at)', date('Y'))
            ->countAllResults();
    }

    public function getTotalDied($month = null, $year = null)
    {
        return 0;
    }

    public function search($keyword)
    {
        return $this->select('citizens.*, aldeias.name as aldeia_name, rts.number as rt_number')
            ->join('aldeias', 'aldeias.id = citizens.aldeia_id', 'left')
            ->join('rts', 'rts.id = citizens.rt_id', 'left')
            ->like('citizens.nik', $keyword)
            ->orLike('citizens.full_name', $keyword)
            ->orLike('citizens.phone', $keyword)
            ->findAll();
    }

    public function getReligionStats()
    {
        return $this->select('religion, COUNT(*) as total')
            ->groupBy('religion')
            ->findAll();
    }

    public function getEducationStats()
    {
        return $this->select('education, COUNT(*) as total')
            ->groupBy('education')
            ->findAll();
    }

    public function getOccupationStats()
    {
        return $this->select('occupation, COUNT(*) as total')
            ->groupBy('occupation')
            ->findAll();
    }

    public function getPopulationByAldeia()
    {
        return $this->select('aldeias.name, COUNT(*) as total')
            ->join('aldeias', 'aldeias.id = citizens.aldeia_id', 'left')
            ->groupBy('aldeias.id')
            ->findAll();
    }
}
