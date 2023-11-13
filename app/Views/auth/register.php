<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
     <div class="containers">
        <div class="row">
            <div class="col-md-4 offset-4">
                <h4> 
                    Sign Up
                </h4>
                <hr/>
                <?php
                    if(!empty(session()->getFlashData('success'))){
                        ?>
                        <div class="alert alert-sucess">
                            <?=session()->getFlashData('success')?>
                        </div>
                        <?php
                    }else if(!empty(session()->getFlashData('fail'))){
                        ?>
                        <div class="alert alert-danger">
                            <?=session()->getFlashData('fail')?>
                        </div>
                        <?php 
                    }
                ?>


                <form action="<?= base_url('auth/registerUser'); ?>" method="Post" class="form mb-3">
                    <?= csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name Here">
                        <span class="text-danger text-sm"> 
                            <?= isset($validation) ? display_form_errors($validation,'name'):'' ?> 
                        </span> 
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Phone No.</label>
                        <input type="text" class="form-control" name="phoneNo" placeholder="Phone No. Here">
                        <span class="text-danger text-sm"> 
                            <?= isset($validation) ? display_form_errors($validation,'phoneNo'):'' ?> 
                        </span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="Email Here">
                        <span class="text-danger text-sm"> 
                            <?= isset($validation) ? display_form_errors($validation,'email'):'' ?> 
                        </span>
                    </div>


                    <div class="form-group mb-3">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" name="username" placeholder="User name Here">
                        <span class="text-danger text-sm"> 
                            <?= isset($validation) ? display_form_errors($validation,'username'):'' ?> 
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password Here">
                        <span class="text-danger text-sm"> 
                            <?= isset($validation) ? display_form_errors($validation,'password'):'' ?> 
                        </span>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password Here">
                        <span class="text-danger text-sm"> 
                            <?= isset($validation) ? display_form_errors($validation,'confirmPassword'):'' ?> 
                        </span>
                    </div>
                    
                    <div class="form-group mb-3">
                        <input type="Submit" class="btn btn-info" value="Sign up">
                    </div>

                </form>
                
                <br/>

                <a href="<?= site_url('auth'); ?>">
                I already have an account, login
                </a>
                
            </div>
        </div>
     </div>
    
</body>
</html>

