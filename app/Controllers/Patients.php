<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\PatientModel;

class Patients extends BaseController
{
    public function index()
    {
        $model = model(PatientModel::class); 

        $data = [
            'patient_details'  => $model->getPatientsDetails(),
            'title' => 'Patient Details',
        ];

        return view('templates/header', $data)
            . view('patients/index')
            . view('templates/footer');
    }

    public function show($id = null)
    {  
        $model = model(PatientModel::class);

        $data['patient_details'] = $model->getPatientsDetails($id);

        if (empty($data['patient_details'])) {
            throw new PageNotFoundException('Cannot find the patient item: ' . $id);
        }
        $data['title'] = "Patient Details"; #$data['patient_details']['first_name'];

        return view('templates/header', $data)
            . view('patients/view') 
            . view('templates/footer');
            
    }


    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create Patient Record'])
            . view('patients/create')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validate([
            'first_name' => 'required|max_length[255]|min_length[3]',
            'middle_name'  => 'max_length[5000]',
            'last_name'  => 'required|max_length[5000]|min_length[3]',
            'phone_no'  => 'required|max_length[5000]|min_length[3]',
            'email'  => 'required|valid_email', 
            'dateOfBirth'  => 'required',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(PatientModel::class);

        $model->save([
            'first_name' => $post['first_name'],
            'middle_name' => $post['middle_name'],
            'last_name' => $post['last_name'],
            'phone_no' => $post['phone_no'],
            'email' => $post['email'],
            'date_of_birth' =>$post['dateOfBirth']
        ]);

        return redirect()->back()->with('success','User added successfully');
    /*
        return view('templates/header', ['title' => 'Create a news item'])
            . view('patients/create')
            . view('templates/footer');
    */
    }


}