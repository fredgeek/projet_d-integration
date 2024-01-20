<?php
class Supermodel extends CI_Model
{
	#INSERE LE NOM ET CONTACT SE L'ETABLISSEMENT(etablissement_controller)
	public function savenom($data)
	{
		$this->db->insert('etablissement',$data);
		return true;
	}

	#RECUPERE LES DONNEES DE LA TABLE ETABLISSEMENT ET L'AFFECTE DANS LE VIEW(etablissement)
	public function recupere_etablissement()
	{
		$query=$this->db->get('etablissement');
		return $query->result();
	}
		public function recuperedata()
	{
		$query=$this->db->get('filiere_niveau');
		return $query->result();
	}

	#INSERE LES DONNEES DANS LA TABLE CYCLE ET ETABLISSEMENT_CYCLE
	public function savecycle($cycle1,$cycle2,$cycle3)
	{
		#INSERER DANS LA TABLE CYCLE
		$this->db->insert('cycle',$cycle1);
		$this->db->insert('cycle',$cycle2);
		$this->db->insert('cycle',$cycle3);
		#INSERER DANS LA TABLE ETABLISSEMENT_CYCLE
		//$this->db->insert('etablissement_cycle',$data1);
		//$this->db->insert('etablissement_cycle',$data2);
		//$this->db->insert('etablissement_cycle',$data3);
		//$this->db->insert('etablissement_cycle',$data4);
		return true;
	}
	public function savefiliere($filiere1,$filiere2,$filiere3)
	{
		$this->db->insert('filiere',$filiere1);
		$this->db->insert('filiere',$filiere2);
		$this->db->insert('filiere',$filiere3);
	}

	#RECUPERE LES DONNEES DE LA TABLE CYCLE ET L'AFFECTE DANS LE VIEW(cycle)
	public function recuperecycle()
	{
		$query=$this->db->get('cycle');
		return $query->result();
	}
		public function recuperefiliere()
	{
		$query=$this->db->get('filiere');
		return $query->result();
	}

	public function filiere_niveau($filiere,$cyfi,$niveau,$data)
	{
		$this->db->insert('filiere',$filiere);
		$this->db->insert('cycle_filiere',$cyfi);
		$this->db->insert('niveau',$niveau);
		$this->db->insert('filiere_niveau',$data);
		return true;
	}
}
?>