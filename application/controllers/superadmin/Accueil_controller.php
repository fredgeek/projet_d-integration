<?php
 class accueil_controller extends CI_Controller
 {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Superadmin_model');
	}
 	
 	public function accueil()
 	{
 		$this->load->view('superadmin/accueil');
 	}
 } 
?>