<?php
defined('BASEPATH') OR exit('No direct script access allowed');   

                              
class Phase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Phase_model','phase');
		$this->load->model('Respocompet_model');
		$this -> load -> helper ( 'form' );
	}


                              ///////////////////////////////////////////////////////////////////////////////////
                              /////////                 CONFIGURATION DES PHASES AVEC AJAX           ////////////
                              ///////////////////////////////////////////////////////////////////////////////////


	public function index()
	{
		
		$this->load->helper('url');
		$this->load->view('respocompet/formphase');
	}

	public function ajax_list($var)
	{    ;
    $list = $this->phase->get_datatables($var);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $phase) {
			$no++;
			$row = array();
			$row[] = $phase->nom_phase;
			$date = new DateTime( $phase->date_debut);
                   
			$row[] = $date->format("d-M-Y");
			//add html for action
			$row[] = '<a class="btn btn-outline-info btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_phase('."'".$phase->id_phase."'".')"><i class="fas fa-edit"></i></a>
				  <a class="btn btn-outline-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_phase('."'".$phase->id_phase."'".')"><i class="fas fa-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->phase->count_all(),
						"recordsFiltered" => $this->phase->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->phase->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
            'nom_phase' => $this->input->post('nom_phase'),
            'date_debut' => $this->input->post('date_debut'),
			'compet_id' => $this->input->post('compet_id'),
				//'dob' => $this->input->post('dob'),
			);
			$nom_phase = $this->input->post('nom_phase');
		    $phase_debut= $this->input->post('date_debut');
			$compet_id  = $this->input->post('compet_id');
			$dat1 = $this->input->post('discipline_id');
			$dat2 = $this->input->post('compet_id');
			
		$this->phase->save($data);
		$dat = $this->Respocompet_model->recup_idphase( $nom_phase, $phase_debut,$compet_id);
		$insert = $this->Respocompet_model->insert_phase_discipline( $dat,$dat1,$dat2);
	
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'nom_phase' => $this->input->post('nom_phase'),
				'date_debut' => $this->input->post('date_debut'),
				//'dob' => $this->input->post('dob'),
			);
		$this->phase->update(array('id_phase' => $this->input->post('id_phase')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->phase->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nom_phase') == '')
		{
			$data['inputerror'][] = 'nom_phase';
			$data['error_string'][] = 'le nom de la phase est requis';
			$data['status'] = FALSE;
		}

		if($this->input->post('date_debut') == '')
		{
			$data['inputerror'][] = 'date_debut';
			$data['error_string'][] = ' associer une date';
			$data['status'] = FALSE;
		}


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
