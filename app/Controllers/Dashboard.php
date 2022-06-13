<?php

namespace App\Controllers;
use App\Entities\UserDetail;
class Dashboard extends BaseController
{
    private $user;
    private $model;
    private $detailsModel;
    private $details;

    public function __construct()
    {
        $this->user = service('auth')->getCurrentUser();
        $this->model = new \App\Models\UserModel;
        $this->detailsModel = new \App\Models\UserDetailsModel;
        $this->details = $this->detailsModel->getDetails($this->user->id);
        
    }

    public function index()
    {
        return view('Dashboard/index');
    }

    public function profile()
    {
        return view('Dashboard/profile', [
            'user' => $this->user,
            'userDetails' => $this->details,
        ]);
    }

    public function editprofile()
    {
        return view('Dashboard/editprofile', [
            'user' => $this->user,
        ]);
    }

    public function editdetails()
    {

        if( ! $this->details)
        {
            $this->details = new UserDetail;
        }

        return view('Dashboard/editdetails', [
            'user' => $this->user,
            'userDetails' => $this->details,
        ]);
    }

    public function updatedetails()
    {
        if($this->details) // if user details exist, update it
        {
            $updateDetails = $this->detailsModel->getDetails($this->user->id);
            $detailPost = $this->request->getPost();

            $updateDetails->fill($detailPost);

            if( ! $updateDetails->hasChanged())
            {
                return redirect()->back()
                                 ->with('warning', 'No changes made.');
            }

            if($this->detailsModel->protect(false)
                                  ->save($updateDetails))
            {
                return redirect()->to('Dashboard/profile')
                                 ->with('info', 'User details updated successfully.');
            }
        }

        // else, if user details do not exist, create it

        $userDetails = new UserDetail($this->request->getPost());
        $userDetails->user_id = $this->user->id;

        if($this->detailsModel->save($userDetails))
        {
            return redirect()->to('Dashboard/profile')
                             ->with('success', 'User details added.');
        }
        else
        {
            return redirect()->back()
                             ->with('errors', $this->detailsModel->errors())
                             ->with('warning', 'Invalid data.')
                             ->withInput();
        }
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
