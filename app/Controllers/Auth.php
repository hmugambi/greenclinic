<?php
# defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\User_model;

$session = \Config\Services::session();

class Auth extends BaseController { 
    public function login() { 
        return view('login_view');;
    }

    public function do_login() { 
        if (! $this->validate([
            'username' => 'required', 
            'password'  => 'required' 
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();  
        $model = model(User_model::class); 
        $user = $model->validate_user($post['username'] ,$post['password']); 

        if ($user) {
            // Set user session data
            $user_data = array( 
                'username' => $post['username'],
                'logged_in' => TRUE
            );
     
            #$session->set_userdata($user_data);

            // Redirect to the welcome page
          return view('welcome_message');
        
        } else { 
            return $this->login();
        }
    }

    public function logout() {
        // Destroy user session
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
