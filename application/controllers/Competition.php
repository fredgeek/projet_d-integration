<?php
defined('BASEPATH') OR exit('No direct script access allowed');   

                              
class Competition extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Competition_model','competition');
		$this->load->model('Respocompet_model');
		$this -> load -> helper ( 'form' );
	}


                              ///////////////////////////////////////////////////////////////////////////////////
                              /////////                           ////////////
                              ///////////////////////////////////////////////////////////////////////////////////


	
	public function ajax_list()
	{  
	    $val=$_POST['val'];
		$list = $this->competition->get_datatables($val);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $competition) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $competition->nom;
			$row[] = $competition->date_debut;
            $row[] = $competition->date_fin;
            $row[] = $competition->type_competition;
			//add html for action
			$row[] = '<a class="btn btn-outline-info btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_phase('."'".$competition->id_competition."'".')"><i class="fas fa-edit"></i></a>
				  <a  class="btn btn-outline-danger btn-sm" href="javascript:void(0)" title="supprimer" onclick="delete_phase('."'".$competition->id_competition."'".')"><i class="fas fa-trash"></i></a>';
	
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->competition->count_all(),
						"recordsFiltered" => $this->competition->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->competition->get_by_id($id);
		echo json_encode($data);
	}

	
	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'nom' => $this->input->post('nom'),
				'date_debut' => $this->input->post('date_debut'),
                'date_fin' => $this->input->post('date_fin'),
                //'type_competition' => $this->input->post('genre'),

				//'dob' => $this->input->post('dob'),
			);
		$this->competition->update(array('id_competition' => $this->input->post('id_competition')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->competition->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nom') == '')
		{
			$data['inputerror'][] = 'nom';
			$data['error_string'][] = 'le nom de la competition est requis';
			$data['status'] = FALSE;
		}

		if($this->input->post('date_debut') == '')
		{
			$data['inputerror'][] = 'date_debut';
			$data['error_string'][] = ' associer une date';
			$data['status'] = FALSE;
		}
        if($this->input->post('date_fin') == '')
		{
			$data['inputerror'][] = 'date_fin';
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
