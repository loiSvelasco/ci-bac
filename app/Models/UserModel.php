<?php

namespace App\Models;

class UserModel extends \CodeIgniter\Model
{
    protected $table = 'user';
    protected $allowedFields = ['name', 'email', 'password'];
    protected $returnType = 'App/Entities/User';
    protected $useTimestamps = true;

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    
    protected $validationRules = [
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[6]',
        'password_confirmation' => 'required|matches[password]'
    ];
    
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'That email is already in use.'
        ],
        'password_confirmation' => [
            'required' => 'You must confirm your password.',
            'matches' => 'The passwords do not match.',
        ]
    ];

    protected function hashPassword(array $data)
    {
        if(isset($data['data']['password']))
        {
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);
        }

        return $data;
    }
}