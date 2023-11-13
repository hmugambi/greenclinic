<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppointmentView;

class DoctorScheduleController extends BaseController
{
    public function index()
    {
        $loggedinUserId = (int)session()->get('loggedInUser');
        $model = model(AppointmentView::class); 

        $data = [
            'records'  =>  $model->getByDoctorId($loggedinUserId),
            'title' => 'My Schedule',
        ];

        return view('templates/header', $data)
            . view('doctorSchedule/index')
            . view('templates/footer');
    }
}
