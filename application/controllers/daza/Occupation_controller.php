<?php
class Occupation_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
		$this -> load -> library ( 'form_validation' );
	}
	public function occupation()
	{
		$data['data']='';
		$this->form_validation->set_rules('event','evenement','required',array('required'=>'<label class="erreur">le champs %s est vide</label>'));
		$this->form_validation->set_rules('dates','date','required',array('required'=>'<label class="erreur">veillez renseignez le champs %s</label>'));
		$this->form_validation->set_rules('heure_debut','heure du debut','required',array('required'=>'<label class="erreur">veillez renseignez l\'%s<?label>'));
		$this->form_validation->set_rules('heure_fin','heure de la fin','required',array('required'=>'<label class="erreur">veillez renseignez l\'%s</label>'));
		if ($this->form_validation->run()) 
		{
			//RECUPERE LES ELEMENT DU FORMULAIRE
				$event=ucfirst($this->input->post('event'));
				$annee=$this->input->post('annee');
				$dates=$this->input->post('dates');
				$stade=$this->input->post('stade');
				$lieu=$this->input->post('lieu');
				$heure_debut=$this->input->post('heure_debut');
				$heure_fin=$this->input->post('heure_fin');
			//CONVERSION DE LA DATE
				$converdate=date("Y-m-d",strtotime($dates));
									//VERIFIE SI LE STADE EXISTE
						$req1=$this
								   ->db
								   ->select('*')
								   ->from('stade')
								   ->where('nom_stade',$stade)
								   ->where('lieu_stade',$lieu)
								   ->where('etat_stade',0)
								   ->get();
					if ($req1->num_rows()>0) 
					{
						
						
							//INSERE L'HEURE DE DEBUT ET DE FIN
							//RECUPERE L'ID DU STADE CHOISI
								$id_stade=$this->daza_model->get_id_stade($stade,$lieu);
								$unique= $data2['uniq'] = bin2hex( random_bytes(7));
								$data2['debut_occupation']=$heure_debut;
								$data2['fin_occupation']=$heure_fin;
								$data2['stade_id']=$id_stade;
								
							//INSERTION DANS LA TABLE OCCUPATION
								$occupation=$this->daza_model->insert_occupation($data2); 
							if ($occupation==true) 
							{
								//RECUPER ID DE HEURE DEBUT ET FIN
									$id_occupation=$this->daza_model->get_id_heure_occupation($heure_debut,$heure_fin,$unique);
								//INSERE LE NOM ET LA DATE DE L'EVENEMENT
									$data1['nom_autre']=$event;
									$data1['date_autre']=$converdate;
									$data1['occupation_id']=$id_occupation;

								//INSERTION DANS LA TABLE AUTRE
								$rep=$this->daza_model->insert_data($data1);
								if ($rep==true)
								{
									
										//RECUPERE L'ID DE LA DATE
											$id_annee=$this->daza_model->get_id_annee2($annee);
										//RECUPERE L'ID DE L'AUTRE
											$id_autre=$this->daza_model->get_id_autre($event,$converdate);
										//INSERTION MULTIPLE DES ID
											$insert2['annee_id']=$id_annee;
											$insert2['autre_id']=$id_autre;
											$reponse=$this->daza_model->insert_id($insert2);
											if ($reponse==true) 
											{
												$data['data']='<label class="success">Enregistrement effectué avec succes</label>';
											}
								}
							}
					}else
					{
						$data['data']='<label class="erreur">Stade non exitant</label>';
					}
		}
		$annee=$this->input->post('annee');
		$data['id']=$this->daza_model->get_id_annee($annee);
		//RECUPERE L'ANNEE ENCOURS
		$data['result']=$this->daza_model->recupere_annee_encours();
		$this->load->view('daza/occupation',$data);
	}

	//MODIFIE UNE OCCUPATION
		public function update_occupation()
	{
		$data['data']='';
		$id=$this->input->get(htmlentities('id'));

			//RECUPERE LES ELEMENT DU FORMULAIRE
				$event=ucfirst($this->input->post('new_event'));
				$dates=$this->input->post('new_date');
				$stade=$this->input->post('new_stade');
				$lieu=$this->input->post('new_lieu');
				$heure_debut=$this->input->post('new_debut');
				$heure_fin=$this->input->post('new_fin');
			//CONVERSION DE LA DATE
				$converdate=date("Y-m-d",strtotime($dates));

					//VERIFIE SI LE STADE EXISTE
						$req1=$this
								   ->db
								   ->select('*')
								   ->from('stade')
								   ->where('nom_stade',$stade)
								   ->where('lieu_stade',$lieu)
								   ->where('etat_stade',0)
								   ->get();
					if ($req1->num_rows()>0) 
					{
						
						
							//INSERE L'HEURE DE DEBUT ET DE FIN
							//RECUPERE L'ID DU STADE CHOISI
								$id_stade=$this->daza_model->get_id_stade($stade,$lieu);
								
							//MODIFIE DANS LA TABLE OCCUPATION
								$occupation=$this->daza_model->update_occupation($id,$heure_debut,$heure_fin,$id_stade); 
							if ($occupation==true) 
							{

								//MODIFIE DANS LA TABLE AUTRE
								$rep=$this->daza_model->update_autre($id,$event,$converdate);
								if ($rep==true)
								{
									
								$data['data']='<label class="success">Modifications effectuées avec succes</label>';
								}
							}
					}else
					{
						$data['data']='<label class="erreur">Stade non exitant</label>';
					}


		$annee=$this->input->post('annee');
		$data['id']=$this->daza_model->get_id_annee($annee);
		//RECUPERE L'ANNEE ENCOURS
		$data['result']=$this->daza_model->recupere_annee_encours();
		$this->load->view('daza/occupation',$data);
	}
	//SUPPRIMER UNE OCCUPATION
	public function delet_occupation()
	{
		$data['data']='';
		$value=1;
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->post(htmlentities('id'));
					$rep=$this->daza_model->delete_occupation($id,$value);
					if ($rep==true) 
					{
						$data['data']='<label class="erreur"> suppressions effectuées avec succes</label>';
					}
		//RECUPERE LES DONNEES DE LA TABLE OCCUPATION
		$annee=$this->input->post('annee');
		$data['id']=$this->daza_model->get_id_annee($annee);
		//RECUPERE L'ANNEE ENCOURS
		$data['result']=$this->daza_model->recupere_annee_encours();
		$this->load->view('daza/occupation',$data);
	}
	//CLOTURE UNE OCCUPATION
		public function close_occupation()
	{
		$data['data']='';
		$value=1;
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->post(htmlentities('id'));
					$rep=$this->daza_model->closed_occupation($id,$value);
					if ($rep==true) 
					{
						$data['data']='<label class="erreur"> operation effectuée avec succes</label>';
					}
		//RECUPERE LES DONNEES DE LA TABLE OCCUPATION
		$annee=$this->input->post('annee');
		$data['id']=$this->daza_model->get_id_annee($annee);
		//RECUPERE L'ANNEE ENCOURS
		$data['result']=$this->daza_model->recupere_annee_encours();
		$this->load->view('daza/occupation',$data);
	}
} 
?>