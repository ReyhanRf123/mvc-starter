<?php

namespace App\Helpers;

class Flash
{
    public static function set(string $key, string $message)
    {
        if (!session_id()) {
            session_start();
        }

        $_SESSION['flash'][$key] = $message;
    }

    public static function get(string $key)
    {
        if (!session_id()) {
            session_start();
        }

        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $message;
        }

        return null;
    }
}
