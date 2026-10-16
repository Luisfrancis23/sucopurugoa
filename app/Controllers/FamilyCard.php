<?php

namespace App\Controllers;

use App\Models\FamilyCardModel;
use App\Models\AldeiaModel;
use App\Models\RtModel;

class FamilyCard extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new FamilyCardModel();
    }

    public function index()
    {
        $data['title'] = 'Jestaun Uma Kain';
        $data['families'] = $this->model->getWithRelations();
        return view('admin/family_cards/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Aumenta Uma Kain';
        $data['aldeias'] = (new AldeiaModel())->findAll();
        $data['rts'] = (new RtModel())->findAll();
        return view('admin/family_cards/create', $data);
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/family-cards');
        }

        $rules = [
            'number'    => 'required|is_unique[family_cards.number]',
            'head_name' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'number'     => $this->request->getPost('number'),
            'nik'        => $this->request->getPost('nik'),
            'head_name'  => $this->request->getPost('head_name'),
            'gender'     => $this->request->getPost('gender'),
            'birth_date' => $this->request->getPost('birth_date'),
            'address'    => $this->request->getPost('address'),
            'aldeia_id'  => $this->request->getPost('aldeia_id'),
            'rt_id'      => $this->request->getPost('rt_id'),
            'phone'      => $this->request->getPost('phone'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = 'kk_' . time() . '_' . $photo->getRandomName();
            $photo->move('uploads/photos', $newName);
            $data['photo'] = $newName;
        }

        $this->model->save($data);
        $this->log_activity('Aumenta Uma Kain', "Aumenta KK: {$data['number']} - {$data['head_name']}");
        return redirect()->to('/admin/family-cards')->with('success', 'Uma kain aumenta ho susesu.');
    }

    public function edit($id)
    {
        $data['title'] = 'Edita Uma Kain';
        $data['family'] = $this->model->find($id);
        $data['aldeias'] = (new AldeiaModel())->findAll();
        $data['rts'] = (new RtModel())->findAll();
        if (!$data['family']) {
            return redirect()->to('/admin/family-cards')->with('error', 'Uma kain la hetan.');
        }
        return view('admin/family_cards/edit', $data);
    }

    public function update($id)
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/family-cards');
        }

        $family = $this->model->find($id);
        if (!$family) {
            return redirect()->to('/admin/family-cards')->with('error', 'Uma kain la hetan.');
        }

        $rules = [
            'number'    => 'required|is_unique[family_cards.number,id,' . $id . ']',
            'head_name' => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'number'     => $this->request->getPost('number'),
            'nik'        => $this->request->getPost('nik'),
            'head_name'  => $this->request->getPost('head_name'),
            'gender'     => $this->request->getPost('gender'),
            'birth_date' => $this->request->getPost('birth_date'),
            'address'    => $this->request->getPost('address'),
            'aldeia_id'  => $this->request->getPost('aldeia_id'),
            'rt_id'      => $this->request->getPost('rt_id'),
            'phone'      => $this->request->getPost('phone'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = 'kk_' . time() . '_' . $photo->getRandomName();
            $photo->move('uploads/photos', $newName);
            $data['photo'] = $newName;
        }

        $this->model->update($id, $data);
        $this->log_activity('Edita Uma Kain', "Edita KK: {$data['number']}");
        return redirect()->to('/admin/family-cards')->with('success', 'Uma kain atualiza ho susesu.');
    }

    public function delete($id)
    {
        $family = $this->model->find($id);
        if ($family) {
            if ($family['photo'] && file_exists('uploads/photos/' . $family['photo'])) {
                unlink('uploads/photos/' . $family['photo']);
            }
            $this->model->delete($id);
            $this->log_activity('Apaga Uma Kain', "Apaga KK: {$family['number']}");
            return redirect()->to('/admin/family-cards')->with('success', 'Uma kain apaga ho susesu.');
        }
        return redirect()->to('/admin/family-cards')->with('error', 'Uma kain la hetan.');
    }

    public function print($id)
    {
        $data['family'] = $this->model
            ->select('family_cards.*, aldeias.name as aldeia_name, rts.number as rt_number')
            ->join('aldeias', 'aldeias.id = family_cards.aldeia_id', 'left')
            ->join('rts', 'rts.id = family_cards.rt_id', 'left')
            ->find($id);
        return view('admin/family_cards/print', $data);
    }
}
