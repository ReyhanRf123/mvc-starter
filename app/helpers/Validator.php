<?php

namespace App\Helpers;

class Validator
{
    protected array $errors = [];

    public function required(string $field, string $value)
    {
        if (trim($value) === '') {
            $this->errors[] = "{$field} wajib diisi";
        }
    }

    public function fails(): bool
    {
        return !empty($this->errors); //kalo $this->error tidak kosong return true
    }

    public function errors(): array
    {
        return $this->errors; // akan mengembalikan array error
    }
}
