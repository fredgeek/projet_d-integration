<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Responsable compétition </title>

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
<body class="hold-transition sidebar-mini">
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
                <a href="<?php echo site_url();?>/respocompet/invalide_competition/<?php echo $this->session->userdata('id_user');?>" class="nav-link">
                <i class="far fa-calendar-times"></i>
                  <p>
                  Invalide
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
                <a href="<?php echo site_url();?>/events/event_dasa/" class="nav-link">
                <i class="fa fa-edit" aria-hidden="true"></i>
                  <p>Nouvel de évènement</p>
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
                <a href="<?php echo site_url();?>/respocompet/competition_dispo2/<?php echo $this->session->userdata('id_user');?>" class="nav-link">
                <i class="fa fa-share" aria-hidden="true"></i>
                  <p>Modifier </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url();?>/respocompet/responsable_classe/<?php echo $this->session->userdata('id_user');?>" class="nav-link">
            <i class="fa fa-user" aria-hidden="true"></i>
              <p>
               Responsable de classe
              </p>
            </a>
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
            <a href="<?php echo site_url();?>/respocompet/stats/<?php echo $this->session->userdata('id_user');?>" class="nav-link">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
          <div class="col-sm-6">
          <h4 class="m-0">Bienvenue :&ensp; <?php echo ucfirst($this->session->userdata('user_name'));?></h4>
        
            <h5> Que voulez-vous faire ?</h5>
         
          </div>
        
          <div class="col-sm-6">
          <?php if($this->session->flashdata('enregistrement_reussi')):?>
                    <div class="alert alert-success alert-dismissible"  id='a' >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fas fa-check"></i> </h5>
                     <?php echo $this->session->flashdata('enregistrement_reussi');?>
                    </div>  
          <?php endif;?>  
          <?php if($this->session->flashdata('modification')):?>
                    <div class="alert alert-success alert-dismissible"  id='e' >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fas fa-check"></i> </h5>
                     <?php echo $this->session->flashdata('modification');?>
                    </div>  
          <?php endif;?>    
          <?php if($this->session->flashdata('news_created')):?>
          <div class="alert alert-success alert-dismissible" id='b'>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fas fa-check"></i> </h5>
                     <?php echo $this->session->flashdata('news_created');?>
                    </div>  
					<?php endif;?>
					<?php if($this->session->flashdata('news_update')):?>
          <div class="alert alert-success alert-dismissible" id='c'>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fas fa-check"></i> </h5>
                     <?php echo $this->session->flashdata('news_update');?>
                    </div>  
					<?php endif;?>
					<?php if($this->session->flashdata('news_delete')):?>
             <div class="alert alert-success alert-dismissible"  id='d'>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fas fa-check"></i> </h5>
                     <?php echo $this->session->flashdata('news_delete');?>
                    </div>  
					<?php endif;?>   
          </div><!-- /.col -->
                  
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>Nouvelle compétition</h4>

                <p>Configurez une nouvelle compétition</p>
              </div>
              <div class="icon">
                <i class="ion ion-edit"></i>
              </div>
              <a href="<?php echo site_url();?>/respocompet/register_compet" class="small-box-footer">Commencer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">     
            <!-- small box --> 
            <div class="small-box bg-success"> 
              <div class="inner"> 
                <h4>Consultez les rencontres <sup style="font-size: 20px"></sup></h4>

                <p>  Rencontres disponibles et édition des résultats</p>
              </div>
              <div class="icon">
              <i class="ion ion-calendar"></i>
              </div>
              <a href="<?php echo site_url("/respocompet/rencontre");?>/<?php echo $this->session->userdata('id_user');?>" class="small-box-footer">Commencer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>Suivre une compétition</h4>

                <p>Configurez les phases d'une compétition suivant son évolution</p>
              </div>
              <div class="icon">
              <i class="fas fa-sitemap"></i>
              </div>
              <a href="<?php echo site_url("/respocompet/mes_competition");?>/<?php echo $this->session->userdata('id_user');?>" class="small-box-footer">Commencer<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>Consulter les  resultats</h4>
                <p>Voir les  resultats   rencontres d'une compétition donnée</p>
              
              </div>
              <div class="icon">
              <i class="fas fa-signal"></i>
              </div>
              <a href="<?php echo site_url("/respocompet/competition_dispo");?>/<?php echo $this->session->userdata('id_user');?>" class="small-box-footer">Commencer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>Configurer les  équipes</h4>
                <p> Rendez les équipes accessibles aux responsables de classe</p>
              
              </div>
              <div class="icon">
              <i class="fas fa-users-cog"></i>
              </div>
              <a href="<?php echo site_url("/respocompet/equipe_dispo");?>/<?php echo $this->session->userdata('id_user');?>" class="small-box-footer">Commencer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box" style="background: #99e600;">
              <div class="inner">
                <h4>Statistiques</h4>
                <p>Consulter</p>
              
              </div>
              <div class="icon">
              <i class="fas fa-star-half-alt"></i>
              </div>
              <a href="<?php echo site_url();?>/respocompet/stats/<?php echo $this->session->userdata('id_user');?>" class="small-box-footer">Commencer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
  </div>
  </div>
  <!-- /.content-wrapper -->

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
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src=<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>></script>
<!-- Bootstrap 4 -->
<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>

<!-- AdminLTE App -->
<script src=<?php echo base_url('assets/dist/js/adminlte.min.js');?>></script>
<!-- OPTIONAL SCRIPTS -->
<!-- InputMask -->
<script src=<?php echo base_url('assets/plugins/moment/moment.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/inputmask/jquery.inputmask.min.js');?>></script>

<!-- chart.js -->
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
  
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

$( "#a" ).fadeOut( 5000 );
$( "#b" ).fadeOut( 5000 );
$( "#c" ).fadeOut( 5000 );
$( "#d" ).fadeOut( 5000 );
$( "#e" ).fadeOut( 5000 );


</script>
</body>
</html>


