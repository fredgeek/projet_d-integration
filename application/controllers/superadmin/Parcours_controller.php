<?php
class Parcours_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Superadmin_model');
		$this -> load -> library ( 'form_validation' );
	}

	//INSERER UN PARCOURS
	public function recuparcours()
	{

		//FORM VALIDATION
		$data['data']='';
		$this->form_validation->set_rules('etablissement','etablissement','required',
		array('required'=>'<h3 class="erreur"><i>veillez renseignez le champs %s</i></h3>'));
		$this->form_validation->set_rules('filiere','filiere','required',
		array('required'=>'<h3 class="erreur"><i>veillez renseignez le champs %s</i></h3>'));
		if ($this->form_validation->run()) 
		{
			$this->_validate();

			//RECUPERATION DES CHAMPS ETABLISSEMN=ENT ET FILIERE
			  $etab=$this->input->post('etablissement');
			  $cycle=$this->input->post('cycle');
			  $filiere=$this->input->post('filiere');
			  $niveau=$this->input->post('niveau');
			  //RECUPERE ID DU CHAMPS ETABLISSEMENT
				$recup_etab=$this->Superadmin_model->recupere_id_etab($etab);

				//RECUPERE ID DU CHAMPS CYCLE
				$recup_cycle=$this->Superadmin_model->recupere_id_cycle($cycle);

				//RECUPERE ID DU CHAMPS FILIERE
				$recup_filiere=$this->Superadmin_model->recupere_id_filiere($filiere);
					//RECUPERE ID DU CHAMPS NIVEAU
				$recup_niveau=$this->Superadmin_model->recupere_id_niveau($niveau);

			//REQUETE DE VERIFICATION
		  	  $req=$this
		  	  			 ->db
		  	  			 ->select('*')
		  	  			 ->from('etablissement')
		  	  			 ->where('sigle',$etab)
		  	  			 ->get();
		  	  $req2= $this
		  	  			 ->db
		  	  			 ->select('*')
		  	  			 ->from('filiere')
		  	  			 ->where('nom_filiere',$filiere)
		  	  			 ->get();
		  	  $row=$req->num_rows();
			  $row2=$req2->num_rows();

			  // VERIFIE SI L' N'A PAS ENCORE ETE ENREGISTRER
			  if (!$row > 0) 
			  {
			  	$data['data']='<label class="erreur"><i> veillez ajouter l etablissement <label class="into">'.$etab.' </label> puis recommencer</i></label>';
			  }
			  //SI LA FILIERE N'A PAS ENCORE ETE ENREGISTRER
			   elseif (!$row2 > 0)
			  {
			  	$data['data']='<label class="erreur"><i> veillez ajouter la filiere <label class="into">'.$filiere.' </label> puis recommencer</i></label>';
			  }
			  //VERIFIE SI LES INFORMATIONS EXISTE DEJA DANS LA BASE DE DONNEES
			  else
			  {
			  	 //VERIFIE SI LES INFORMATIONS EXISTE DEJA DANS LA BASE DE DONNEES
				$query=$this
					   ->db
					   ->SELECT ('*')
					   ->FROM ('parcours')
						->WHERE ('id_nom_etablissement',$recup_etab)
						->WHERE ('id_cycle_parcours',$recup_cycle)
						->WHERE ('id_filiere_parcours',$recup_filiere)
						->WHERE ('id_niveau_parcours',$recup_niveau)
						->WHERE ('etat_parcours',0)
						->get();
				if ($query->num_rows() > 0) 
				{
					$data['data']='<h3 class="erreur"><i> echec enregistrement parcours existant</i></h3>';
				}
				else
				{
					//INSERTION DANS LA TABLE PARCOURS
					$insere['id_nom_etablissement']=$recup_etab;
					$insere['id_cycle_parcours']=$recup_cycle;
					$insere['id_filiere_parcours']=$recup_filiere;
					$insere['id_niveau_parcours']=$recup_niveau;
					$rep=$this->Superadmin_model->recupereparcours($insere);
					if ($rep==true) 
					{
						$data['data']='<h3 class="success"><i>enregistrement effectué avec succes</i></h3>';
					}
			   }
			}
		}

		// RECUPERE LE NOM DE L'ETABLISSEMENT CYLE FILIERE ET NIVEAU
		$data['result']=$this->Superadmin_model->get_etablissement();
		
		//CHARGEMENT DE LA VU
		$this->load->view('superadmin/parcours',$data);
		
	}

	//MODIFIER UN PARCOURS
	public function update_parcours()
	{
		//FORM VALIDATION
		$data['data']='';
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->get(htmlentities('id'));

		$this->form_validation->set_rules('new_etablissement','etablissement','required',
		array('required'=>'<h3 class="erreur"><i>champs %s vide</i></h3>'));
		$this->form_validation->set_rules('new_filiere','filiere','required',
		array('required'=>'<h3 class="erreur"><i> champs %s vide</i></h3>'));
		if ($this->form_validation->run()) 
		{
			$new_etablissement=$this->input->post('new_etablissement');
			$new_cycle=$this->input->post('new_cycle');
			$new_filiere=$this->input->post('new_filiere');
			$new_niveau=$this->input->post('new_niveau');

			//RECUPERE ID DU CHAMPS ETABLISSEMENT
			$recup_new_etab=$this->Superadmin_model->recupere_id_new_etab($new_etablissement);

			//RECUPERE ID DU CHAMPS CYCLE
			$recup_new_cycle=$this->Superadmin_model->recupere_id_new_cycle($new_cycle);

			//RECUPERE ID DU CHAMPS FILIERE
			$recup_new_filiere=$this->Superadmin_model->recupere_id_new_filiere($new_filiere);
			//RECUPERE ID DU CHAMPS NIVEAU
			$recup_new_niveau=$this->Superadmin_model->recupere_id_new_niveau($new_niveau);
			//REQUETE DE VERIFICATION
		  	  $req=$this->db->query("select * from etablissement where nom_etablissement='$new_etablissement'");
		  	  $req2=$this->db->query("select * from filiere where nom_filiere='$new_filiere'");
		  	  $row=$req->num_rows();
			  $row2=$req2->num_rows();

			  // VERIFIE SI L' N'A PAS ENCORE ETE ENREGISTRER
			  if (!$row > 0) 
			  {
			  	$data['data']='<label class="erreur"><i> veillez ajouter l etablissement <label class="into">'.$new_etablissement.' </label> puis recommencer</i></label>';
			  }
			  //SI LA FILIERE N'A PAS ENCORE ETE ENREGISTRER
			   elseif (!$row2 > 0)
			  {
			  	$data['data']='<label class="erreur"><i> veillez ajouter la filiere <label class="into">'.$new_filiere.' </label> puis recommencer</i></label>';
			  }
			   //VERIFIE SI LES INFORMATIONS EXISTE DEJA DANS LA BASE DE DONNEES
			  else
			  {
			  	 //VERIFIE SI LES INFORMATIONS EXISTE DEJA DANS LA BASE DE DONNEES
				$query=$this
					   ->db
					   ->SELECT ('*')
					   ->FROM ('parcours')
						->WHERE ('id_nom_etablissement',$recup_new_etab)
						->WHERE ('id_cycle_parcours',$recup_new_cycle)
						->WHERE ('id_filiere_parcours',$recup_new_filiere)
						->WHERE ('id_niveau_parcours',$recup_new_niveau)
						->WHERE ('etat_parcours',0)
						->get();
				if ($query->num_rows() > 0) 
				{
					$data['data']='<h3 class="erreur"><i> echec de modification parcours existant</i></h3>';
				}
				else
				{
					//MODIFICATION DANS LA TABLE PARCOURS
					$reponse=$this->Superadmin_model->update_parcours($id,$recup_new_etab,$recup_new_cycle,$recup_new_filiere,$recup_new_niveau);
					if ($reponse==true) 
					{
						$data['data']='<h3 class="success"><i>modification effectué avec succes</i></h3>';
					}
			   }
			}
		}
		// RECUPERE LE NOM DE L'ETABLISSEMENT CYLE FILIERE ET NIVEAU
		$data['result']=$this->Superadmin_model->get_etablissement();
		$this->load->view('superadmin/parcours',$data);
	}

		//SUPPRIMER UN PARCOURS
	public function delete_parcours()
	{
		$data['data']='';
		$value=1;
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->post(htmlentities('id'));
					$rep=$this->Superadmin_model->delete_parcours($id,$value);
					if ($rep==true) 
					{
						$data['data']='<label class="success"> suppressions effectuées avec succes</label>';
					}
		// RECUPERE LE NOM DE L'ETABLISSEMENT CYLE FILIERE ET NIVEAU
		$data['result']=$this->Superadmin_model->get_etablissement();
		$this->load->view('superadmin/parcours',$data);
	}
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		if($this->input->post('etablissement') == '')
		{
			$data['inputerror'][] = 'etablissement';
			$data['error_string'][] = '<h3 class="erreur"><i>veillez renseignez le champs %s</i></h3>';
			//$data['status'] = FALSE;
		}

		if($this->input->post('filiere') == '')
		{
			$data['inputerror'][] = 'filiere';
			$data['error_string'][] = 'Le nom  est un champ requis';
			//$data['status'] = FALSE;
		}
	}
} 
 ?>