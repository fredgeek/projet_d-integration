<?php
class Compte_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Superadmin_model');
		$this -> load -> library ( 'form_validation' );
	}

	//INSERER UN COMPTE
	public function recupcompte()
	{

		//FORM VALIDATION
		$data['data']='';
		$this->form_validation->set_rules('username','nom d\'utilisateur','required',
		array('required'=>'<h3 class="erreur"><i>veillez renseignez le %s</i></h3>'));
		if ($this->form_validation->run()) 
		{
			//RECUPERATION DES CHAMPS USERNAME ROLE
			  $username=ucfirst($this->input->post('username'));
			  $role=$this->input->post('role');

			  //VERIFIE SI LES INFORMATIONS EXISTE DEJA DANS LA BASE DE DONNEES
			  	$pwd="";
				for ($i=0; $i <= 2 ; $i++) 
				{ 
					$random= rand(97,122);
					$random2= rand(0,9);
					$pwd =$pwd.chr($random).$random2;
				}
				$insere['username']=$username;
			  	$insere['role']=$role;
			  	$insere['password']=$pwd;
			  	 $rep=$this->Superadmin_model->insere_compte($insere);
					if ($rep==true) 
					{
						$data['data']='<h3 class="success"><i>enregistrement effectué avec succes</i></h3>';
					}
		}

		// RECUPERE LA TABLE COMPTE
		$data['result']=$this->Superadmin_model->get_compte();
		
		//CHARGEMENT DE LA VU
		$this->load->view('superadmin/gestion_compte',$data);
		
	}

	//MODIFIER UN COMPTE
	public function update_compte()
	{
		//FORM VALIDATION
		$data['data']='';
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->get(htmlentities('id'));
		$this->form_validation->set_rules('new_username','nom d\'utilisateur','required',
		array('required'=>'<h3 class="erreur"><i>champs %s vide</i></h3>'));
		if ($this->form_validation->run()) 
		{
			$username=$this->input->post('new_username');
			$role=$this->input->post('new_role');
			  	 $rep=$this->Superadmin_model->update_new_compte($username,$role,$id);
					if ($rep==true) 
					{
						$data['data']='<h3 class="success"><i>modifications effectuées avec succes</i></h3>';
					}
				
		}
		// RECUPERE LA TABLE COMPTE
		$data['result']=$this->Superadmin_model->get_compte();
		
		//CHARGEMENT DE LA VU
		$this->load->view('superadmin/gestion_compte',$data);
	}
} 
 ?>