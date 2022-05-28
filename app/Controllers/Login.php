<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('Login/index');
    }

    public function create()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember_me = (bool) $this->request->getPost('remember_me');

        $auth = service('auth');

        if($auth->login($email, $password, $remember_me))
        {
            return redirect()->to('/Dashboard')
                             ->with('info', 'Successfully logged in')
                             ->withCookies();
        }
        else
        {
            return redirect()->back()
                             ->with('warning', 'Invalid login.')
                             ->withInput();
        }
    }

    public function delete()
    {
        service('auth')->logout();

        return redirect()->to('Login/showLogoutMessage')
                         ->withCookies();
    }
    
    public function showLogoutMessage()
    {
        return redirect()->to('/Login')
                         ->with('info', 'Successfully logged out');
    }
}
