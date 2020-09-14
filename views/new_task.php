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
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control<?php echo $model->hasError('email') ? ' is-invalid': '' ?>" 
    value="<?= $model->email;?>" >
   
    <div class="invalid-feedback">
    <?= $model->getFirstError('email');?>
    </div> <br>

    <div class="form-group">
    <label >Task text</label>
  <textarea class="form-control" name="task_text" id="" cols="40" rows="5"></textarea>
  <div class="invalid-feedback">
    <?= $model->getFirstError('task_text');?>
    </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>