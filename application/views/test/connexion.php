<!DOCTYPE html>
<html lang="en">
<head>
	<title>Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href=<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href=<?php echo base_url('assets/login/images/icons/favicon.ico');?>/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/animate/animate.css');?>>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/animsition/css/animsition.min.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/select2/select2.min.css');?>>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.css');?>>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/css/util.css');?>>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('assets/login/css/main.css');?>>
<!--===============================================================================================-->
<style>
	#togglePassword {
		margin-left: 30px;
    cursor: pointer;
}
</style>
</head>
<body> 
	
	<div class="limiter">
	               
		<div class="container-login100">
		
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo base_url('/assets/login/images/bg-01.jpg');?>)">
					<span class="login100-form-title-1">
						Sport Event
					</span>
				</div>
				<br>
				<?php if($this->session->flashdata('user_failed')):?>
					<div class="col-12" id="a">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_failed').'</p>';?>
					</div>
					<?php endif;?>
				<div class="login100-form validate-form">
				
				<?php echo form_open('test/login'); ?>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Nom d'utilisateur requis">
						<span class="label-input100">Nom</span>
						<input class="input100" type="text" name='username' placeholder="Entrez votre nom d'utilisateur">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "votre mot de passe est requis">
						<span class="label-input100">Mot de passe</span>
						<p>
						<input  type="password" name='password' placeholder="Entrez votre mot de passe" id="password" >
				    	<i class="far fa-eye" id="togglePassword"></i>
						</p>
					</div>
				
					
					

						<div  class="flex-sb-m w-full p-b-30">
							<a href="#" class="txt1">
							&ensp;	&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
						&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
						&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
						&ensp;&ensp;&ensp;&ensp;.
							</a>
						</div>
				

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							connexion
						</button>
					</div>
					<?php echo form_close(); ?>
					</div>
				
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src=<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js');?>></script>
<!--===============================================================================================-->
	<script src=<?php echo base_url('assets/login/vendor/animsition/js/animsition.min.js');?>></script>
<!--===============================================================================================-->
	<script src=<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js');?>></script>
	<script src=<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js');?>></script>
<!--===============================================================================================-->
	<script src=<?php echo base_url('assets/login/vendor/select2/select2.min.js');?>></script>
<!--===============================================================================================-->
	<script src=<?php echo base_url('assets/login/vendor/daterangepicker/moment.min.js');?>></script>
	<script src=<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.js');?>></script>
<!--===============================================================================================-->
	<script src=<?php echo base_url('assets/login/vendor/countdowntime/countdowntime.js');?>></script>
<!--===============================================================================================-->
	<script src=<?php echo base_url('assets/login/js/main.js');?>></script>
	<script>
		$( "#a" ).fadeOut( 7000 );
		const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

		togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
		
        // toggle the eye / eye slash icon
		this.classList.toggle('far fa-eye-slash');
		
                });
	</script>

</body>
</html>