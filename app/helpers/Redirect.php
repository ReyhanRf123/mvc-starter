<?php

namespace App\Helpers;

class Redirect
{
    public static function to(string $path)
    {
        header('Location: ' . BASE_URL . '/' . trim($path, '/'));
        exit;
    }
}
