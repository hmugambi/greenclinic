<?php

namespace App\Controllers;
use App\Models\Usermodel;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $userModel = model(Usermodel::class); 
        $loggedinUserId = session()->get('loggedInUser');
        #session()->set('userDisplayName', $userInfo['name']);

        return view('templates/header', ['title' => 'Create a news item'])
        .view('dashboard/index')
        .view('templates/footer');
        ;
    }
}
