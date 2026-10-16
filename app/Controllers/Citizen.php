<?php

namespace App\Controllers;

use App\Models\CitizenModel;
use App\Models\AldeiaModel;
use App\Models\RtModel;

class Citizen extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new CitizenModel();
    }

    public function index()
    {
        $data['title'] = 'Jestaun Dadus Sidadaun';
        $data['citizens'] = $this->model->getWithRelations();
        return view('admin/citizens/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Aumenta Dadus Sidadaun';
        $data['aldeias'] = (new AldeiaModel())->findAll();
        $data['rts'] = (new RtModel())->findAll();
        return view('admin/citizens/create', $data);
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/citizens');
        }

        $rules = [
            'nik'       => 'required|is_unique[citizens.nik]',
            'full_name' => 'required',
            'birth_date' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $birthDate = $this->request->getPost('birth_date');
        $age = 0;
        if (!empty($birthDate)) {
            $birth = new \DateTime($birthDate);
            $today = new \DateTime();
            $age = $birth->diff($today)->y;
        }

        $data = [
            'photo'          => null,
            'nik'            => $this->request->getPost('nik'),
            'full_name'      => $this->request->getPost('full_name'),
            'gender'         => $this->request->getPost('gender'),
            'birth_place'    => $this->request->getPost('birth_place'),
            'birth_date'     => $birthDate,
            'age'            => $age,
            'religion'       => $this->request->getPost('religion'),
            'education'      => $this->request->getPost('education'),
            'occupation'     => $this->request->getPost('occupation'),
            'marital_status' => $this->request->getPost('marital_status'),
            'phone'          => $this->request->getPost('phone'),
            'address'        => $this->request->getPost('address'),
            'aldeia_id'      => $this->request->getPost('aldeia_id'),
            'rt_id'          => $this->request->getPost('rt_id'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = 'citizen_' . time() . '_' . $photo->getRandomName();
            $photo->move('uploads/photos', $newName);
            $data['photo'] = $newName;
        }

        $this->model->save($data);
        $this->log_activity('Aumenta Sidadaun', "Aumenta sidadaun: {$data['full_name']} - NIK: {$data['nik']}");
        return redirect()->to('/admin/citizens')->with('success', 'Dadus sidadaun aumenta ho susesu.');
    }

    public function edit($id)
    {
        $data['title'] = 'Edita Dadus Sidadaun';
        $data['citizen'] = $this->model->find($id);
        $data['aldeias'] = (new AldeiaModel())->findAll();
        $data['rts'] = (new RtModel())->findAll();
        if (!$data['citizen']) {
            return redirect()->to('/admin/citizens')->with('error', 'Dadus sidadaun la hetan.');
        }
        return view('admin/citizens/edit', $data);
    }

    public function update($id)
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/citizens');
        }

        $citizen = $this->model->find($id);
        if (!$citizen) {
            return redirect()->to('/admin/citizens')->with('error', 'Dadus sidadaun la hetan.');
        }

        $rules = [
            'nik'       => 'required|is_unique[citizens.nik,id,' . $id . ']',
            'full_name' => 'required',
            'birth_date' => 'required',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $birthDate = $this->request->getPost('birth_date');
        $age = 0;
        if (!empty($birthDate)) {
            $birth = new \DateTime($birthDate);
            $today = new \DateTime();
            $age = $birth->diff($today)->y;
        }

        $data = [
            'nik'            => $this->request->getPost('nik'),
            'full_name'      => $this->request->getPost('full_name'),
            'gender'         => $this->request->getPost('gender'),
            'birth_place'    => $this->request->getPost('birth_place'),
            'birth_date'     => $birthDate,
            'age'            => $age,
            'religion'       => $this->request->getPost('religion'),
            'education'      => $this->request->getPost('education'),
            'occupation'     => $this->request->getPost('occupation'),
            'marital_status' => $this->request->getPost('marital_status'),
            'phone'          => $this->request->getPost('phone'),
            'address'        => $this->request->getPost('address'),
            'aldeia_id'      => $this->request->getPost('aldeia_id'),
            'rt_id'          => $this->request->getPost('rt_id'),
        ];

        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = 'citizen_' . time() . '_' . $photo->getRandomName();
            $photo->move('uploads/photos', $newName);
            $data['photo'] = $newName;
        }

        $this->model->update($id, $data);
        $this->log_activity('Edita Sidadaun', "Edita sidadaun: {$data['full_name']}");
        return redirect()->to('/admin/citizens')->with('success', 'Dadus sidadaun atualiza ho sesusu.');
    }

    public function delete($id)
    {
        $citizen = $this->model->find($id);
        if ($citizen) {
            if ($citizen['photo'] && file_exists('uploads/photos/' . $citizen['photo'])) {
                unlink('uploads/photos/' . $citizen['photo']);
            }
            $this->model->delete($id);
            $this->log_activity('Apaga Sidadaun', "Apaga sidadaun: {$citizen['full_name']}");
            return redirect()->to('/admin/citizens')->with('success', 'Dadus sidadaun apaga ho susesu.');
        }
        return redirect()->to('/admin/citizens')->with('error', 'Dadus sidadaun la hetan.');
    }

    public function print($id)
    {
        $data['citizen'] = $this->model
            ->select('citizens.*, aldeias.name as aldeia_name, rts.number as rt_number')
            ->join('aldeias', 'aldeias.id = citizens.aldeia_id', 'left')
            ->join('rts', 'rts.id = citizens.rt_id', 'left')
            ->find($id);
        return view('admin/citizens/print', $data);
    }

    public function detail($id)
    {
        $citizen = $this->model
            ->select('citizens.*, aldeias.name as aldeia_name, rts.number as rt_number')
            ->join('aldeias', 'aldeias.id = citizens.aldeia_id', 'left')
            ->join('rts', 'rts.id = citizens.rt_id', 'left')
            ->find($id);

        if (!$citizen) {
            return $this->response->setJSON(['error' => 'Dadus la hetan'])->setStatusCode(404);
        }

        return $this->response->setJSON($citizen);
    }
}
