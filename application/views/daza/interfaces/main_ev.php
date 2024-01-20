
 <!-- header for events.php -->

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
   <!-- fullCalendar -->
   <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fullcalendar/main.css');?>>
  <!-- Ajax -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
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
        <a href="<?php echo site_url();?>/respocompet/index" class="nav-link">Accueil</a>
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
          <a href="<?php echo site_url();?>/respocompet/index" class="nav-link">
               <i class="fas fa-columns"></i>
               <p>
                 Tableau de bord
               </p>
              </a>
            
            </i> 
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-volleyball-ball"></i>
              <p>
                  Competition
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="<?php echo site_url();?>/respocompet/mes_competition/<?php echo $this->session->userdata('id_user');?>" class="nav-link">
                <i class="fa fa-plus-circle" aria-hidden=""></i>
                  <p>
                    Disponibles 
                  </p>
                </a>
                
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>/respocompet/register_compet" class="nav-link">
                  
                  <i class="fa fa-edit" aria-hidden="true"></i>
                  <p>editer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>/respocompet/update_compet/" class="nav-link">
                  <i class="fa fa-share" aria-hidden="true"></i>
                  <p>Modifier</p>
                  
                </a>
              </li>
             
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="<?php echo site_url();?>/events/e1/" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendrier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo site_url();?>/events/e1/" class="nav-link">
                <i class="fa fa-inbox" aria-hidden="true"></i>
                  <p>Planning des Stades</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>/events/e2/" class="nav-link">
                <i class="fa fa-tags" aria-hidden="true"></i>
                  <p>Mon planning</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
              <p>
                Publication
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo site_url();?>/publication/mes_publication/user/<?php echo $this->session->userdata('id_user');?>" class="nav-link">
                <i class="fa fa-inbox" aria-hidden="true"></i>
                  <p>Disponible</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url();?>/publication/create/" class="nav-link">
                <i class="fa fa-edit" aria-hidden="true"></i>
                  <p>Nouvelle publication</p>
                </a>
              </li>
            </ul>
          </li>
         
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Resultats
                <i class="fas fa-angle-left right"></i>
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa fa-edit" aria-hidden="true"></i>
                  <p>Publier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                <i class="fa fa-share" aria-hidden="true"></i>
                  <p>Modifier ou supprimer </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url();?>/profil/user_info/<?php echo $this->session->userdata('id_user');?>" class="nav-link">
            <i class="fa fa-user" aria-hidden="true"></i>
              <p>
               Mon Profil
              </p>
            </a>
          </li>
          <li class="nav-header">Outils</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p class="text">Statistiques</p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Guide</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

