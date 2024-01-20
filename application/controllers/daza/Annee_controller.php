<?php 
class Annee_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Daza_model');
	}
	//CHARGE LA VUE;
	public function annee_academique()
	{
		$this -> load -> library ( 'form_validation' );
		$data['data_annee']='';
		//RECUPERE LES ANNEES ACADEMIQUES
		$data['result']=$this->daza_model->get_annee();
		$this->load->view('daza/annee_academique',$data);
	}
		//INSERE DANS LA TABLE ANNEE
	public function insert_annee()
	{
		$this -> load -> library ( 'form_validation' );
		$data['data_annee']='';
		$id=$this->input->get(htmlentities('id'));
		$annee=$this->input->post('annee_entrant');
		$this->form_validation->set_rules('annee_entrant','annee entrant','required|exact_length[9]',array(
			'exact_length'=>'<label class="erreur">le champ %s doit respecter le format "2021/2022"</label>',
				'required'=>'<label class="erreur">veillez saisir l\'%s</hlabel>'));
		if($this->form_validation->run())
		{
			//VERIFIE SI L'ANNEE PRECCEDENT A DEJA ETE CLOTURE
			$query=$this
					   ->db
					   ->SELECT ('*')
					   ->FROM ('annee_academique')
						->WHERE ('annee',$annee)
						->get();
			if ($query->num_rows()> 0)
		  	{
		  		$data['data_annee']='<label class="erreur"><i>echec enregistrement annee academique existant</i></label>';
		  		//VERIFIE SI L'ANNEE1 EXISTE DEJA DANS LA TABLE ANNEE
			}
			else
			{
				//INSERE ANNEE ENTRANT DANS LA TABLE ANNEE_ACADEMIQUE
				$annee_entrant['annee']=$this->input->post('annee_entrant');
				$rep=$this->daza_model->saveannee($annee_entrant,$id);
				if ($rep==true) 
				{
					$data['data_annee']='<label class="success"><i>Année académique cloturée avec success</i></label>';
				}	
		  	}
		}
		$data['result']=$this->daza_model->get_annee();
		$this->load->view('daza/annee_academique',$data);
	}

	//MODIFIER UNE ANNEE ACADEMIQUE ENCOURS
	public function update_annee()
	{
		$this -> load -> library ( 'form_validation' );
		$data['data_annee']='';
		$id=$this->input->get(htmlentities('id'));
		$new_annee=$this->input->post('new_annee');
		$this->form_validation->set_rules('new_annee','annee','required|exact_length[9]',array(
			'exact_length'=>'<label class="erreur">le champ %s doit respecter le format "2021/2022"</label>',
				'required'=>'<label class="erreur">veillez saisir l\' %s</label>'));
		if($this->form_validation->run())
		{
			//VERIFIE SI L'ANNEE PRECCEDENT A DEJA ETE CLOTURE
			$query=$this
					   ->db
					   ->SELECT ('*')
					   ->FROM ('annee_academique')
						->WHERE ('annee',$new_annee)
						->get();
			if ($query->num_rows()> 0)
		  	{
		  		$data['data_annee']='<label class="erreur"><i>echec de modification annee academique existant</i></label>';
		  		//VERIFIE SI L'ANNEE1 EXISTE DEJA DANS LA TABLE ANNEE
			}
			else
			{
				//MODIFIE l'ANNEE ENCOURS DANS LA TABLE ANNEE_ACADEMIQUE
				$rep=$this->daza_model->update_annee($new_annee,$id);
				if ($rep==true) 
				{
					$data['data_annee']='<label class="success"><i>Modification effectué avec succes</i></label>';
				}	
		  	}
		}
		$data['result']=$this->daza_model->get_annee();
		$this->load->view('daza/annee_academique',$data);
	}
}
?>