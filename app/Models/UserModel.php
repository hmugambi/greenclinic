<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tbl_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_name', 'password', 'specialisation', 'is_doctor','phone','email','name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    
    public function validate_user($username) {
        // Query the database to validate user credentials
        return $this->where(['user_name' => $username])->first();
        #return $this->where(array('user_name' => $username, 'password' => $password))->first(); 
    }

    
    public function getDoctorDetails($id = 0)
    {
        if ($id === 0) {
            return $this->where(['is_doctor' => 1])->findAll(); //$this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    
}
