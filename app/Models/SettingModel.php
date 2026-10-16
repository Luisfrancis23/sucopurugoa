<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['key', 'value', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getValue($key, $default = null)
    {
        $row = $this->where('key', $key)->first();
        return $row ? $row['value'] : $default;
    }

    public function setValue($key, $value)
    {
        $row = $this->where('key', $key)->first();
        if ($row) {
            return $this->update($row['id'], ['value' => $value]);
        }
        return $this->insert(['key' => $key, 'value' => $value]);
    }
}
