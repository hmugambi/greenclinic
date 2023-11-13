<?php
# defined('BASEPATH') OR exit('No direct script access allowed');

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\User_model;  
use CodeIgniter\RESTful\ResourceController;
use App\Models\AppointmentModel;
use App\Models\AppointmentView;

class ApiController extends ResourceController { 


    public function index()
    {
        $model = model(AppointmentView::class);
        return $this->respond( $model->getAllDetails()); 
    }

    public function allBookings(){
        $model = model(AppointmentView::class);
        return $this->respond( $model->getAllDetails()); 
    }

    public function getBookingByDoctor($doctorName){
        $model = model(AppointmentView::class);
        return $this->respond( $model->getByDoctorName($doctorName)); 
    }

    public function getBookingByPatient($patientName){
        $model = model(AppointmentView::class);
        return $this->respond( $model->getByPatientName($patientName)); 
    }
 

}
