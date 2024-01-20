<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Responsable de classe </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>>
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=<?php echo base_url('assets/dist/css/adminlte.min.css');?>>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');?>>
  <!-- Toastr -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/toastr/toastr.min.css');?>>

  
</head>

<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini   layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url();?>/principal/index" class="nav-link">Accueil</a>
       
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <?php if($this->session->userdata('connexion')):?>		
        <i class="fa fa-user nav-link active " aria-hidden="true"></i>		          					          		          
        <li class="nav-item d-none d-sm-inline-block">  <a href="#" class="nav-link active"><?php echo ucfirst($this->session->userdata('user_name'));?></a>  </li>
        <li class="nav-item d-none d-sm-inline-block">  
           <a href="<?php echo site_url();?>/test/deconnexion"  data-toggle="tooltip" title="se deconnecter ?"  class="nav-link">  <i class="fas fa-sign-out-alt nav-link active "></i></a>  </li>
         
           <?php endif;?> 
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SPORT EVENT</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
          <li class="nav-item">
            <a href="<?php echo site_url();?>/respoclasse/index" class="nav-link">
            <i class="fas fa-columns"></i>
              <p>Tableau de bord </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <i class="fa fa-list-ul" aria-hidden="true"></i>
              <p>
                  Equipe
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo site_url('respoclasse/discipline_masculine');?>" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
                  <p>Masculine</p>
                 
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('respoclasse/discipline_feminine');?>" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
                  <p>
                   Feminine
                  </p>
                </a>   
              </li>     
            </ul>
          </li>
          <li class="nav-item">
                <a href="<?php echo site_url();?>/respoclasse/add_player" class="nav-link">
                  <i class="fa fa-plus-circle" aria-hidden=""></i>
                  <p>Incrire des joueurs</p>
                  
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>/respoclasse/voir_liste" class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
                  <p>
                    Consulter liste des joueurs
                  </p>
                </a>   
              </li>     
         
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Notifications
              <i class="right fas fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Information</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url();?>/respoclasse/vue/" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>import</p>
                        </a>
                    </li>
                </ul>
          
          </li>
          
          <li class="nav-header">Outils</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-calendar nav-icon"></i>
              <p>Calendrier</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="<?php echo site_url();?>/profil/user/<?php echo $this->session->userdata('id_user');?>" class="nav-link">
            <i class="fa fa-user" aria-hidden="true"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bienvenue</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <?php if($this->session->flashdata('indisponible1')):?>
					<div class="col-12" id="1">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('indisponible1').'</p>';?>
					</div>
					<?php endif;?>
          <?php if($this->session->flashdata('indisponible2')):?>
					<div class="col-12" id="2">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('indisponible2').'</p>';?>
					</div>
					<?php endif;?>  
          <?php if($this->session->flashdata('indisponible3')):?>
					<div class="col-12" id="3">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('indisponible3').'</p>';?>
					</div>
					<?php endif;?>  
          <?php if($this->session->flashdata('indisponible4')):?>
					<div class="col-12" id="4">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('indisponible4').'</p>';?>
					</div>
					<?php endif;?> 
           <?php if($this->session->flashdata('indisponible5')):?>
					<div class="col-12" id="5">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('indisponible5').'</p>';?>
					</div>
					<?php endif;?> 
           <?php if($this->session->flashdata('indisponible6')):?>
					<div class="col-12" id="6">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('indisponible6').'</p>';?>
					</div>
					<?php endif;?> 
           <?php if($this->session->flashdata('indisponible7')):?>
					<div class="col-12" id="7">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('indisponible7').'</p>';?>
					</div>
					<?php endif;?> 
           <?php if($this->session->flashdata('indisponible8')):?>
					<div class="col-12" id="8">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('indisponible8').'</p>';?>
          </div>
          <?php endif;?> 
          <?php if($this->session->flashdata('reussi')):?>
					<div class="col-12" id="9">
					<?php echo '<p class="alert alert-success">'.$this->session->flashdata('reussi').'</p>';?>
          </div>
          <?php endif;?> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <!-- Main content -->
     <section class="content">


     <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>Liste de votre classe</h4>

                <p>Ajouter ou modifier les informations sur des joueurs</p>
              </div>
              <div class="icon">
              <i class="fas fa-list-ul"></i>
              </div>
              <a href="<?php echo site_url();?>/respoclasse/add_player" class="small-box-footer">Commencer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>Equipes Masculines</h4>

                <p>Consulter, Ajouter, Modifier, Imprimer des informations...</p>
              </div>
              <div class="icon">
                
              <i class="fas fa-users"></i>
                
              </div>
             
              <a href="<?php echo site_url('respoclasse/discipline_masculine');?>" class="small-box-footer"> Voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Consulter <sup style="font-size: 20px"></sup></h4>

                <p>Acceder à la liste des joueurs de votre classe</p>
              </div>
              <div class="icon">
              <i class="ion ion-calendar"></i>
              </div>
              <a href="<?php echo site_url();?>/respoclasse/voir_liste" class="small-box-footer">Voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>Equipes Feminines</h4>

                <p>Consulter, Ajouter, Modifier, Imprimer des informations...</p>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="<?php echo site_url('respoclasse/discipline_feminine/');?>" class="small-box-footer">Voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        
        <!-- /.row -->
   </section>
   
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


  <!-- Main Footer -->
  <footer class="main-footer control-sidebar-dark">
    <strong>Copyright &copy; 2021</strong>
    All rights reserved.
    
  </footer>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src=<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>></script>
<!-- Bootstrap 4 -->
<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>

<!-- AdminLTE App -->
<script src=<?php echo base_url('assets/dist/js/adminlte.min.js');?>></script>
<!-- OPTIONAL SCRIPTS -->
<script src=<?php echo base_url('assets/plugins/chart.js/Chart.min.js');?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?php echo base_url('assets/dist/js/demo.js');?>></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=<?php echo base_url('assets/dist/js/pages/dashboard3.js');?>></script>
<!-- SweetAlert2 -->
<script src=<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>></script>
<!-- Toastr -->
<script src=<?php echo base_url('assets/plugins/toastr/toastr.min.js');?>></script>
<script>
    $( "#1" ).fadeOut( 7000 );
    $( "#2" ).fadeOut( 7000 );
    $( "#3" ).fadeOut( 7000 );
    $( "#4" ).fadeOut( 7000 );
    $( "#5" ).fadeOut( 7000 );
    $( "#6" ).fadeOut( 7000 );
    $( "#7" ).fadeOut( 7000 );
    $( "#8" ).fadeOut( 7000 );
    $( "#9" ).fadeOut( 7000 );

  
  </script>
</body>
</html>
