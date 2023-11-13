<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentView extends Model
{
    protected $table            = 'vw_appointment';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function getAllDetails($id = 0)
    {
        if ($id === 0) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getByPatientName($patientName)
    { 
        return $this->where(['patientName' => $patientName])->findAll();
    }

    public function getByDoctorName($doctorName)
    { 
        return $this->where(['doctorName' => $doctorName])->findAll();
    }

    public function getByDoctorId($doctorId)
    { 
        return $this->where(['doctorId' => $doctorId])->findAll();
    }

    
}
