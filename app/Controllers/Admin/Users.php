<?php

namespace App\Controllers\Admin;

use App\Entities\User;

class Users extends \App\Controllers\BaseController
{
    public $breadcrumb;
    private $model;
    // private $db;

    public function __construct()
    {
        $this->model = new \App\Models\UserModel;
        // $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // $query   = $this->db->query('SELECT * FROM user ORDER BY id DESC');
        // $results = $query->getResult();

        // return view('Admin/Users/index', [
        //     'users' => $results
        // ]);

        $users = $this->model
                      ->orderBy('id', 'DESC')
                      ->findAll();

        return view('Admin/Users/index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user = $this->getUserOr404($id);
        
        return view('Admin/Users/show', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = $this->getUserOr404($id);
        
        return view('Admin/Users/edit', [
            'user' => $user
        ]);
    }

    public function new()
    {   
        $user = new User;
        return view('Admin/Users/new', [
            'user' => $user
        ]);
    }

    public function create()
    {
        $user = new User($this->request->getPost());
        
        if($this->model->protect(false)
                       ->insert($user))
        {
            return redirect()->to("Admin/Users/show/{$this->model->insertID}")
                             ->with('info', 'User created successfully.');
        }
        else
        {
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid data.')
                             ->withInput();
        }
    }

    public function update($id)
    {
        $user = $this->getUserOr404($id);
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
            return redirect()->to("Admin/Users/edit/$id")
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

    public function delete($id)
    {
        if(current_user()->id == $id)
        {
            return redirect()->back()
                             ->with('warning', 'You cannot delete yourself.');
        }
        
        $this->model->delete($id);
        return redirect()->to('/Admin/Users')
                             ->with('info', 'User deleted.');
    }

    private function getUserOr404($id)
    {   
        $user = $this->model->where('id', $id)
                            ->first();

        if($user === null)
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User with id $id not found.");
        }

        return $user;
    }
}