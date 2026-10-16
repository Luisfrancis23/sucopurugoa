<?php

namespace App\Controllers;

use App\Models\CitizenModel;
use App\Models\FamilyCardModel;

class Search extends BaseController
{
    public function index()
    {
        $data['title'] = 'Peskiza Dadus';
        $data['results'] = [];
        $data['keyword'] = '';
        $data['type'] = '';

        if ($this->request->is('get') && $this->request->getGet('keyword')) {
            $keyword = $this->request->getGet('keyword');
            $type = $this->request->getGet('type');
            $data['keyword'] = $keyword;
            $data['type'] = $type;

            $citizenModel = new CitizenModel();
            $familyModel = new FamilyCardModel();

            if ($type === 'nik') {
                $data['results'] = $citizenModel->search($keyword);
            } elseif ($type === 'name') {
                $data['results'] = $citizenModel->search($keyword);
            } elseif ($type === 'kk') {
                $data['results'] = $familyModel->search($keyword);
            } elseif ($type === 'phone') {
                $citizenResults = $citizenModel->search($keyword);
                $familyResults = $familyModel->search($keyword);
                $data['results'] = array_merge($citizenResults, $familyResults);
            }
        }

        return view('admin/search/index', $data);
    }
}
