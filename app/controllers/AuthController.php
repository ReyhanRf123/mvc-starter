<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AuthService;
use App\Helpers\Validator;
use App\Helpers\Flash;
use App\Helpers\Csrf;
use App\Helpers\Redirect;
class AuthController extends Controller
{

    protected AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }
    public function login()
    {
        $this->view('auth/login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate()
    {
        if (!Csrf::check($_POST['csrf_token'] ?? null)) {
                die('CSRF validation failed');
            }        
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $validator = new Validator();
        $validator->required('Email', $email);
        $validator->required('Password', $password);
        
        if ($validator->fails()) {
            Flash::set('error', implode('<br>', $validator->errors()));
            Redirect::to('/login');
            exit;
        }
        $result = $this->authService->login($email, $password);

        if ($result['success']) {
            if (!session_id()) {
                session_start();
            }

            $_SESSION['user'] = [
                'id' => $result['user']['id'],
                'email' => $result['user']['email'],
                'role'  => $result['user']['role']
            ];

            Flash::set('success', 'Login berhasil');
            if ($_SESSION['user']['role'] === 'admin') {
                Redirect::to('admin');
            } else {
                Redirect::to('dashboard');
            }
            exit;
        }

        Flash::set('error', $result['message']);
        Redirect::to('/login');
        exit;
    }

    public function logout()
    {
        if (!session_id()) {
            session_start();
        }

        session_destroy();

        Redirect::to('/login');
        exit;
    }

    public function register()
    {
        $this->view('auth/register');
    }

    public function store()
    {
        if (!Csrf::check($_POST['csrf_token'] ?? null)) {
            die('CSRF validation failed');
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['password_confirmation'] ?? '';

        $validator = new Validator();
        $validator->required('Email', $email);
        $validator->required('Password', $password);
        $validator->required('Confirm Password', $confirm);

        if ($password !== $confirm) {
            Flash::set('error', 'Password tidak sama');
            Redirect::to('/register');
            exit;
        }

        if ($validator->fails()) {
            Flash::set('error', implode('<br>', $validator->errors()));
            Redirect::to('/register');
            exit;
        }

        $result = $this->authService->register($email, $password);

        if (!$result['success']) {
            Flash::set('error', $result['message']);
            Redirect::to('/register');
            exit;
        }

        Flash::set('success', 'Register berhasil, silakan login');
        Redirect::to('/login');
        exit;
    }

}
