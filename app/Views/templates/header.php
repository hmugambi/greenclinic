<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
                    
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container">   
 

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/'); ?>">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('patients'); ?>">Patients</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('doctor'); ?>">Doctors</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('appointments'); ?>">Appointments</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('myschedule'); ?>">My Schedule</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('reports'); ?>">Reports</a>
                    </li> 
                </ul>


                <!-- Left links --> 

                <div class="d-flex align-items-center">
                <a href="<?= site_url('auth/logout'); ?>">
                    <button type="button" class="btn btn-primary me-3">
                    Log out
                    </button>
                </a>
                </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
            <div class="row">
            <div class="col-md-10 offset-1">

        
        
