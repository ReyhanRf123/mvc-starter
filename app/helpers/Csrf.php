<?php

namespace App\Helpers;

class Csrf
{
    public static function generate(): string
    {
        if (!session_id()) {
            session_start();
        }

        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    public static function check(?string $token): bool
    {
        if (!session_id()) {
            session_start();
        }

        return isset($_SESSION['csrf_token']) &&
               hash_equals($_SESSION['csrf_token'], (string) $token);
    }
}
