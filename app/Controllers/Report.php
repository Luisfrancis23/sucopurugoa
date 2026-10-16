<?php

namespace App\Controllers;

use App\Models\CitizenModel;
use App\Models\FamilyCardModel;
use App\Models\AldeiaModel;

class Report extends BaseController
{
    public function index()
    {
        $citizenModel = new CitizenModel();
        $data = [
            'title' => 'Relatóriu',
            'total_population' => $citizenModel->getTotal(),
            'total_male' => $citizenModel->getTotalMale(),
            'total_female' => $citizenModel->getTotalFemale(),
            'total_kk' => (new FamilyCardModel())->getTotal(),
            'total_aldeia' => (new AldeiaModel())->getTotal(),
            'total_born' => $citizenModel->getTotalBornThisMonth(),
            'total_died' => $citizenModel->getTotalDied(),
        ];
        return view('admin/reports/index', $data);
    }

    public function population()
    {
        $data['title'] = 'Relatóriu Populasaun';
        $data['total'] = (new CitizenModel())->getTotal();
        return view('admin/reports/population', $data);
    }

    public function familyCards()
    {
        $data['title'] = 'Relatóriu Uma Kain';
        $data['total'] = (new FamilyCardModel())->getTotal();
        return view('admin/reports/family_cards', $data);
    }

    public function aldeias()
    {
        $data['title'] = 'Relatóriu Aldeia';
        $data['total'] = (new AldeiaModel())->getTotal();
        return view('admin/reports/aldeias', $data);
    }

    public function education()
    {
        $data['title'] = 'Relatóriu Edukasaun';
        $data['total'] = (new CitizenModel())->getTotal();
        return view('admin/reports/education', $data);
    }

    public function occupation()
    {
        $data['title'] = 'Relatóriu Servisu';
        $data['total'] = (new CitizenModel())->getTotal();
        return view('admin/reports/occupation', $data);
    }
}
