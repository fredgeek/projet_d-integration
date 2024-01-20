<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Player_model','player');
		$this->load->model('Respoclasse_model');
	}


	public function ajax_list()
	{
        $val=$_POST['val'];
		$list = $this->player->get_datatables($val);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $player) {
			$no++;
			$row = array();
            $row[] = $no;
			$row[] = $player->matricule;
            $row[] = $player->nom;
            $row[] = $player->prenom;
			$row[] = $player->Genre_discipline;
			$row[] = $player->contact;
            $row[] = $player->email;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-outline-info" href="javascript:void(0)" title="Edit" onclick="edit_player('."'".$player->id."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn btn-sm btn-outline-danger" href="javascript:void(0)" title="Hapus" onclick="delete_player('."'".$player->id."'".')"><i class="fas fa-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->player->count_all(),
						"recordsFiltered" => $this->player->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->player->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		if( $this->Respoclasse_model->matricule_existant(strtoupper($this->input->post('matricule')),$this->Respoclasse_model->annee() )){
                                    
			/// LOL 
			
		}else{
		$data = array(
                'matricule' => strtoupper($this->input->post('matricule')),
				'nom' => ucfirst($this->input->post('nom')),
				'prenom' => ucfirst($this->input->post('prenom')),
                'matricule_respo' => strtoupper($this->input->post('val')),
				'Genre_discipline' => ucfirst($this->input->post('genre')),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
				'annee_academique'  =>  $this->Respoclasse_model->annee()
				
			);
		$insert = $this->player->save($data);
		echo json_encode(array("status" => TRUE));
	  }
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
            'matricule' => strtoupper($this->input->post('matricule')),
				'nom' => ucfirst($this->input->post('nom')),
				'prenom' => ucfirst($this->input->post('prenom')),
				'Genre_discipline' => ucfirst($this->input->post('genre')),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
			);
		$this->player->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->player->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('matricule') == '')
		{
			$data['inputerror'][] = 'matricule';
			$data['error_string'][] = 'le matricule est requis';
			$data['status'] = FALSE;
		}

		if($this->input->post('nom') == '')
		{
			$data['inputerror'][] = 'nom';
			$data['error_string'][] = 'Le nom  est requis';
			$data['status'] = FALSE;
		}

		if($this->input->post('genre') == '')
		{
			$data['inputerror'][] = 'genre';
			$data['error_string'][] = ' le genre est requis';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
