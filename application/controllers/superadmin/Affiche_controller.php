<?php 
class Affiche_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Superadmin_model');
		$this -> load -> library ( 'form_validation' );
	}

	//AFFICHE LA LISTE DES ETABLISSEMENT
	public function etablissement()
	{
		$data['data']='';
		$this->load->view('superadmin/etablissement',$data);
	}
		//MODIFIER UN ETABLISSEMENT
	public function update_etablissement()
	{
		$data['data']='';
		$new_etab=$this->input->post('new_etab');
		$new_name=$this->input->post('new_name');
		$new_contact=$this->input->post('new_contact');
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->get(htmlentities('id'));

		$this->form_validation->set_rules('new_etab','sigle','required',
			array
			('required'=>'<label class="erreur">Veillez renseignez la valeur du nouveau %s</label>'
			));
		$this->form_validation->set_rules('new_name','etablissement','required',
			array
			('required'=>'<label class="erreur">Veillez renseignez la valeur du nouveau %s</label>'
			));
		$this->form_validation->set_rules('new_contact','contact','required',
			array
			('required'=>'<label class="erreur">Veillez renseignez la valeur du nouveau %s</label>'
			));
		if ($this->form_validation->run()) 
		{
			$req=$this
					  ->db
					  ->select('*')
					  ->from('etablissement')
					  ->where('nom_etablissement',$new_etab)
					  ->where('sigle',$new_name)
					  ->where('contact_etablissement',$new_contact)
					  ->get();
				if ($req->num_rows()>0) 
				{
					$data['data']='<label class="erreur">echec de modification information existante</label>';
				}
				else
				{
					$rep=$this->Superadmin_model->update_etablissement($id,$new_etab,$new_name,$new_contact);
					if ($rep==true) 
					{
						$data['data']='<label class="success"> modifications effectuées avec succes</label>';
					}

				}
			
		}
		$this->load->view('superadmin/etablissement',$data);
	}

	//SUPPRIMER UN ETABLISSEMENT
	//public function delete_etablissement()
	//{
		//$data['data']='';
		//$value=1;
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		//$id=$this->input->get(htmlentities('id'));
					//$rep=$this->Superadmin_model->delete_etablissement($id,$value);
					//if ($rep==true) 
					//{
						//$data['data']='<label class="erreur"> suppressions effectuées avec succes</label>';
					//}
		//$this->load->view('superadmin/etablissement',$data);
	//}


	//AFFICHE LA LISTE DES CYCLES
	public function cycle()
	{
		$data['data']='';
		$data['data_cycle']='';
		$this->load->view('superadmin/cycle',$data);
	}

	//MODIFIER UN CYCLE
	public function update_cycle()
	{
		$data['data']='';
		$data['data_cycle']='';
		$new_cycle=$this->input->post('new_cycle');
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->get(htmlentities('id'));

		$this->form_validation->set_rules('new_cycle','cycle','required',
			array
			('required'=>'<label class="erreur">Veillez renseignez la valeur du nouveau %s</label>'
			));
		if ($this->form_validation->run()) 
		{
			$req=$this
					  ->db
					  ->select('*')
					  ->from('cycle')
					  ->where('nom_cycle',$new_cycle)
					  ->get();
				if ($req->num_rows()>0) 
				{
					$data['data']='<label class="erreur">echec de modification information existante</label>';
				}
				else
				{
					$rep=$this->Superadmin_model->update_cycle($id,$new_cycle);
					if ($rep==true) 
					{
						$data['data']='<label class="success"> modifications effectuées avec succes</label>';
					}

				}
			
		}
		$this->load->view('superadmin/cycle',$data);
	}

	//SUPPRIMER UN CYCLE
	//public function delete_cycle()
	//{
		//$data['data']='';
		//$value=1;
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		//$id=$this->input->get(htmlentities('id'));
					//$rep=$this->Superadmin_model->delete_cycle($id,$value);
					//if ($rep==true) 
					//{
						//$data['data']='<label class="success"> suppressions effectuées avec succes</label>';
					//}
		//$this->load->view('superadmin/cycle',$data);
	//}




	//AFFICHE LA LISTE DES FILIERES
	public function filiere()
	{
		$data['data']='';
		$data['data_filiere']='';
		$this->load->view('superadmin/filiere',$data);
	}

	//MODIFIER UN FILIERE
	public function update_filiere()
	{
		$data['data']='';
		$data['data_filiere']='';
		$new_filiere=$this->input->post('new_filiere');
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->get(htmlentities('id'));

		$this->form_validation->set_rules('new_filiere','filiere','required',
			array
			('required'=>'<label class="erreur">Veillez renseignez la valeur du nouveau %s</label>'
			));
		if ($this->form_validation->run()) 
		{
			$req=$this
					  ->db
					  ->select('*')
					  ->from('filiere')
					  ->where('nom_filiere',$new_filiere)
					  ->get();
				if ($req->num_rows()>0) 
				{
					$data['data']='<label class="erreur">echec de modification information existante</label>';
				}
				else
				{
					$rep=$this->Superadmin_model->update_filiere($id,$new_filiere);
					if ($rep==true) 
					{
						$data['data']='<label class="success"> modifications effectuées avec succes</label>';
					}

				}
			
		}
		$this->load->view('superadmin/filiere',$data);
	}

	//SUPPRIMER UN FILIERE
	//public function delete_filiere()
	//{
		//$data['data']='';
		//$value=1;
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		//$id=$this->input->get(htmlentities('id'));
					//$rep=$this->Superadmin_model->delete_filiere($id,$value);
					//if ($rep==true) 
					//{
						//$data['data']='<label class="success"> suppressions effectuées avec succes</label>';
					//}
		//$this->load->view('superadmin/filiere',$data);
	//}


	//AFFICHE LA LISTE DES ANNEES ACADEMIQUES
	public function annee()
	{
		$this->load->view('superadmin/annee');
	}
}