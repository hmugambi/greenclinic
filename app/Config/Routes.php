<?php
 
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Patients;
use App\Controllers\DoctorController;
use App\Controllers\Auth;
use App\Controllers\Dashboard;
use App\Controllers\AppointmentController;
use App\Controllers\DashboardController;
use App\Controllers\DoctorScheduleController;
use App\Controllers\ApiController;

/**
 * @var RouteCollection $routes
 */

 
/**
*   $route['auth/login'] = 'auth/login';
*   $route['auth/do_login'] = 'auth/do_login';
*   $route['auth/logout'] = 'auth/logout';
 */
# $routes->get('/', [Auth::class, 'login']);
$routes->group('',['filter' => 'AuthCheck'], function($routes){
    $routes->get('dashboard', 'Dashboard::index'); 
    $routes->get('/', [Dashboard::class, 'index']);

    $routes->get('patients', [Patients::class, 'index']);
    $routes->get('patients/new', [Patients::class, 'new']);  
    $routes->post('patients', [Patients::class, 'create']); 
    $routes->get('patients/(:num)', [Patients::class, 'show']);

    $routes->get('doctor', [DoctorController::class, 'index']);
    $routes->get('doctor/new', [DoctorController::class, 'new']);
    $routes->post('doctor/create', [DoctorController::class, 'create']);
    $routes->get('doctor/(:num)', [DoctorController::class, 'view']);

    $routes->get('appointments', [AppointmentController::class, 'index']);
    $routes->get('appointment/new', [AppointmentController::class, 'new']);
    $routes->post('appointment/create', [AppointmentController::class, 'create']);
    $routes->get('appointment/(:num)', [AppointmentController::class, 'view']);

    $routes->get('reports', [DashboardController::class, 'index']);
    $routes->get('myschedule', [DoctorScheduleController::class, 'index']);
    
    

});

$routes->get('/', [Auth::class, 'loginRevamp']);
$routes->get('auth', [Auth::class, 'loginRevamp']);
$routes->get('auth/register', [Auth::class, 'register']);
$routes->post('auth/registerUser', [Auth::class, 'registerUser']);
$routes->post('auth/loginUser', [Auth::class, 'loginUser']); 
$routes->get('auth/login', [Auth::class, 'login']); 
$routes->post('auth/do_login', [Auth::class, 'do_login']);
$routes->get('auth/logout', [Auth::class, 'logout']);

# api routes

$routes->get('api/bookings/all', [ApiController::class, 'allBookings']);
$routes->get('api/doctor/(:segment)', [ApiController::class, 'getBookingByDoctor']);
$routes->get('api/bookings/patient/(:segment)', [ApiController::class, 'getBookingByPatient']);

/*

$routes->get('home', 'Home::index');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

*/


