<!DOCTYPE html>
	<html lang="fr" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href=<?php echo base_url('assets/img/fav.png');?>>
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Sport Event</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href=<?php echo base_url('assets/css/linearicons.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/font-awesome.min.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/bootstrap.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/magnific-popup.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/nice-select.css');?>>							
			<link rel="stylesheet" href=<?php echo base_url('assets/css/animate.min.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/owl.carousel.css');?>>			
			<link rel="stylesheet" href=<?php echo base_url('assets/css/jquery-ui.css');?>>			
			<link rel="stylesheet" href=<?php echo base_url('assets/css/main.css');?>>
		</head>
		<body >	
        <header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
						  <ul>
								<li><a href="https://web.facebook.com/univNdere/?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/search?q=univ-ndere"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UC6bML7CfxAPfJFVKycMjbxA"><i class="fa fa-youtube"></i></a></li>
							
			  				</ul>					
			  			</div>
			  			
			  		</div>			  					
	  			</div>
			</div>
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="#"><img src="<?php echo base_url('assets\img\logo.png');?>" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
					<li><a href="<?php echo site_url('principal/index');?>">Accueil</a></li>
					 
			          
					<li><a href="<?php echo site_url('principal/apropos');?>"> à propos </a></li>
					  <?php if(!$this->session->userdata('connexion')):?>				          					          		          
						<li><a href="<?php echo site_url();?>/test/login">se connecter</a></li>
					 
					  <?php endif;?>
					  <?php if($this->session->userdata('connexion')):?>				          					          		          
						<li class="menu-has-children"><a href="#" class="nav-link active"><?php echo ucfirst($this->session->userdata('user_name'));?></a> 
			            <ul>
						<li><a href="<?php echo site_url();?>/test/deconnexion">Se deconnecter</a></li>
						 	  <?php if( $this->session->userdata('rol')==='Responsable de competition') : ?>
		              		   <li><a href="<?php echo site_url();?>/respocompet/index">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
							 <?php if( $this->session->userdata('rol')==='Responsable de classe') : ?>
		              		   <li><a href="<?php echo site_url();?>/respoclasse/index">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
							 <?php if( $this->session->userdata('rol')==='Daza') : ?>
		              		   <li><a href="<?php echo site_url();?>/daza/accueil_controller/accueil">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
							 <?php if( $this->session->userdata('rol')==='Administrateur') : ?>
		              		   <li><a href="<?php echo site_url();?>/superadmin/accueil_controller/accueil">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
			            </ul>
			          </li>				
					
					  <?php endif;?>	          					          		          
			          
			        </ul>
			      </nav><!-- #nav-menu-container -->		    				
		    	</div>
		    </div>
		  </header><!-- #header -->
			  
			<!-- start banner Area -->
			<section class="banner-area relative" id="home" 
    style="background: url(<?php echo base_url('/assets/img/banner-bg.jpg');?>) right;
    background-size: cover;">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
				<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Details sur la Compétition			
							</h1>	
							<p class="text-white link-nav"><a href="#">Accueil </a>  <span class="lnr lnr-arrow-right"></span>Compétition</p>
						</div>	
				</div>
			</section>
			<!-- End banner Area -->
	<!-- Start post-content Area -->
	<section class="post-content-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 posts-list">
							<div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
										
									</ul>
									<div class="user-details row">
															
									</div>
								</div>
								<div class="col-lg-9 col-md-9 ">
									
									<a class="posts-title" href="blog-single.html"><h3>
                                    <?php echo $compet['nom']; ?> <?php echo $compet['sigle']; ?> &ensp;&ensp; <small> <?php echo $compet['type_competition']; ?></small> </h3></a>
                                          <p> Pour le compte de l'année académique:  <b> <?php echo $compet['annee']; ?></b>  </p>
                                        <p class="posts-title" href="blog-single.html">
                                          Discipline :<b><?php echo $compet['nom_discipline']; ?></b> </p>
									<p class="excert">
                                       <b style="color: black;" >  Phase : </b><br> 
                                         <?php foreach ($phase as $p ):?>
							             <b style="color: black;"> <?php echo $p['nom_phase']; ?></b> debut :  <?php
											
											$date = new DateTime($p['date_debut']);
											echo $date->format("d-M-Y");
											?></p>
							          
                                        <?php endforeach; ?> 	
                                   </p>
                                   <small> Du :<b><?php
								    $date = new DateTime($compet['date_debut']);
									echo $date->format("d-M-Y");
								   ?> </b>   </small>   au <small> <b> <?php 
								   $date = new DateTime($compet['date_fin']);
								   echo $date->format("d-M-Y"); ?> </b>   </small> 
                                    
									</p>
									<small> <a href="<?php echo site_url('principal/index');?>" class="primary-btn"> <b style="color: black;">Retour</b> </a></small>
								</div>
							</div>
						</div>
					
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->







			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  	<script src=<?php echo base_url('assets/js/vendor/jquery-2.2.4.min.js');?>></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src=<?php echo base_url('assets/js/vendor/bootstrap.min.js');?>></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src=<?php echo base_url('assets/js/easing.min.js');?>></script>			
			<script src=<?php echo base_url('assets/js/hoverIntent.js');?>></script>
			<script src=<?php echo base_url('assets/js/superfish.min.js');?>></script>	
			<script src=<?php echo base_url('assets/js/jquery.ajaxchimp.min.js');?>></script>
			<script src=<?php echo base_url('assets/js/jquery.magnific-popup.min.js');?>></script>	
    		<script src=<?php echo base_url('assets/js/jquery.tabs.min.js');?>></script>						
			<script src=<?php echo base_url('assets/js/jquery.nice-select.min.js');?>></script>	
			<script src=<?php echo base_url('assets/js/owl.carousel.min.js');?>></script>									
			<script src=<?php echo base_url('assets/js/mail-script.js');?>></script>	
			<script src=<?php echo base_url('assets/js/main.js');?>></script>	
			
			
	
	
<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Notre site</h4>
								<ul>
									<li><a href="#">Campus info</a></li>
									<li><a href="#">Ouverture :08:00</a></li>
									<li><a href="#">Fermeture :18:00</a></li>
									
								</ul>								
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Contact</h4>
								<ul>
							
                                 	<li><a href="#">Tel: +237 222 25 40 02</a></li>
									<li><a href="#">Fax: +237 222 25 40 01</a></li>
									<li><a href="#">B.P: 454 Ngaoundéré - Cameroun</a></li>
								
								</ul>								
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Site web-Email</h4>
								<ul>


									<li><a href="#">Url: www.univ-ndere.cm</a></li>
									<li><a href="#">E-mail : un@univ-ndere.cm</a></li>
									
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Liens </h4>
								<ul>
									<li><a href="http://www.univ-ndere.cm/?page_id=271">Accessibilité</a></li>
									<li><a href="http://www.univ-ndere.cm/?page_id=286">Vie Associative</a></li>
									<li><a href="http://www.univ-ndere.cm/?page_id=284">MI – UNChat</a></li>
								</ul>								
							</div>
						</div>					
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Réseaux sociaux</h4>
								<ul>
									<li><a href="https://web.facebook.com/univNdere/?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a> &ensp;&ensp; Facebook</li>
									<li><a href="https://twitter.com/search?q=univ-ndere"><i class="fa fa-twitter"></i></a>&ensp;&ensp;Twitter</li>
									<li><a href="https://www.youtube.com/channel/UC6bML7CfxAPfJFVKycMjbxA"><i class="fa fa-youtube"></i></a>&ensp;&ensp;Youtube
							</li>
								
								</ul>								
							</div>
						</div>																		
												
					</div>
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved    
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-6 col-sm-12 footer-social">
							
							
							
						</div>
					</div>						
				</div>
			</footer>	
			<!-- End footer Area -->	
		</body>
	</html>