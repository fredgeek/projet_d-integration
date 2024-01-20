<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>compte</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>>
  <!-- Theme style -->
  <link rel="stylesheet" href=<?php echo base_url('assets/dist/css/adminlte.min.css');?>>
  
</head>
<body class="hold-transition login-page">
 <!---flash messages--->
 <?php if($this->session->flashdata('user_failed')):?>
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_failed').'</p>';?>
					<?php endif;?>
				  </div>	    
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b><label for="title"><?php echo $title; ?></label></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Informations</p>

      <?php echo validation_errors(); ?>
      <?php echo form_open('test/login'); ?>
      <div class="input-group mb-3">
        
          <input type="text" class="form-control" name='username' placeholder="nom d'utilisateur" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name='password' placeholder="votre mot de passe"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="container">
          
          <!-- /.col -->
          <div class="">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
       <p class="mb-1">
        <a href="forgot-password.html">mot de passe oublié ****</a>
      </p>
      <p class="mb-0">
       
      </p>
      <?php echo form_close(); ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src=<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>></script>
<!-- Bootstrap 4 -->
<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>
<!-- AdminLTE App -->
<script src=<?php echo base_url('assets/dist/js/adminlte.min.js');?>></script>
</body>
</html>
