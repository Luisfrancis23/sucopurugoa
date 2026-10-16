<?php

namespace App\Controllers;

use App\Models\AldeiaModel;

class Aldeia extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new AldeiaModel();
    }

    public function index()
    {
        $data['title'] = 'Jestaun Aldeia';
        $data['aldeias'] = $this->model->findAll();
        return view('admin/aldeias/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Aumenta Aldeia';
        return view('admin/aldeias/create', $data);
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/aldeias');
        }

        $rules = [
            'code' => 'required|is_unique[aldeias.code]',
            'name' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->save([
            'code'       => $this->request->getPost('code'),
            'name'       => $this->request->getPost('name'),
            'chief_name' => $this->request->getPost('chief_name'),
        ]);

        $this->log_activity('Aumenta Aldeia', "Aumenta aldeia: {$this->request->getPost('name')}");
        return redirect()->to('/admin/aldeias')->with('success', 'Aldeia aumenta ho susesu.');
    }

    public function edit($id)
    {
        $data['title'] = 'Edita Aldeia';
        $data['aldeia'] = $this->model->find($id);
        if (!$data['aldeia']) {
            return redirect()->to('/admin/aldeias')->with('error', 'Aldeia la hetan.');
        }
        return view('admin/aldeias/edit', $data);
    }

    public function update($id)
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/aldeias');
        }

        $rules = [
            'code' => 'required|is_unique[aldeias.code,id,' . $id . ']',
            'name' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->model->update($id, [
            'code'       => $this->request->getPost('code'),
            'name'       => $this->request->getPost('name'),
            'chief_name' => $this->request->getPost('chief_name'),
        ]);

        $this->log_activity('Edita Aldeia', "Edita aldeia: {$this->request->getPost('name')}");
        return redirect()->to('/admin/aldeias')->with('success', 'Aldeia atualiza ho susesu.');
    }

    public function delete($id)
    {
        $aldeia = $this->model->find($id);
        if ($aldeia) {
            $this->model->delete($id);
            $this->log_activity('Apaga Aldeia', "Apaga aldeia: {$aldeia['name']}");
            return redirect()->to('/admin/aldeias')->with('success', 'Aldeia apaga ho susesu.');
        }
        return redirect()->to('/admin/aldeias')->with('error', 'Aldeia la hetan.');
    }
}
