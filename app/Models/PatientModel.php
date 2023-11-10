<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'tbl_patient_information'; 
    protected $allowedFields = ['first_name', 'middle_name', 'last_name' , 'date_of_birth' , 'phone_no' , 'email'];
 

    public function getPatientsDetails($id = 0)
    {
        if ($id === 0) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}