<?php

namespace App\Core;

class Controller
{
    protected function view(string $view, array $data = []) //untuk redirect ke halaman views
    {
        $path = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($path)) {
            die("View {$view} not found");
        }

        extract($data);
        require $path;
    }
}
