<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInitialTables extends Migration
{
    public function up()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        // Admin
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'username'   => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'password'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'photo'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'default' => 'default.png'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admin', true);

        // Profile Suco
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'              => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'logo'              => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'photo'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'municipality'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'administrative_post' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'address'           => ['type' => 'TEXT', 'null' => true],
            'email'             => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'phone'             => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profile_suco', true);

        // Aldeias
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'code'       => ['type' => 'VARCHAR', 'constraint' => 20, 'unique' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'chief_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('aldeias', true);

        // RTs
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'number'     => ['type' => 'VARCHAR', 'constraint' => 20],
            'chief_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'aldeia_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('aldeia_id', 'aldeias', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rts', true);

        // Family Cards (Uma Kain)
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'number'     => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'nik'        => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'head_name'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'gender'     => ['type' => 'ENUM', 'constraint' => ['M', 'F']],
            'birth_date' => ['type' => 'DATE', 'null' => true],
            'address'    => ['type' => 'TEXT', 'null' => true],
            'aldeia_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'rt_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'phone'      => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'photo'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('aldeia_id', 'aldeias', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('rt_id', 'rts', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('family_cards', true);

        // Citizens
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'photo'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'nik'           => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'full_name'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'gender'        => ['type' => 'ENUM', 'constraint' => ['M', 'F']],
            'birth_place'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'birth_date'    => ['type' => 'DATE'],
            'age'           => ['type' => 'INT', 'constraint' => 3, 'null' => true, 'default' => 0],
            'religion'      => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'education'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'occupation'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'marital_status' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'phone'         => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'address'       => ['type' => 'TEXT', 'null' => true],
            'aldeia_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'rt_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('aldeia_id', 'aldeias', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('rt_id', 'rts', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('citizens', true);

        // Letters
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'letter_number' => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'type'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'subject'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'content'     => ['type' => 'TEXT', 'null' => true],
            'citizen_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'status'      => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'pending'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('citizen_id', 'citizens', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('letters', true);

        // Settings
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'key'        => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'value'      => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings', true);

        // Activity Logs
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'username'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'action'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT', 'null' => true],
            'ip_address'  => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'user_agent'  => ['type' => 'TEXT', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('activity_logs', true);

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function down()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $this->forge->dropTable('activity_logs', true);
        $this->forge->dropTable('settings', true);
        $this->forge->dropTable('letters', true);
        $this->forge->dropTable('citizens', true);
        $this->forge->dropTable('family_cards', true);
        $this->forge->dropTable('rts', true);
        $this->forge->dropTable('aldeias', true);
        $this->forge->dropTable('profile_suco', true);
        $this->forge->dropTable('admin', true);
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }
}
