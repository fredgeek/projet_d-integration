<?php 
class Superadmin_model extends CI_Model
{
	//INSERER UN PARCOURS
	public function recupereparcours($insere)
	{
		$this->db->insert('parcours',$insere);
		return true;
	}


	//INSERE ETABLISSEMENT
	public function save_etablissement($etab)
	{
		$this->db->insert('etablissement',$etab);
		return true;
	}


	//RECUPERE ID DE L ETABLISSEMNENT
	public function recupere_id_etab($etab)
	{
		$this->db->where('sigle',$etab);
		$result=$this->db->get('etablissement');
		if ($result->num_rows()==1) 
		{
			return $result->row(0)->id_etablissement;
		}
		else
		{
			return false;
		}
	}


	//RECUPERE ID DU CYCLE
	public function recupere_id_cycle($cycle)
	{
		$this->db->where('nom_cycle',$cycle);
		$result=$this->db->get('cycle');
		if ($result->num_rows()==1) 
		{
			return $result->row(0)->id_cycle;
		}
		else
		{
			return false;
		}
	}


	//RECUPERE ID DE LA FILIERE
	public function recupere_id_filiere($filiere)
	{
		$this->db->where('nom_filiere',$filiere);
		$result=$this->db->get('filiere');
		if ($result->num_rows()==1) 
		{
			return $result->row(0)->id_filiere;
		}
		else
		{
			return false;
		}
	}


	//RECUPERE ID DU NIVEAU
	public function recupere_id_niveau($niveau)
	{
		$this->db->where('nom_niveau',$niveau);
		$result=$this->db->get('niveau');
		if ($result->num_rows()==1) 
		{
			return $result->row(0)->id_niveau;
		}
		else
		{
			return false;
		}
	}


	//RECUPERE LE NOM ETABLISSEMENT A PARTIR DE L'ID ETABLISSEMENT
	public function get_etablissement()
	{
		$this->db->select('*');
		$this->db->from('parcours');
		$this->db->where('etat_parcours',0);
		$this->db->join('etablissement','id_nom_etablissement=id_etablissement');
		$this->db->join('cycle','id_cycle_parcours=id_cycle');
		$this->db->join('filiere','id_filiere_parcours=id_filiere');
		$this->db->join('niveau','id_niveau_parcours=id_niveau');
		$this->db->order_by('id_parcours','DESC');
		$result=$this->db->get();
		return $result->result_array();
	}


    //INSERE CYCLE1 DANS LA TABLE CYCLE
    public function savecycle1($cycle1)
    {
    	$this->db->insert('cycle',$cycle1);
    	return true;
    }


	//INSERE LES DONNEES DANS LA TABLE CYCLE
	public function savecycle($cycle1,$cycle2)
	{

		$this->db->insert('cycle',$cycle1);
		$this->db->insert('cycle',$cycle2);
		return true;
	}


	//INSERE FILIERE1 DANS LA TABLE FILIERE
    public function savefiliere1($filiere1)
    {
    	$this->db->insert('filiere',$filiere1);
    	return true;
    }


	//INSERE LES DONNEES DANS LA TABLE FILIERE
	public function savefiliere($filiere1,$filiere2)
	{

		$this->db->insert('filiere',$filiere1);
		$this->db->insert('filiere',$filiere2);
		return true;
	}

	//RECUPERE ID DU NEW_ETABLISSEMENT
	public function recupere_id_new_etab($new_etablissement)
	{
		$this->db->where('nom_etablissement',$new_etablissement);
		$result=$this->db->get('etablissement');
		if ($result->num_rows()==1) 
		{
			return $result->row(0)->id_etablissement;
		}
		else
		{
			return false;
		}
	}
		//RECUPERE ID DU NEW_CYCLE
	public function recupere_id_new_cycle($new_cycle)
	{
		$this->db->where('nom_cycle',$new_cycle);
		$result=$this->db->get('cycle');
		if ($result->num_rows()==1) 
		{
			return $result->row(0)->id_cycle;
		}
		else
		{
			return false;
		}
	}
		//RECUPERE ID DU NEW_FILIERE
	public function recupere_id_new_filiere($new_filiere)
	{
		$this->db->where('nom_filiere',$new_filiere);
		$result=$this->db->get('filiere');
		if ($result->num_rows()==1) 
		{
			return $result->row(0)->id_filiere;
		}
		else
		{
			return false;
		}
	}

		//RECUPERE ID DU NEW_NIVEAU
	public function recupere_id_new_niveau($new_niveau)
	{
		$this->db->where('nom_niveau',$new_niveau);
		$result=$this->db->get('niveau');
		if ($result->num_rows()==1) 
		{
			return $result->row(0)->id_niveau;
		}
		else
		{
			return false;
		}
	}

	//MODIFICATION PARCOURS
	public function update_parcours($id,$recup_new_etab,$recup_new_cycle,$recup_new_filiere,$recup_new_niveau)
	{
		$req=$this
				  ->db
				  ->SET('id_nom_etablissement',$recup_new_etab)
				  ->SET('id_cycle_parcours',$recup_new_cycle)
				  ->SET('id_filiere_parcours',$recup_new_filiere)
				  ->SET('id_niveau_parcours',$recup_new_niveau)
				  ->where('id_parcours',$id)
				  ->update('parcours');
				  return true;
	}



	//SUPPRIME PARCOURS
	public function delete_parcours($id,$value)
	{
		$req=$this
				  ->db
				  ->SET('etat_parcours',$value)
				  ->where('id_parcours',$id)
				  ->update('parcours');
				  return true;
	}
	//MODIFIER UN ETABLISSEMENT
	public function update_etablissement($id,$new_etab,$new_name,$new_contact)
	{
		$req=$this
				  ->db
				  ->SET('nom_etablissement',$new_etab)
				  ->SET('sigle',$new_name)
				  ->SET('contact_etablissement',$new_contact)
				  ->where('id_etablissement',$id)
				  ->update('etablissement');
				  return true;
	}
		//SUPPRIMER UN ETABLISSEMENT
	//public function delete_etablissement($id,$value)
	//{
		//$req=$this
				  //->db
				  //->SET('etat_etablissement',$value)
				  //->where('id_etablissement',$id)
				 // ->update('etablissement');
				  //return true;
	//}
		//MODIFIER UN CYCLE
	public function update_cycle($id,$new_cycle)
	{
		$req=$this
				  ->db
				  ->SET('nom_cycle',$new_cycle)
				  ->where('id_cycle',$id)
				  ->update('cycle');
				  return true;
	}
		//SUPPRIMER UN CYCLE
	//public function delete_cycle($id,$value)
	//{
		//$req=$this
				  //->db
				  //->SET('etat_cycle',$value)
				  //->where('id_cycle',$id)
				  //->update('cycle');
				//  return true;}
			//MODIFIER UNE FILIERE
	public function update_filiere($id,$new_filiere)
	{
		$req=$this
				  ->db
				  ->SET('nom_filiere',$new_filiere)
				  ->where('id_filiere',$id)
				  ->update('filiere');
				  return true;
	}
		//SUPPRIMER UNE FILIERE
	//public function delete_filiere($id,$value)
	//{
		//$req=$this
				  //->db
				  //->SET('etat_filiere',$value)
				  //->where('id_filiere',$id)
				  //->update('filiere');
				  //return true;}

	//GESTION DES COMPTES
	//RECUPERE TOUT LES COMPTES 
	public function get_compte()
	{
		$all=$this->db->get('utilisateur');
		return $all->result_array();
	}
	//INSERE UN COMPTE
	public function insere_compte($insere)
	{
		$this->db->insert('utilisateur',$insere);
		return true;
	}
	//MODIFIE UN COMPTE
	public function update_new_compte($username,$role,$id)
	{
		$this
			->db
			->set('username',$username)
			->set('role',$role)
			->where('id',$id)
			->update('utilisateur');
			return true;
	}
}
?>