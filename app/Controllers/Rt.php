<?php

namespace App\Controllers;

use App\Models\RtModel;
use App\Models\AldeiaModel;

class Rt extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new RtModel();
    }

    public function index()
    {
        $data['title'] = 'Jestaun RT';
        $data['rts'] = $this->model->getWithAldeia();
        return view('admin/rts/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Aumenta RT';
        $data['aldeias'] = (new AldeiaModel())->findAll();
        return view('admin/rts/create', $data);
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/rts');
        }

        $this->model->save([
            'number'     => $this->request->getPost('number'),
            'chief_name' => $this->request->getPost('chief_name'),
            'aldeia_id'  => $this->request->getPost('aldeia_id'),
        ]);

        $this->log_activity('Aumenta RT', "Aumenta RT: {$this->request->getPost('number')}");
        return redirect()->to('/admin/rts')->with('success', 'RT aumenta ho susesu.');
    }

    public function edit($id)
    {
        $data['title'] = 'Edita RT';
        $data['rt'] = $this->model->find($id);
        $data['aldeias'] = (new AldeiaModel())->findAll();
        if (!$data['rt']) {
            return redirect()->to('/admin/rts')->with('error', 'RT la hetan.');
        }
        return view('admin/rts/edit', $data);
    }

    public function update($id)
    {
        if (!$this->request->is('post')) {
            return redirect()->to('/admin/rts');
        }

        $this->model->update($id, [
            'number'     => $this->request->getPost('number'),
            'chief_name' => $this->request->getPost('chief_name'),
            'aldeia_id'  => $this->request->getPost('aldeia_id'),
        ]);

        $this->log_activity('Edita RT', "Edita RT: {$this->request->getPost('number')}");
        return redirect()->to('/admin/rts')->with('success', 'RT atualiza ho susesu.');
    }

    public function delete($id)
    {
        $rt = $this->model->find($id);
        if ($rt) {
            $this->model->delete($id);
            $this->log_activity('Apaga RT', "Apaga RT: {$rt['number']}");
            return redirect()->to('/admin/rts')->with('success', 'RT apaga ho susesu.');
        }
        return redirect()->to('/admin/rts')->with('error', 'RT la hetan.');
    }
}
