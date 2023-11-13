<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppointmentView;

class DashboardController extends BaseController
{
    public function index()
    {
        $model = model(AppointmentView::class); 

        $data = [
            'records'  => $model->getAllDetails(),
            'title' => 'Reports',
        ];

        return view('templates/header', $data)
            . view('reports/index')
            . view('templates/footer');
    }
}
