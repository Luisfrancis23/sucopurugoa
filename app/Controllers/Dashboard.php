<?php

namespace App\Controllers;

use App\Models\AldeiaModel;
use App\Models\FamilyCardModel;
use App\Models\CitizenModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $citizenModel = new CitizenModel();
        $aldeiaModel = new AldeiaModel();
        $familyCardModel = new FamilyCardModel();

        $data = [
            'title' => 'Dashboard',
            'total_population' => $citizenModel->getTotal(),
            'total_male' => $citizenModel->getTotalMale(),
            'total_female' => $citizenModel->getTotalFemale(),
            'total_kk' => $familyCardModel->getTotal(),
            'total_aldeia' => $aldeiaModel->getTotal(),
            'total_born' => $citizenModel->getTotalBornThisMonth(),
            'total_died' => $citizenModel->getTotalDied(),
        ];

        return view('admin/dashboard/index', $data);
    }
}
