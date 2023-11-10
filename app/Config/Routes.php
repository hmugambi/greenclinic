<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Patients;
use App\Controllers\Auth;
/**
 * @var RouteCollection $routes
 */

 
/**
*   $route['auth/login'] = 'auth/login';
*   $route['auth/do_login'] = 'auth/do_login';
*   $route['auth/logout'] = 'auth/logout';
 */
$routes->get('/', [Auth::class, 'login']);
$routes->get('auth/login', [Auth::class, 'login']);
$routes->post('auth/do_login', [Auth::class, 'do_login']);
$routes->get('auth/logout', [Auth::class, 'logout']);

$routes->get('patients', [Patients::class, 'index']);
$routes->get('patients/new', [Patients::class, 'new']);  
$routes->post('patients', [Patients::class, 'create']); 
$routes->get('patients/(:num)', [Patients::class, 'show']);

$routes->get('home', 'Home::index');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
