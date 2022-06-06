<?php

namespace App\Controllers\Actions;

class ProfileImage extends \App\Controllers\BaseController
{
    private $user;

    public function __construct()
    {
        $this->user = service('auth')->getCurrentUser();
    }

    public function update()
    {
        $file = $this->request->getFile('image');

        if( ! $file->isValid())
        {
            $error_code = $file->getError();
            
            if($error_code == UPLOAD_ERR_NO_FILE)
            {
                return redirect()->back()
                                 ->with('warning', 'No file was uploaded.');
            }

            throw new \RuntimeException($file->getErrorString() . " " . $error_code);
        }

        $size = $file->getSizeByUnit('mb');

        if($size > 2)
        {
            return redirect()->back()
                             ->with('warning', 'File size is too large. (Max: 2MB)');
        }

        $type = $file->getMimeType();

        if( ! in_array($type, ['image/jpeg', 'image/png']))
        {
            return redirect()->back()
                             ->with('warning', 'File type is not supported. (Supported: jpeg, png)');
        }

        // $ext = $file->guessExtension();

        $path = $file->store('profile_images');
        $path = WRITEPATH . 'uploads/' . $path;

        service('image')
                ->withFile($path)
                ->fit(200, 200, 'center')
                ->save($path);

        $user = service('auth')->getCurrentUser();
        $this->user->profile_image = $file->getName();

        $model = new \App\Models\UserModel;

        $model->protect(false)
              ->save($this->user);

        return redirect()->to('Dashboard/profile')
                         ->with('success', 'Profile image updated.');
    }

    public function delete()
    {
        $path = WRITEPATH . 'uploads/profile_images/' . $this->user->profile_image;

        if( ! $this->user->profile_image)
        {
            return redirect()->back()
                             ->with('warning', 'No profile image to delete.');
        }

        if(is_file($path))
        {
            unlink($path);
        }

        $this->user->profile_image = null;

        $model = new \App\Models\UserModel;
        
        $model->protect(false)
              ->save($this->user);

        return redirect()->to('Dashboard/profile')
                         ->with('info', 'Profile image deleted.');
    }

    public function show()
    {
        if($this->user->profile_image)
        {
            $path = WRITEPATH . "uploads/profile_images/{$this->user->profile_image}";

            $finfo = new \finfo(FILEINFO_MIME);

            $type = $finfo->file($path);

            header("Content-Type: {$type}");
            header("Content-Length: " . filesize($path));

            readfile($path);
            exit;
        }
    }
}