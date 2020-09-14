
<h1>Login</h1>

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
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control<?php echo $model->hasError('password') ? ' is-invalid': '' ?>" 
    value="<?= $model->password;?>" >
    <div class="invalid-feedback">
    <?= $model->getFirstError('password');?>
    </div>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>