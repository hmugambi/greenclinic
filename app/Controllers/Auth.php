<?php
# defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\User_model;
use App\Models\Usermodel;
use App\Libraries\Hash;

$session = \Config\Services::session();

class Auth extends BaseController { 
    // enabling features
    public function __construct()
    {
        helper(['url','form']);
    }

    public function login() { 
        return view('login_view');
    }

    public function loginRevamp() { 
        return view('auth/login');
    }

    public function register() { 
        return view('auth/register');
    }

    /*
        save new user to database.
    */
    public function registerUser() { 
        // validate user input.
        $validated = $this -> validate([
            'name' => 'required', 
            'username' => 'required', 
            'phoneNo'  => 'required' ,
            'email'  => 'required|valid_email', 
            'password'  => 'required|min_length[5]|max_length[50]' ,
            'confirmPassword'  => 'required|min_length[5]|max_length[50]|matches[password]'  
        ]);
        
        if (! $validated )
        {
            return view('auth/register',['validation' => $this->validator]);
        }
        // save to database
        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $phoneNo = $this->request->getPost('phoneNo');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password'); 

        $data = [
          'name' => $name ,
          'user_name' => $username ,
          'phoneNo' => $phoneNo ,
          'email' => $email ,
          'password' => Hash::encrypt($password) 
        ];

        // store data
        $userModel = model(Usermodel::class); 
        $query = $userModel ->insert($data);

        if (!$query)
        {
            return redirect()->back()->with('fail','Saving user failed');
        }else{
            return redirect()->back()->with('success','User added successfully');
        } 
    }

    
    //login user     
    public function loginUser(){
        // validating user input
        $validated = $this -> validate([ 
            'username' => 'required',  
            'password'  => 'required|min_length[5]|max_length[50]'  
        ]);
        
        if (! $validated )
        {
            return view('auth/login',['validation' => $this->validator]);
        }else{
            //check user details in the database
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = model(Usermodel::class); 
            $userInfo = $userModel->validate_user($username); 
            if($userInfo){
                if(!Hash::check($password, $userInfo['password'])){ 
                    session()->setFlashdata('fail','Incorrect password provided');
                    return redirect()->to('auth');
                }else{
                    // process user info 
                    session()->set('loggedInUser',$userInfo['id']);
                    session()->set('userDisplayName', $userInfo['name']);
                    return redirect()->to('/dashboard');
                }
            }
            session()->setFlashdata('fail','Incorrect login details provided');
            return redirect()->to('auth'); 
        }
    }

    public function do_login() { 
        if (! $this->validate([
            'username' => 'required', 
            'password'  => 'required' 
        ])) {
            // The validation fails, so returns the form.
           // return $this->new();
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
        if (session()->has('loggedInUser')){
            //session()->session_destroy();
            session()->remove('loggedInUser');
        }
        //$this->session->sess_destroy();
        return redirect()->to('auth?access=loggedout')->with('fail','You are logged out');
    }
}
