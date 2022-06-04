<?php

namespace App\Controllers;
class Dashboard extends BaseController
{
    private $user;
    private $model;

    public function __construct()
    {
        $this->user = service('auth')->getCurrentUser();
        $this->model = new \App\Models\UserModel;
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

    public function editprofile()
    {
        return view('Dashboard/editprofile', [
            'user' => $this->user
        ]);
    }

    public function updateprofile()
    {
        $user = $this->user;
        $post = $this->request->getPost();

        if(empty($post['password']))
        {
            $this->model->disablePasswordValidation();
            unset($post['password']);
            unset($post['password_confirmation']);
        }

        $user->fill($post);

        if( ! $user->hasChanged())
        {
            return redirect()->back()
                             ->with('warning', 'No changes were made.')
                             ->withInput();
        }

        if($this->model->protect(false)
                       ->save($user))
        {
            return redirect()->to('Dashboard/profile')
                             ->with('success', 'User updated successfully.');
        }
        else
        {
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid data.')
                             ->withInput();
        }
    }
}
