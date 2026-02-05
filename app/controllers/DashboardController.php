<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session_id()) {
            session_start();
        }

        // PROTECT ROUTE
        if (!isset($_SESSION['user'])) {
            Redirect::to('/login');
            exit;
        }

        $this->view('dashboard/index', [
            'title' => 'Dashboard',
            'email' => $_SESSION['user']['email']
        ]);
    }
}
