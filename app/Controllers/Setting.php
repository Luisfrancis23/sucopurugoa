<?php

namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\AdminModel;

class Setting extends BaseController
{
    public function profile()
    {
        $data['title'] = 'Profíl Admin';
        $adminModel = new AdminModel();
        $data['admin'] = $adminModel->find($this->session->get('admin_id'));

        if ($this->request->is('post')) {
            $rules = [];

            $username = $this->request->getPost('username');
            if ($username !== $data['admin']['username']) {
                $rules['username'] = 'required|is_unique[admin.username]';
            }

            $password = $this->request->getPost('password');
            $confirmPassword = $this->request->getPost('confirm_password');

            $updateData = [];
            if (!empty($username)) {
                $updateData['username'] = $username;
            }

            if (!empty($password)) {
                if ($password !== $confirmPassword) {
                    return redirect()->back()->withInput()->with('error', 'Password no konfirmasaun password la hanesan.');
                }
                $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $photo = $this->request->getFile('photo');
            if ($photo && $photo->isValid() && !$photo->hasMoved()) {
                $newName = 'admin_' . time() . '.' . $photo->getExtension();
                $photo->move('uploads/photos', $newName);
                $updateData['photo'] = $newName;
            }

            if (!empty($updateData)) {
                $adminModel->update($data['admin']['id'], $updateData);
                if (isset($updateData['username'])) {
                    $this->session->set('username', $updateData['username']);
                }
                if (isset($updateData['photo'])) {
                    $this->session->set('photo', $updateData['photo']);
                }
                $this->log_activity('Atualiza Profíl', 'Admin atualiza profíl.');
                return redirect()->to('/admin/settings/profile')->with('success', 'Profíl atualiza ho susesu.');
            }
        }

        return view('admin/settings/profile', $data);
    }

    public function system()
    {
        $data['title'] = 'Konfigurasaun Sistema';
        $settingModel = new SettingModel();

        if ($this->request->is('post')) {
            $settingModel->setValue('system_name', $this->request->getPost('system_name'));

            $logo = $this->request->getFile('system_logo');
            if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                $newName = 'system_logo_' . time() . '.' . $logo->getExtension();
                $logo->move('uploads/logos', $newName);
                $settingModel->setValue('system_logo', $newName);
            }

            $this->log_activity('Atualiza Sistema', 'Admin atualiza konfigurasaun sistema.');
            return redirect()->to('/admin/settings/system')->with('success', 'Konfigurasaun sistema atualiza ho susesu.');
        }

        $data['system_name'] = $settingModel->getValue('system_name', 'Sistema Informasaun Jestaun Dadus Suku Purugoa');
        $data['system_logo'] = $settingModel->getValue('system_logo');
        return view('admin/settings/system', $data);
    }

    public function backup()
    {
        $data['title'] = 'Backup Database';
        return view('admin/settings/backup', $data);
    }

    public function doBackup()
    {
        $db = \Config\Database::connect();
        $dbName = $db->getDatabase();

        $tables = $db->listTables();
        $sql = '';

        foreach ($tables as $table) {
            try {
                $query = $db->query("SHOW CREATE TABLE `$table`")->getRow();
                $sql .= "\n\n" . $query->{'Create Table'} . ";\n\n";
                $rows = $db->table($table)->get()->getResultArray();
                foreach ($rows as $row) {
                    $columns = array_map(function ($col) use ($db) {
                        return $db->escape($col);
                    }, array_values($row));
                    $sql .= "INSERT INTO `$table` VALUES (" . implode(', ', $columns) . ");\n";
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        $filename = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
        $backupPath = ROOTPATH . 'uploads/backup/';
        if (!is_dir($backupPath)) {
            mkdir($backupPath, 0755, true);
        }
        file_put_contents($backupPath . $filename, $sql);

        $this->log_activity('Backup Database', "Backup database: $filename");
        return redirect()->to('/admin/settings/backup')->with('success', "Backup database ho naran $filename suksesu.");
    }

    public function downloadBackup($fileName)
    {
        $fileName = basename($fileName);
        if (pathinfo($fileName, PATHINFO_EXTENSION) !== 'sql') {
            return redirect()->to('/admin/settings/backup')->with('error', 'Ficheiru backup invalidu.');
        }

        $filePath = ROOTPATH . 'uploads/backup/' . $fileName;
        if (!file_exists($filePath)) {
            return redirect()->to('/admin/settings/backup')->with('error', 'Ficheiru backup la hetan.');
        }

        $this->log_activity('Download Backup', "Download backup: $fileName");
        return $this->response->download($filePath, null)->setFileName($fileName);
    }

    public function restore()
    {
        $data['title'] = 'Restore Database';
        $backupFile = basename($this->request->getPost('backup_file'));
        if ($backupFile && pathinfo($backupFile, PATHINFO_EXTENSION) === 'sql' && file_exists(ROOTPATH . 'uploads/backup/' . $backupFile)) {
            $sql = file_get_contents(ROOTPATH . 'uploads/backup/' . $backupFile);
            $db = \Config\Database::connect();
            try {
                $db->query("SET FOREIGN_KEY_CHECKS = 0");
                foreach (explode(";\n", $sql) as $query) {
                    if (trim($query) !== '') {
                        $db->query($query);
                    }
                }
                $db->query("SET FOREIGN_KEY_CHECKS = 1");
                $this->log_activity('Restore Database', "Restore database: $backupFile");
                return redirect()->to('/admin/settings/backup')->with('success', 'Database restore ho susesu.');
            } catch (\Exception $e) {
                return redirect()->to('/admin/settings/backup')->with('error', 'Erro restore database: ' . $e->getMessage());
            }
        }
        return redirect()->to('/admin/settings/backup')->with('error', 'Ficheiru backup la hetan.');
    }
}
