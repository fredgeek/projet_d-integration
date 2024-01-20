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
		<header id="header" id="home"style="">
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
			        <a href="index.html"><img src="<?php echo base_url('assets\img\logo.png');?>" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu"> 
					<li><a href="#me1">Accueil</a></li>
					  <li><a href="#course">Publications</a></li>
			          <li><a href="<?php echo site_url('Principal/apropos');?>"> à propos </a></li>
			          <li><a href="<?php echo site_url('Principal/blog');?>">Blog Athlètes</a></li>
					  <?php if(!$this->session->userdata('connexion')):?>				          					          		          
						<li><a href="<?php echo site_url();?>/Test/login">se connecter</a></li>
					 
					  <?php endif;?>
					  <?php if($this->session->userdata('connexion')):?>				          					          		          
						<li class="menu-has-children"><a href="#" class="nav-link active"><?php echo ucfirst($this->session->userdata('user_name'));?></a> 
			            <ul>
		              		<li><a href="<?php echo site_url();?>/Test/deconnexion">Se deconnecter</a></li>
						 	  <?php if( $this->session->userdata('rol')==='Responsable de competition') : ?>
		              		   <li><a href="<?php echo site_url();?>/Respocompet/index">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
							 <?php if( $this->session->userdata('rol')==='Responsable de classe') : ?>
		              		   <li><a href="<?php echo site_url();?>/Respoclasse/index">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
							 <?php if( $this->session->userdata('rol')==='Daza') : ?>
		              		   <li><a href="<?php echo site_url();?>/daza/Accueil_controller/accueil">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
							 <?php if( $this->session->userdata('rol')==='Administrateur') : ?>
		              		   <li><a href="<?php echo site_url();?>/superadmin/Accueil_controller/accueil">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
			            </ul>
			          </li>				
					
					  <?php endif;?>	          					          		          
			          
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->
		  <div class="container"> 
				
				  </div>	    	
			
		
			<!-- start banner Area -->
			<section class="banner-area relative" id="home" 
    style="background: url(<?php echo base_url('/assets/img/banner-bg.jpg');?>) right;
    background-size: cover;">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase" >
								Bienvenue sur Sport Event <span class="typed-words" style="font-size: 32px;"></span>		
							</h1>
							<p class="pt-10 pb-10" style="font-size: 20px;">
								suivez et participez aux compétitions universitaires
							</p>
							
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start feature Area -->
			<section class="feature-area" id="me1">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Jouer dans la bonne humeur</h4>
								</div>
								<div class="desc-wrap">
									<p>
										L'objectif Principale est de prendre du bon temps et de garder la forme
									</p>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Participer et gagner</h4>
								</div>
								<div class="desc-wrap">
									<p>
										Une recompense pour vous et votre établissement, pour votre filiére et votre niveau
									</p>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>Que le meilleur gagne</h4>
								</div>
								<div class="desc-wrap">
									<p>
									 Amusez-vous dans la bonne humeur
									</p>
																		
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End feature Area -->
					
			<!-- Start popular-course Area -->
			<section class="popular-course-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Des sports variés pour les deux genres</h1>
								<p>Sans complexe venez participer en choississant votre discipline de coeur</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-popular-carusel">
							<div class="single-popular-carusel">
								<div class="details">
									<a href="#">
										<h4>
											Tennis
										</h4>
									</a>
									<p>
									Un sport bénéfique tant physiquement que mentalement.Le tennis  vous aidera à améliorer  concentration, l’adresse et la souplesse.
									Le tennis vous permettra de mieux dominer vos  émotions.								
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
							
								<div class="details">
									<a href="#">
										<h4>
											athlètisme
										</h4>
									</a>
									<p>
										courir ,sauter,lancer...
										Courir pour améliorer son mental, son humeur et évacuer le stress.
										Le saut  améliore la posture, l’équilibre et l’agilité.
									    Lancer une augmentatez votre  puissance votre coordination motrice.

							
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								
								<div class="details">
									<a href="#">
										<h4>
											Volley ball
										</h4>
									</a>
									<p>
									Un sport qui vous permmettra de  développez votre confiance de soi et esprit d’équipe, gagnez également en vitesse, 
									l’agilité et les réflexes.
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								
								<div class="details">
									<a href="#">
										<h4>
											Judo
										</h4>
									</a>
									<p>
									Le judo  « la voie de la souplesse »,boostera vos spécificités physiques,
									psychologiques et cognitives.Il vous enseignera la discipline, la maîtrise et la confiance de soi.
									</p>
								</div>
							</div>
							<div class="single-popular-carusel">
								
								<div class="details">
									<a href="#">
										<h4>
											Tennis de table
										</h4>
									</a>
									<p>
									Développez vos réflexe, votre agilité et votre  coordination
									 dépensez-vous tout en vous amusant.										
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								
								<div class="details">
									<a href="#">
										<h4>
											Basket
										</h4>
									</a>
									<p>
									Un sport dynamique aux nombreuses vertus,améliorez votre coordination, anticipation et adresse.
								   Forgez votre personnalité et votre esprit d’équipe.										
								  </p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								
								<div class="details">
									<a href="#">
										<h4>
											Handball
										</h4>
									</a>
									<p>
										Voltiger avec joie.Ce sport boostera vos capacités aérobies et améliorera votre  condition physique générale.
										Le handball permet de développer la vitesse et la rapidité,renforce l’agilité et la force.										
									</p>
								</div>
							</div>	
							<div class="single-popular-carusel">
								
								<div class="details">
									<a href="#">
										<h4>
											Football
										</h4>
									</a>
									<p>Pratiquer le football, c’est trouver un équilibre en jouant avec les autres.Cette capacité à travailler en équipe vers
									 un but commun vous sera très profitable dans la vie de tous les jours, permettant une ouverture d’esprit qui vous seront utile à la fois dans votre vie privée et professionnelle.									
									</p>
								</div>
							</div>							
						</div>
					</div>
				</div>	
			</section>
			<!-- End popular-course Area -->
		
		<!-- Start cta-one Area -->
		<section class="cta-one-area relative section-gap"   style="background: url(<?php echo base_url('/assets/img/nderefc.jpg');?>) right;
    background-size: cover;" id="course">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row justify-content-center">
						<div class="wrap">
							<h1 class="text-white">Publications </h1>
						</div>					
					</div>
				</div>	
			</section>
			<!-- End cta-one Area -->
			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10"> Actualités </h1>
								
							</div>
						</div>
					</div>					
					<div class="row">
					<?php foreach ($pub as $publication ):?>
                        
                                            
                                    
                        	
						<div class="col-lg-3 col-md-6 single-blog">
							<p class="meta"><small> <?php  $date = new DateTime($publication['post']);
						  echo $date->format("d-M-Y-H:i"); 
							
							 ?></small></p>
							<a href="blog-single.html">
								<h4><?php echo $publication['title']; ?> </h4>
							</a>
							<p>
							<?php echo word_limiter($publication['text'], 10); ?>
							</p>
							<a href="<?php echo site_url('Principal/publication/'.$publication['id']); ?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>		
						</div>	
						
				   <?php endforeach; ?> 
					</div>
				</div>
				
				<!-- rRESULTATS -->
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Compétitions récentes </h1>
								
							</div>
						</div>
					</div>					
					<div class="row">
					<?php foreach ($compet as $competition ):?>
						<div class="col-lg-3 col-md-6 single-blog">
							<p class="meta">   | Compétition : <b> <?php echo $competition['type_competition']; ?></b></p>
							<a href="blog-single.html">
								<h5><?php echo $competition['nom']; ?> |<?php echo $competition['nom_discipline'];
								?></h5>
							</a>
							<p>
						 <?php  	$date = new DateTime($competition['date_debut']);
						  echo $date->format("d-M-Y"); ?> au  <?php  	$date = new DateTime($competition['date_fin']);
						 echo $date->format("d-M-Y");?> | <b> ecole: </b>  <a href="#"> <?php echo $competition['nom_etablissement']; ?></a>
							</p>
							<a href="<?php echo site_url('Principal/competition/'.$competition['id_competition']); ?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>		
						</div>
								
				<?php endforeach; ?> 			
					</div>
				</div>	
				<!-- /RESULTATS -->
			</section>
			
			
			<!-- Start cta-one Area -->
		<section class="cta-one-area relative section-gap"   style="background: url(<?php echo base_url('/assets/img/banner-bg.jpg');?>) right;
    background-size: cover;" id="course">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row justify-content-center">
						<div class="wrap">
							<h1 class="text-white">Rencontres et Résultats </h1>
						</div>					
					</div>
				</div>	
			</section>
			<!-- End cta-one Area -->
			<!-- Start blog Area -->
			<section class="popular-course-area section-gap">
				<!-- rencontres -->
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Évènements programmés</h1>
								<p></p>
							</div>
						</div>
					</div>						
					<div class="row">
					
						<div class="active-popular-carusel">
						<?php foreach ($rencontre as $rencontre ):?>
							<div class="single-popular-carusel">
								<div class="details">
									<a href="#">
										<h5>
										<?php echo $rencontre['nom_equipe1']; ?> <br>  &ensp; &ensp; &ensp; &ensp; &ensp; &ensp;  <small> Contre </small> <br>  <?php echo $rencontre['nom_equipe2']; ?>
										</h5>
									</a>
									<p>
								   Date :<b><?php echo $rencontre['date_rencontre']; ?></b> <br>
								   	Phase : <b><?php echo $rencontre['nom_phase']; ?></b> <br>
									   <?php echo word_limiter( $rencontre['nom'].' '.$rencontre['type_competition'].' '.$rencontre['nom_etablissement'] ,10); ?> 				
									</p>
								
									<a href="<?php echo site_url('Principal/rencontre/'.$rencontre['id_rencontre']); ?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>	
									<a href="<?php echo site_url('Principal/resultat/'.$rencontre['id_rencontre']); ?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Resultat</span><span class="lnr lnr-arrow-right"></span></a>	
								</div>
							</div>
							<?php endforeach; ?> 
							<?php $recup_annee=$this->Principal_model->get_annee_encours();
				                  //RECUPERE L'ID AUTRE  DE LA TABLE ANNEE_AUTRE
				                  $recup_id_autre=$this->Principal_model->get_id_autre_annee($recup_annee);
				                  foreach ($recup_id_autre as $annee_autre) 
				                  {
				                 ?>
							<div class="single-popular-carusel">
								<div class="details">
									<a href="#">
										<h5>
										<label><?php echo $annee_autre['nom_autre'] ?></label>
										</h5>
									</a>
									<p>
								   Date :<b><?php echo $annee_autre['date_autre']; ?></b> <br>
								   	Heure : <b><?php echo $annee_autre['debut_occupation'].' - '.$annee_autre['fin_occupation']; ?></b> <br>
									   Stade : <label><?php echo $annee_autre['nom_stade'].' '.$annee_autre['lieu_stade'] ?></label></ <br> 		
									</p>
									<span class="details text-primary">Etat : <h5>
										<?php if ($annee_autre['statut_autre']==1) 
	                        			{ ?> 
	                        			<label class="text-success"> Encours...</label>
	                        			<?php }else{ ?>
	                        			<label class="text-danger"> Cloturé </label></h5>	
	                        		<?php } ?>
                        			</span>
								</div>
							</div>
							<?php } ?>  			
						</div>
						
					</div>
				</div>	
				<!-- /rencontres -->
				
			</section>
			<!-- End popular-course Area -->
			<!-- End blog Area -->	
			<section class="cta-one-area relative section-gap"   style="background: url(<?php echo base_url('/assets/img/nderefc.jpg');?>) right;
    background-size: cover;" id="course">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row justify-content-center">
						<div class="wrap">
							<h1 class="text-white">Equipes disponibles et Stades</h1>
						</div>					
					</div>
				</div>	
			</section>
			<section class="popular-course-area section-gap">
				<!-- rencontres -->
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Stades</h1>
								<p></p>
							</div>
						</div>
					</div>						
					<div class="row">
					
						<div class="active-popular-carusel">
						<?php foreach ($stade as $stad ):?>
							<div class="single-popular-carusel">
								<div class="details">
									<a href="#">
										<h5>
										Stade de : &ensp;<?php echo $stad['nom_stade']; ?> <br>  
										</h5>
									</a>
									<p>
								   Localisation  <br> &ensp;<b><?php echo $stad['lieu_stade']; ?></b> <br>
								   <?php if ($stad['etat_stade']== 0):?>
                                       En état d'utilisation

									   <?php endif ?>
									</p>	
								</div>
							</div>
							<?php endforeach; ?> 					
						</div>
						<a href="<?php echo site_url('Principal/calendrier') ?>" class="details-btn d-flex justify-content-center align-items-center">Calendrier<span class="lnr lnr-arrow-right"></span></a> 
					</div>
				</div>	
				<!-- /rencontres -->
				
			</section>
			<section class="popular-course-area section-gap">
				<!-- rencontres -->
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Equipes disponibles </h1>
								<p></p>
							</div>
						</div>
					</div>						
					<div class="row">
					
						<div class="active-popular-carusel">
						<?php foreach ($equipe as $equip ):?>
							<div class="single-popular-carusel">
								<div class="details">
									<a href="#">
										<h5>
										 <?php echo $equip['nom']; ?> <br>  
										</h5>
									</a>
									<p>
									Etablissement : <b><?php echo $equip['sigle']; ?></b>  <br>
									Equipe : <br>  <b><?php echo $equip['genre']; ?></b> de  <b><?php echo $equip['discipline']; ?></b> <br>
								  
									</p>	
								</div>
							</div>
							<?php endforeach; ?>
											
						</div>
						<a href="<?php echo site_url('Principal/equipe') ?>" class="details-btn d-flex justify-content-center align-items-center">Toutes les équipes<span class="lnr lnr-arrow-right"></span></a> 
					</div>
				</div>	
				<!-- /rencontres -->
				
			</section>
		
			<!-- Start cta-two Area -->
			<section class="cta-two-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 cta-left">
							<h1>Un espace dédié aux meilleurs athlètes</h1>
						</div>
						<div class="col-lg-4 cta-right">
						
							<a class="primary-btn wh" href="<?php echo site_url('Principal/blog');?>">Voir plus...</a>
						</div>
					</div>
				</div>	
			</section>

			<!-- End cta-two Area -->
						
			
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