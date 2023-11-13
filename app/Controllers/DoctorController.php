<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\UserModel;

class DoctorController extends BaseController
{
    public function index()
    {
        $model = model(UserModel::class); 

        $data = [
            'records'  => $model->getDoctorDetails(),
            'title' => 'Doctor Details',
        ];

        return view('templates/header', $data)
            . view('doctor/index')
            . view('templates/footer');
    }

    public function view($id = null)
    {  
        $model = model(UserModel::class);

        $data['record'] = $model->getDoctorDetails($id);

        if (empty($data['record'])) {
            throw new PageNotFoundException('Cannot find the patient item: ' . $id);
        }
        $data['title'] = "Doctor Details"; #$data['patient_details']['first_name'];

        return view('templates/header', $data)
            . view('doctor/view') 
            . view('templates/footer');
            
    }


    public function new()
    {
        helper('form'); 

        return view('templates/header', ['title' => 'Create Doctor Record'])
            . view('doctor/new')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validate([
            'name' => 'required|max_length[255]|min_length[3]',  
            'phone'  => 'required|max_length[5000]|min_length[3]',
            'email'  => 'required|valid_email', 
            'specialisation'  => 'max_length[5000]' 
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(UserModel::class);
        if($this->request->getPost('id')==='new'){
            $model->save([
                'name' => $post['name'],
                'phone' => $post['phone'],
                'email' => $post['email'],
                'user_name'=>$post['email'],
                'is_doctor'=> 1,
                'specialisation' => $post['specialisation'], 
            ]);
        }else{
            $id = (int)$this->request->getPost('id');  
            if(!is_null($id)){ 
                $model->update($id,[                
                    'name' => $post['name'],
                    'phone' => $post['phone'],
                    'email' => $post['email'], 
                    'specialisation' => $post['specialisation'], 
                ]);
            }
        }  
        return redirect()->to('doctor')->with('success','Doctor details updated successfully'); 
    }


}