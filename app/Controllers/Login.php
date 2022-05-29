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
            $redirect_url = session('redirect_url') ?? '/Dashboard';
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirect_url)
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
