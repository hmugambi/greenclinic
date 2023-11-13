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
                    Sign In
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
                <form action="<?= base_url('auth/loginUser'); ?>" method="Post" class="form mb-3">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" 
                                name="username" 
                                value="<?= set_value('username'); ?>"
                                placeholder="Username Here">
                        <span class="text-danger text-sm"> 
                            <?= isset($validation) ? display_form_errors($validation,'username'):'' ?> 
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control" 
                                name="password" 
                                value="<?= set_value('password'); ?>"
                                placeholder="Password Here">
                    </div>
                    
                    <div class="form-group mb-3">
                        <input type="Submit" class="btn btn-info" value="Sign in">
                    </div>

                </form>
                <a href="<?= site_url('auth/register'); ?>">
                    Create a new account
                </a>
            </div>
        </div>
     </div>
    
</body>
</html>

