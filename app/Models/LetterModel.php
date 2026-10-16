<?php

namespace App\Models;

use CodeIgniter\Model;

class LetterModel extends Model
{
    protected $table = 'letters';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'letter_number', 'type', 'subject', 'content',
        'citizen_id', 'status', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
}
