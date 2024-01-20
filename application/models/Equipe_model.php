<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipe_model extends CI_Model {

	var $table = 'equipe';
	var $column_order = array('nom','discipline','genre','matricule_responsable',null); //set column field database for datatable orderable
	var $column_search = array('nom','discipline','genre','matricule_responsable',); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('equipe_id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query() 
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($genre,$disc,$etab)
	{
		$this->_get_datatables_query();
		$this->db->where('genre',$genre);
		$this->db->where('discipline',$disc);
		$this->db->where('id_etab',$etab);
		
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('equipe_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function add_equipe($data)
	{
      $this->db->insert('poule_equipe',$data);  
      return $this->db->insert_id();
	}
	public function equipe_exist($id,$data1)
	{
		$query=$this->db->get_where('poule_equipe',array('id_poule'=> $data1,'id_equipe'=>$id));
		
	   if(empty($query->row())) {
			   return true;
	   } else {
			   return false;
	   }

	}
	public function nombre_equipe($id)
	{
		$this->db->from('poule_equipe');
		$this -> db -> where ( 'id_poule',$id ); 
		return $this->db->count_all_results();

	}
	 public function   cross_join($data2,$data1){
		$query=$this->db->get_where('poule_equipe',array('phase'=> $data2,'id_equipe'=>$data1));
		
		if(empty($query->row())) {
				return true;
		} else {
				return false;
		}
      }
	public function recup_phase($data)
	{

		$this->db->where('id_phase',$data);
                        
		$result=$this->db->get('phase'); 
	  
	  
		if($result->num_rows()==1)           
	
		{
				return $result->row(0)->nom_phase;
		} else{
				 return false;
		}

	}
	public function get_compet($data)
	{

		$this->db->where('id',$data);
                        
		$result=$this->db->get('poule'); 
	  
	  
		if($result->num_rows()==1)           
	
		{
				return $result->row(0)->competition_id;
		} else{
				 return false;
		}

	}

  public function get_genre($data)
	{

		$this->db->where('id_competition',$data);
                        
		$result=$this->db->get('competition'); 
	  
	  
		if($result->num_rows()==1)           
	
		{
				return $result->row(0)->type_competition;
		} else{
				 return false;
		}

	}
	public function get_discipline($data)
	{

		$this->db->select('*');
		$this->db->from('discipline as d');
		$this->db->join('competition_discipline as c', 'c.id_discipline= d.id_discipline','inner'); 
		$this->db->where('id_compet',$data);             
		$result=$this->db->get(); 
	  
		if($result->num_rows()==1)           
	
		{
				return $result->row(0)->nom_discipline;
		} else{
				 return false;
		}

	}
	public function get_etab($data)
	{

		$this->db->select('*');
		$this->db->from('etablissement as e');
		$this->db->join('competition_etablissement as c ','c.etablissement_id= e.id_etablissement','inner');
		$this->db->where('id_competition',$data);             
		$result=$this->db->get(); 
	  
	  
		if($result->num_rows()==1)           
	
		{
				return $result->row(0)->id_etablissement;
		} else{
				 return false;
		}

	}



}
