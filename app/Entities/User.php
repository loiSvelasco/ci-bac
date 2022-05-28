<?php

namespace App\Entities;

Class User extends \CodeIgniter\Entity\Entity
{
    public function verifyPassword($password)
    {
        return password_verify($password, $this->password_hash);
    }
}