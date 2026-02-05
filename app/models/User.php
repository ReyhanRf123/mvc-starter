<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE email = :email LIMIT 1"
        );

        $stmt->execute([
            'email' => $email
        ]);

        $user = $stmt->fetch();

        return $user ?: null;
    }

    public function create(string $email, string $passwordHash): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO users (email, password) VALUES (:email, :password)"
        );

        return $stmt->execute([
            'email' => $email,
            'password' => $passwordHash
        ]);
    }

}
