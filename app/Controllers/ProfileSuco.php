<?php

namespace App\Controllers;

use App\Models\ProfileSucoModel;

class ProfileSuco extends BaseController
{
    public function index()
    {
        $model = new ProfileSucoModel();
        $data['title'] = 'Profíl Suku';
        $data['profile'] = $model->first();

        if ($this->request->is('post')) {
            $rules = [
                'name' => 'required',
                'municipality' => 'required',
                'administrative_post' => 'required',
                'email' => 'valid_email',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $profileData = [
                'name'                => $this->request->getPost('name'),
                'municipality'        => $this->request->getPost('municipality'),
                'administrative_post' => $this->request->getPost('administrative_post'),
                'address'             => $this->request->getPost('address'),
                'email'               => $this->request->getPost('email'),
                'phone'               => $this->request->getPost('phone'),
            ];

            $logo = $this->request->getFile('logo');
            if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                $newName = 'logo_' . time() . '.' . $logo->getExtension();
                $logo->move('uploads/logos', $newName);
                $profileData['logo'] = $newName;
            }

            $photo = $this->request->getFile('photo');
            if ($photo && $photo->isValid() && !$photo->hasMoved()) {
                $newName = 'kantor_' . time() . '.' . $photo->getExtension();
                $photo->move('uploads/photos', $newName);
                $profileData['photo'] = $newName;
            }

            $profile = $model->first();
            if ($profile) {
                $model->update($profile['id'], $profileData);
            } else {
                $model->insert($profileData);
            }

            $this->log_activity('Edita Profíl Suku', 'Admin edita profíl suku.');
            return redirect()->to('/admin/profile-suco')->with('success', 'Profíl suku atualiza ho susesu.');
        }

        return view('admin/profile_suco/index', $data);
    }
}
