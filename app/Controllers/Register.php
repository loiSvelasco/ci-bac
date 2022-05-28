<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        return view('Register/index');
    }

    public function create()
    {
        $user = new \App\Entities\User($this->request->getPost());
        $model = new \App\Models\UserModel;

        if($model->insert($user))
        {
            return redirect()->to('/Login')
                             ->with('success', 'You may now login.');
        }
        else
        {
            return redirect()->back()
                      ->with('errors', $model->errors())
                      ->with('warning', 'Invalid data.')
                      ->withInput();
        }

    }
}
