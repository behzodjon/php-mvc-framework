
<h1>Register</h1>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username"   class="form-control<?php echo $model->hasError('username') ? ' is-invalid': '' ?>" 
    value="<?= $model->username;?>"
    
    >
    <div class="invalid-feedback">
    <?= $model->getFirstError('username');?>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">FullName</label>
    <input type="text" name="fullname"  class="form-control<?php echo $model->hasError('fullname') ? ' is-invalid': '' ?>" 
    value="<?= $model->fullname;?>"
    >
    <div class="invalid-feedback">
    <?= $model->getFirstError('fullname');?>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control<?php echo $model->hasError('email') ? ' is-invalid': '' ?>" 
    value="<?= $model->email;?>" >
   
    <div class="invalid-feedback">
    <?= $model->getFirstError('email');?>
    </div>
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control<?php echo $model->hasError('password') ? ' is-invalid': '' ?>" 
    value="<?= $model->password;?>" >
    <div class="invalid-feedback">
    <?= $model->getFirstError('password');?>
    </div>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name="confirmPassword" class="form-control<?php echo $model->hasError('confirmPassword') ? ' is-invalid': '' ?>" 
    value="<?= $model->confirmPassword;?>">
    <div class="invalid-feedback">
    <?= $model->getFirstError('confirmPassword');?>
    </div>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>