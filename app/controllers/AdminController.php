<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        if (!session_id()) {
            session_start();
        }

        // HARUS LOGIN
        if (!isset($_SESSION['user'])) {
            Redirect::to('login');
        }

        // HARUS ADMIN
        if ($_SESSION['user']['role'] !== 'admin') {
            die('403 - Forbidden');
        }

        $this->view('admin/index', [
            'title' => 'Admin Panel'
        ]);
    }
}
