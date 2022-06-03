<?php

namespace App\Controllers;
class Dashboard extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->user = service('auth')->getCurrentUser();
    }

    public function index()
    {
        return view('Dashboard/index');
    }

    public function profile()
    {
        return view('Dashboard/profile', [
            'user' => $this->user
        ]);
    }
}
