<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Interface </title>
  

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
   <!-- DataTables -->
   <link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>>
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>>
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>>
  <!-- fullCalendar -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fullcalendar/main.css');?>>

 
  
</head>

<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url();?>/respoclasse/index" class="nav-link">Accueil</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <?php if($this->session->userdata('connexion')):?>		
        <i class="fa fa-user nav-link active " data-toggle="tooltip" title="<?php echo ucfirst($this->session->userdata('user_name'));?>"  aria-hidden="true"></i>		          					          		          
        <li class="nav-item d-none d-sm-inline-block">  <a href="#" class="nav-link active"><?php echo ucfirst($this->session->userdata('user_name'));?></a>  </li>
        <li class="nav-item d-none d-sm-inline-block">  
           <a href="<?php echo site_url();?>/test/deconnexion"  data-toggle="tooltip" title="se deconnecter ?"  class="nav-link">  <i class="fas fa-sign-out-alt nav-link active "></i></a>  </li>
         
           <?php endif;?> 
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
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
