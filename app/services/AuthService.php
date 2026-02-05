<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    protected User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login(string $email, string $password): array
    {
        $user = $this->userModel->findByEmail($email);

        if (!$user) {
            return [
                'success' => false,
                'message' => 'Email atau password salah'
            ];
        }

        if (!password_verify($password, $user['password'])) {
            return [
                'success' => false,
                'message' => 'Email atau password salah'
            ];
        }

        return [
            'success' => true,
            'user' => $user
        ];
    }
    public function register(string $email, string $password): array
    {
        // cek email sudah ada
        if ($this->userModel->findByEmail($email)) {
            return [
                'success' => false,
                'message' => 'Email sudah terdaftar'
            ];
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $this->userModel->create($email, $passwordHash);

        return [
            'success' => true
        ];
    }

}
