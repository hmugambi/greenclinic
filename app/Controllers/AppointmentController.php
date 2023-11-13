<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\AppointmentView;
use App\Models\UserModel;
use App\Models\PatientModel;

class AppointmentController extends BaseController
{
    public function index()
    {
        $model = model(AppointmentView::class); 

        $data = [
            'records'  => $model->getAllDetails(),
            'title' => 'Appointment Details',
        ];

        return view('templates/header', $data)
            . view('appointments/index')
            . view('templates/footer');
    }

    public function view($id = null)
    {  
        $model = model(AppointmentView::class);

        $data['record'] = $model->getAllDetails($id);

        if (empty($data['record'])) {
            throw new PageNotFoundException('Cannot find the Appointment item: ' . $id);
        } 
        $patientmodel = model(PatientModel::class);
        $doctormodel = model(UserModel::class);

        $data['patientData'] = $patientmodel->getPatientsDetails();
        $data['doctorData'] = $doctormodel->getDoctorDetails();
        $data['title'] = "Appointment Details";

        return view('templates/header', $data)
            . view('appointments/view') 
            . view('templates/footer');            
    }

    public function new()
    {
        helper('form'); 

        $patientmodel = model(PatientModel::class);
        $doctormodel = model(UserModel::class);

        $data['patientData'] = $patientmodel->getPatientsDetails();
        $data['doctorData'] = $doctormodel->getDoctorDetails();
        $data['title']='Create Appointments Record';

        return view('templates/header', $data)
            . view('appointments/new')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validate([
            'patientName' => 'required',  
            'doctorName'  => 'required',
            'appointmentDate'  => 'required'  
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(AppointmentModel::class);
        if($this->request->getPost('id')==='new'){
            $model->save([
                'patient_id' => $post['patientName'],
                'doctor_id' => $post['doctorName'],
                'appointment_date_time' => $post['appointmentDate']   
            ]);
        }else{
            $id = (int)$this->request->getPost('id');  
            if(!is_null($id)){ 
                $model->update($id,[                
                    'patient_id' => $post['patientName'],
                    'doctor_id' => $post['doctorName'],
                    'appointment_date_time' => $post['appointmentDate']
                ]);
            }
        }  
        return redirect()->to('appointments')->with('success','Appointment details updated successfully'); 
    }

}
