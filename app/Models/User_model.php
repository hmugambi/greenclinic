<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tbl_logins'; 
     protected $allowedFields = ['user_name', 'password', 'user_id' , 'active' , 'phone_no' , 'email'];

    public function validate_user($username, $password) {
        // Query the database to validate user credentials
        #return $this->where(['username' => $username])->first();
        return $this->where(array('user_name' => $username, 'password' => $password))->first();

        #$query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        #return $query->row();
    }
     /*
    public function getPatientsDetails($id = 0)
    {
        if ($id === 0) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    */
}