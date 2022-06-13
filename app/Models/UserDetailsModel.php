<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDetailsModel extends Model
{
    protected $table = 'user_details';

    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'user_id',
        'address',
        'phone',
        'date_of_birth',
        'website',
        'facebook',
        'twitter',
        'instagram'
    ];

    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\UserDetail';

    public function getDetails($id)
    {
        return $this->where('user_id', $id)->first();
    }
}
