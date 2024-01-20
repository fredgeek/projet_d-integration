<?php 
class Formulaire_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Superadmin_model');
		$this -> load -> library ( 'form_validation' );
	}

	//INSERE DANS LA TABLE ETABLISSEMENT
	public function etablissement()
	{
		//REGLES DE VALIDATION
		$data['data']='';
		$data['data_cycle']='';
		$data['data_filiere']='';
		$data['data_annee']='';
		$this->form_validation->set_rules('sigle','sigle','required',
			array('required'=>'<h3 class="erreur"><i>veillez inserer un %s</i></h3>'));
		$this->form_validation->set_rules('nom','nom etablissement','required',
			array('required'=>'<h3 class="erreur"><i>veillez inserer le %s</i></h3>'));
		$this->form_validation->set_rules('contact','contact','required',
			array('required'=>'<h3 class="erreur"><i>veillez inserer le %s</i></h3>'));

		//VERIFIE SI LES REGLES DE VALIDATION SONT RESPECTÉS
		if ($this->form_validation->run()) 
		{
		  $nom=$this->input->post('nom');
		  $sigle=$this->input->post('sigle');
		  //VERIFIE SI LE SIGLE EXISTE DEJA DANS LA TABLE ETABLISSEMENT
		  $req1=$this
		  			 ->db
		  			 ->select('*')
		  			 ->from('etablissement')
		  			 ->where('nom_etablissement',$nom)
		  			 ->get();
		  $row1=$req1->num_rows();
		  //VERIFIE SI LE NOM EXISTE DEJA DANS LA TABLE ETABLISSEMENT
		  $req=$this
		  			 ->db
		  			 ->select('*')
		  			 ->from('etablissement')
		  			 ->where('sigle',$sigle)
		  			 ->get();
		  $row=$req->num_rows();
		  if ($row>0) 
		  {
		  	$data['data']='<h3 class="erreur"><i>echec enregistrement etablissement '.$nom.' a deja été enregistré</i></h3>';
		  }elseif ($row1>0) 
		  {
		  	$data['data']='<h3 class="erreur"><i>echec enregistrement le sigle '.$sigle.' a deja été enregistré</i></h3>';
		  }
		  else
		  {
			  	#INSERE DANS LA TABLE ETABLISSEMENT LE NOM ET CONTACT 
			  $etab['nom_etablissement']=strtoupper($this->input->post('nom'));
			  $etab['sigle']=ucfirst($this->input->post('sigle'));
			  $etab['contact_etablissement']=$this->input->post('contact');
			  $reponse=$this->Superadmin_model->save_etablissement($etab);
			  if ($reponse==true) 
			  {
			  	$data['data']='<h3 class="success"><i>enregistrement effectué avec succes</i></h3>';
			  }
		  }
		}
		$this->load->view('superadmin/etablissement',$data);
	}

	//INSERE DANS LA TABLE CYCLE
	public function cycle()
	{
		$data['data']='';
		$data['data_cycle']='';
		$data['data_filiere']='';
		$data['data_annee']='';
		$cycl1=$this->input->post('cycle1');
		$cycl2=$this->input->post('cycle2');
		$this->form_validation->set_rules('cycle1','cycle','required',array(
				'required'=>'<h3 class="erreur">veillez inserer un %s</h3>'));
		if($this->form_validation->run())
		{
		    //INSERE DANS LA TABLE CYCLE
			$cycle1['nom_cycle']=ucfirst($this->input->post('cycle1'));
			$cycle2['nom_cycle']=ucfirst($this->input->post('cycle2'));

			//VERIFIE SI LE CYCLE1 ET CYCLE2 EXISTE DEJA DANS LA TABLE CYCLE
			$req_cycle=$this
				  			 ->db
				  			 ->select('*')
				  			 ->from('cycle')
				  			 ->where('nom_cycle',$cycl1)
				  			 ->or_where('nom_cycle',$cycl2)
				  			 ->get();
		  	$row=$req_cycle->num_rows();
			if ($row>0) 
			{
			 	$data['data_cycle']='<h3 class="erreur"><i>echec enregistrement cycle existant</i></h3>';
			} 
			else
			{
				//VERIFIE SI LES DEUX VALEURS DU CYCLE SONT LES MEMES
				if ($cycl1==$cycl2) 
				{
					$data['data_cycle']='<h3 class="erreur"><i>erreur vous avez renseigner deux valeurs identiques</i></h3>';
				}
				//VERIFIE SI LE CYCLE2 EST VIDE 
				elseif ($cycl2=="") 
				{
					$rep1=$this->Superadmin_model->savecycle1($cycle1);
					if ($rep1==true) 
					{
						$data['data_cycle']='<h3 class="success"><i>enregistrement effectué avec succes</i></h3>';
					}
				}
				//INSERE LES DEUX VALEURS CYCLE ETCYCLE2
				else
				{
					$rep=$this->Superadmin_model->savecycle($cycle1,$cycle2);
					if ($rep==true) 
					{
						$data['data_cycle']='<h3 class="success"><i>enregistrement effectué avec succes</i></h3>';
					}
				}
			}
		}
		$this->load->view('superadmin/cycle',$data);
	}


	//INSERE DANS LA TABLE FILIERE
	public function filiere()
	{
		$data['data']='';
		$data['data_cycle']='';
		$data['data_filiere']='';
		$data['data_annee']='';
		$fil1=$this->input->post('filiere1');
		$fil2=$this->input->post('filiere2');
		$this->form_validation->set_rules('filiere1','filiere','required',array(
				'required'=>'<h3 class="erreur">veillez inserer une %s</h3>'));
		if($this->form_validation->run())
		{
		    //INSERE DANS LA TABLE FILIERE
			$filiere1['nom_filiere']=ucfirst($this->input->post('filiere1'));
			$filiere2['nom_filiere']=ucfirst($this->input->post('filiere2'));

			//VERIFIE SI LE FILIERE1 ET FILIERE2 EXISTE DEJA DANS LA TABLE FILIERE
			$req_filiere=$this
				  			 ->db
				  			 ->select('*')
				  			 ->from('filiere')
				  			 ->where('nom_filiere',$fil1)
				  			 ->or_where('nom_filiere',$fil2)
				  			 ->get();
		  	$row=$req_filiere->num_rows();
			if ($row>0) 
			{
			 	$data['data_filiere']='<h3 class="erreur"><i>echec enregistrement filiere existant</i></h3>';
			} 
			else
			{
				//VERIFIE SI LES DEUX VALEURS DE LA FILIERE SONT LES MEMES
				if ($fil1==$fil2) 
				{
					$data['data_filiere']='<h3 class="erreur"><i>erreur vous avez renseigner deux valeurs identiques</i></h3>';
				}
				//VERIFIE SI LA FILIERE2 EST VIDE 
				elseif ($fil2=="") 
				{
					$rep1=$this->Superadmin_model->savefiliere1($filiere1);
					if ($rep1==true) 
					{
						$data['data_filiere']='<h3 class="success"><i>enregistrement effectué avec succes</i></h3>';
					}
				}
				//INSERE LES DEUX VALEURS FILIERE1 ET FILIERE2
				else
				{
					$rep=$this->Superadmin_model->savefiliere($filiere1,$filiere2);
					if ($rep==true) 
					{
						$data['data_filiere']='<h3 class="success"><i> enregistrement effectué avec succes</i></h3>';
					}
				}
			}
		}
		$this->load->view('superadmin/filiere',$data);
	}

	//
	public function formulaire()
	{
		$data['data']='';
		$data['data_cycle']='';
		$data['data_filiere']='';
		$data['data_annee']='';
		$this->load->view('superadmin/formulaire',$data);
	}
}
?>