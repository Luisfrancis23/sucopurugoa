<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        // Admin default
        $this->db->table('admin')->insert([
            'username'   => 'admin',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            'photo'      => 'default.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Profile Suco
        $this->db->table('profile_suco')->insert([
            'name'                => 'Suku Purugoa',
            'logo'                => null,
            'photo'               => null,
            'municipality'        => 'Ermera',
            'administrative_post' => 'Ermera',
            'address'             => 'Suku Purugoa, Postu Ermera, Munisipiu Ermera',
            'email'               => 'sucopurugoa@gmail.com',
            'phone'               => '+670 77777777',
            'created_at'          => date('Y-m-d H:i:s'),
            'updated_at'          => date('Y-m-d H:i:s'),
        ]);

        // Insert sample aldeias
        $aldeias = [
            ['code' => 'AL001', 'name' => 'Aldeia Ailoga', 'chief_name' => 'João da Silva'],
            ['code' => 'AL002', 'name' => 'Aldeia Tatuli', 'chief_name' => 'Maria Pereira'],
            ['code' => 'AL003', 'name' => 'Aldeia Leohata', 'chief_name' => 'Antonio dos Santos'],
            ['code' => 'AL004', 'name' => 'Aldeia Lebometa', 'chief_name' => 'Jose Soares'],
        ];
        foreach ($aldeias as $a) {
            $a['created_at'] = date('Y-m-d H:i:s');
            $a['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('aldeias')->insert($a);
        }

        // Insert sample RTs
        $rts = [
            ['number' => 'RT 01', 'chief_name' => 'Carlos de Jesus', 'aldeia_id' => 1],
            ['number' => 'RT 02', 'chief_name' => 'Lucia Freitas', 'aldeia_id' => 1],
            ['number' => 'RT 03', 'chief_name' => 'Joao da Costa', 'aldeia_id' => 2],
            ['number' => 'RT 04', 'chief_name' => 'Pedro Alves', 'aldeia_id' => 3],
        ];
        foreach ($rts as $r) {
            $r['created_at'] = date('Y-m-d H:i:s');
            $r['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('rts')->insert($r);
        }

        // Insert sample family cards
        $families = [
            ['number' => 'KK001', 'nik' => 'NIK001', 'head_name' => 'João da Silva', 'gender' => 'M', 'birth_date' => '1980-05-12', 'address' => 'Rua A, No.1', 'aldeia_id' => 1, 'rt_id' => 1, 'phone' => '+670 71111111'],
            ['number' => 'KK002', 'nik' => 'NIK002', 'head_name' => 'Maria Pereira', 'gender' => 'F', 'birth_date' => '1985-08-22', 'address' => 'Rua B, No.5', 'aldeia_id' => 2, 'rt_id' => 3, 'phone' => '+670 72222222'],
        ];
        foreach ($families as $f) {
            $f['created_at'] = date('Y-m-d H:i:s');
            $f['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('family_cards')->insert($f);
        }

        // Insert sample citizens
        $citizens = [
            ['nik' => 'NIK001', 'full_name' => 'João da Silva', 'gender' => 'M', 'birth_place' => 'Dili', 'birth_date' => '1980-05-12', 'age' => 44, 'religion' => 'Katóliku', 'education' => 'SMU', 'occupation' => 'Agrikultór', 'marital_status' => 'Kaben', 'phone' => '+670 71111111', 'address' => 'Rua A, No.1', 'aldeia_id' => 1, 'rt_id' => 1],
            ['nik' => 'NIK002', 'full_name' => 'Maria Pereira', 'gender' => 'F', 'birth_place' => 'Ermera', 'birth_date' => '1985-08-22', 'age' => 39, 'religion' => 'Katóliku', 'education' => 'SMU', 'occupation' => 'Servisu Públiku', 'marital_status' => 'Kaben', 'phone' => '+670 72222222', 'address' => 'Rua B, No.5', 'aldeia_id' => 2, 'rt_id' => 3],
            ['nik' => 'NIK003', 'full_name' => 'Antonio dos Santos', 'gender' => 'M', 'birth_place' => 'Ermera', 'birth_date' => '1990-01-15', 'age' => 34, 'religion' => 'Katóliku', 'education' => 'Fakuldade', 'occupation' => 'Mestre Eskola', 'marital_status' => 'Kaben', 'phone' => '+670 73333333', 'address' => 'Rua C, No.10', 'aldeia_id' => 3, 'rt_id' => 4],
            ['nik' => 'NIK004', 'full_name' => 'Ana Soares', 'gender' => 'F', 'birth_place' => 'Baucau', 'birth_date' => '1995-06-20', 'age' => 29, 'religion' => 'Protestante', 'education' => 'SMU', 'occupation' => 'Enfermeira', 'marital_status' => 'Solteiru', 'phone' => '+670 74444444', 'address' => 'Rua D, No.2', 'aldeia_id' => 1, 'rt_id' => 2],
            ['nik' => 'NIK005', 'full_name' => 'Carlos de Jesus', 'gender' => 'M', 'birth_place' => 'Dili', 'birth_date' => '1975-03-10', 'age' => 49, 'religion' => 'Katóliku', 'education' => 'SGD', 'occupation' => 'Pescador', 'marital_status' => 'Kaben', 'phone' => '+670 75555555', 'address' => 'Rua E, No.8', 'aldeia_id' => 2, 'rt_id' => 3],
        ];
        foreach ($citizens as $c) {
            $c['created_at'] = date('Y-m-d H:i:s');
            $c['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('citizens')->insert($c);
        }

        // Insert settings
        $settings = [
            ['key' => 'system_name', 'value' => 'Sistema Informasaun Jestaun Dadus Suku Purugoa'],
            ['key' => 'system_logo', 'value' => null],
            ['key' => 'app_version', 'value' => '1.0.0'],
        ];
        foreach ($settings as $s) {
            $s['created_at'] = date('Y-m-d H:i:s');
            $s['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('settings')->insert($s);
        }

        echo "Seeder executed successfully!\n";
    }
}
