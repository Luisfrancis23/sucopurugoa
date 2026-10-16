<?php

namespace App\Controllers;

use App\Models\ActivityLogModel;

class ActivityLog extends BaseController
{
    public function index()
    {
        $data['title'] = 'Log Aktividade';
        $model = new ActivityLogModel();
        $data['logs'] = $model->orderBy('created_at', 'DESC')->findAll(100);
        return view('admin/activity_logs/index', $data);
    }
}
