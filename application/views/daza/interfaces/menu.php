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
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<style>
.content-wrapper
{
  background-color: #DCDCDC;
}
.table 
{
  border: 1px solid #ddd;
}
.fa-trash
{
  color: #dc3545;
  font-size: 18px;
}

th, td 
{
  padding: 16px;
  width: 15%;
}

tr:nth-child(even) 
{
  background-color: #f2f2f2;
}
.fa-pen
{
  color:#343a40;
  font-size: 18px;
}
.false
{  font-size: 30px;
}
.false:hover
{
  background-color: red;
  color: white;
}
.btn
{
  float: right;
}
.vide
{
  font-size: 25px;
  font-weight: bold;
  color:#FF9F55;
  background-color: #e9ecef;
  text-align: center;
  border-radius: 15px 15px 15px 15px;
}
.vid
{
  font-size: 20px;
  font-weight: bold;
  color:#FF9F55;
  background-color: #e9ecef;
  border-radius: 15px 15px 15px 15px;
}
.content {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.6s ease-out;
  background-color: transparent;
}
.erreur
{
  color: #dc3545;
  font-size: 17px;
}
.success
{
  font-size: 20px;
  color: #4CAF50;
}
.progress-bar 
{
  height: 8px;
  background: #FF9F55;
  position: fixed;
  width: 0%;
}
.collapsible {
  color: #444;
  cursor: pointer;
  outline: none;
  font-size: 15px;
  transition: 0.9s;

}
.sidebar
{
  position: fixed;
}
.orange
{
  background-color: #FF9F55;
  border-radius: 5px 5px 5px 5px;
}
.mod
{
  width: 45%;
}
</style>
  
</head>

<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini layout-fixed">
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
  <!-- /.navbar -

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     
      <span class="brand-text text-center font-weight-light brand-link">SPORT EVENT</span>

 <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
      </div>

 <!-- Sidebar Menu -->
            <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header" style="font-size: 20px;">MENU</li>
          <li class="nav-item menu-open">
          <li class="nav-item">
            <a href="<?php echo site_url('daza/Annee_controller/annee_academique') ?>" class="nav-link">
              
              <i class="fa fa-fw fa-wrench" aria-hidden="true"> </i>
              <p>
                 Annee Academique
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="<?php echo site_url('daza/Autorise_competition_controller/autorisation_competition') ?>" class="nav-link">
              <i class="fa fa-fw fa-wrench" aria-hidden="true"> </i>
              <p>
                 Competitions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('daza/Autorisation_controller/autorise_rencontre') ?>" class="nav-link">
              <i class="fa fa-fw fa-wrench" aria-hidden="true"> </i>
              <p>
                 Rencontres
              </p>
            </a>
          </li>
              <li class="nav-item">
                <a href="<?php echo site_url('daza/Occupation_controller/occupation') ?>" class="nav-link">
              <i class="fa fa-fw fa-plus-circle" aria-hidden="true"> </i>
              <p>
                 Occupations
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('daza/Stade_controller/stade') ?>" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Stade
              </p>
            </a>
          </li>
            <li class="nav-item">
              <a href="<?php echo site_url('daza/Calendar_controller/calendar_competition') ?>" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Calendrier - rencontre</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo site_url('daza/Allcompetition_controller/Allcompetition') ?>" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Calendrier-competition</p>
              </a>
            </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </aside>

  <!-- Content Wrapper. Contains page content -->