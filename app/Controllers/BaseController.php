<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\Services;

abstract class BaseController extends Controller
{
    protected $session;
    protected $db;
    protected $request;
    protected $helpers = ['url', 'form', 'app'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->session = Services::session();
        $this->db = \Config\Database::connect();
        $this->request = Services::request();
    }

    protected function log_activity($action, $description = '')
    {
        $this->db->table('activity_logs')->insert([
            'user_id'    => $this->session->get('admin_id'),
            'username'   => $this->session->get('username'),
            'action'     => $action,
            'description' => $description,
            'ip_address' => $this->request->getIPAddress(),
            'user_agent' => $this->request->getUserAgent()->getAgentString(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
