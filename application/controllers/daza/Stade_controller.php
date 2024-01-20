<?php
class Stade_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
		$this -> load -> library ( 'form_validation' );
	}

	//INSERTION ET RECUPERATION D'UN STADE
	public function stade()
	{
		//INSERER UN STADE
		$data['data']='';
		$this->form_validation->set_rules('stade','stade','required',
			array
			('required'=>'<label class="erreur">Veillez renseignez le champs %s</label>'
			));
		$this->form_validation->set_rules('lieu','lieu','required',
			array
			('required'=>'<label class="erreur">Veillez renseignez le %s du stade</label>'
			));
			if ($this->form_validation->run()) 
			{
				$stade=$this->input->post('stade');
				$lieu=$this->input->post('lieu');
				$req=$this
					 	  ->db
					 	  ->select('*')
					 	  ->from('stade')
					 	  ->where('nom_stade',$stade)
					 	  ->where('lieu_stade',$lieu)
					 	  ->get();
				if ($req->num_rows()>0) 
				{
					$data['data']='<label class="erreur">echec enregistrement information existante</label>';
				}
				else
				{
					$insert['nom_stade']=$stade;
					$insert['lieu_stade']=$lieu;
					$rep=$this->Daza_model->insert_stade($insert);
					if ($rep==true) 
					{
						$data['data']='<label class="success"> enregistrement effectué avec succes</label>';
					}
				}
			}
		//RECUPERE LES DONNEES DE LA TABLE STADE
		$data['result']=$this->Daza_model->get_stade();
		$this->load->view('daza/stade',$data);
	}

	//MODIFIER UN STADE
	public function update_stade()
	{
		$data['data']='';
		$new_stade=$this->input->post('new_stade');
		$new_lieu=$this->input->post('new_lieu');
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->get('id');

		$this->form_validation->set_rules('new_stade','stade','required',
			array
			('required'=>'<label class="erreur">Veillez renseignez la valeur du nouveau %s</label>'
			));
		$this->form_validation->set_rules('new_lieu','lieu','required',
			array
			('required'=>'<label class="erreur">Veillez renseignez la valeur du nouveau %s du stade</label>'
			));
		if ($this->form_validation->run()) 
		{
			$req=$this
					  ->db
					  ->select('*')
					  ->from('stade')
					  ->where('nom_stade',$new_stade)
					  ->where('lieu_stade',$new_lieu)
					  ->get();
				if ($req->num_rows()>0) 
				{
					$data['data']='<label class="erreur">echec de modification information existante</label>';
				}
				else
				{
					$rep=$this->Daza_model->update_stade($id,$new_stade,$new_lieu);
					if ($rep==true) 
					{
						$data['data']='<label class="success"> modifications effectuées avec succes</label>';
					}

				}
			
		}
		//RECUPERE LES DONNEES DE LA TABLE STADE
		$data['result']=$this->Daza_model->get_stade();
		$this->load->view('daza/stade',$data);
	}

	//SUPPRIMER UN STADE
	public function delete_stade()
	{
		$data['data']='';
		$value=1;
		//RECUPERE LA VALEUR DE L'ID PASSE EN PARAMETRE
		$id=$this->input->post(htmlentities('id'));
					$rep=$this->Daza_model->delete_stade($id,$value);
					if ($rep==true) 
					{
						$data['data']='<label class="erreur"> suppressions effectuées avec succes</label>';
					}
		//RECUPERE LES DONNEES DE LA TABLE STADE
		$data['result']=$this->Daza_model->get_stade();
		$this->load->view('daza/stade',$data);
	}
}
?>