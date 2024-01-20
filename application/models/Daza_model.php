<?php
class Daza_model extends CI_model
{

	//RECUPERE NOM DE L'ETABLISSEMENT DE LA TABLE COMPETITION-ETABLISSEMENT
	public function get_name_etablissement()
	{
	 	$this->db->select('*');
	 	$this->db->from('competition_etablissement');
	 	$this->db->join('etablissement','id_etablissement=id_etablissement');
	 	$req=$this->db->get();
	 	return $req->result_array();
	}


	//RECUPERE  L'ID DE L'ANNEE NON CLOTURÉ DE LA TABLE ANNÉE_ACADEMIQUE
	public function get_annee_encours()
	{
		$this->db->where('etat_annee',0);
			$result=$this->db->get('annee_academique');
			if ($result->num_rows()==1) 
			{
				return $result->row(0)->id_anneee;
			}
			else
			{
				return false;
			}
	}


	//RECUPERE LES NOMS DE COMPETITION(L'ID) D'UNE ANNEE NON CLOTURE
	public function get_competition_annee($recup_id_annee)
	{
		$query=$this
					->db
					->SELECT ('*')
					->FROM ('annee_competition')
					->WHERE ('annee_id',$recup_id_annee)
					//->join('competition','competition_id=id_competition')
					->get();
					return $query->result_array();
	}

	//RECUPERE LES ID DES COMPETITION D'UNE ANNEE QUELCONQUE
	public function get_all_competition_annee($id)
	{
		$query=$this
					->db
					->SELECT ('*')
					->FROM ('annee_competition')
					->WHERE ('annee_id',$id)
					//->join('competition','competition_id=id_competition')
					->get();
					return $query->result_array();
	}

	//POUR AFFICHER LE NOM ANNEE ET ETAT D'UNE COMPETITION
			public function get_nom_annnee_etat_comp($id_comp)
			{
				$this->db->select('*');
			 	$this->db->from('competition');
			 	$this->db->where('id_competition',$id_comp);
			 	$this->db->where('etat_competition',0);
			 	$req=$this->db->get();
			 	return $req->result_array();
			}
			//POUR AFFICHER LE NOM ANNEE ET ETAT D'UNE COMPETITION
			public function get_nom_annnee_etat_comp1($id_comp)
			{
				$this->db->select('*');
			 	$this->db->from('competition');
			 	$this->db->where('id_competition',$id_comp);
			 	$this->db->where('etat_competition',1);
			 	$req=$this->db->get();
			 	return $req->result_array();
			}
			//RECUPERE L'ID_PHASE DE LA TABLE DISCIPLINE_COMPETITION
			public function get_id_discipline_phase($id_discipline)
			{
				$this->db->select('*');
			 	$this->db->from('phase_discipline');
			 	$this->db->where('id_phase_discipline',$id_discipline);
			 	$this->db->join('phase','phase_id=id_phase');
			 	$req=$this->db->get();
			 	return $req->result_array();
			}
			//RECUPERE L'ID_RENCONTRE DE LA TABLE RENCONTRE
			public function get_id_phase_rencontre($id_phase_discipline)
			{
				$this->db->select('*');
			 	$this->db->from('rencontre');
			 	$this->db->where('phasedisciple_id',$id_phase_discipline);
			 	$this->db->join('occupation','occupation_id=id_occupation');
		 		$this->db->join('stade','stade_id=id_stade');
			 	$req=$this->db->get();
			 	return $req->result_array();
			}
			//RECUPERE LES EQUIPES 1 DE LA TABLE EQUIPE_RENCONTRE
			public function get_equipe_rencontre($id_rencontre)
			{
				$this->db->select('*');
			 	$this->db->from('equipe_rencontre');
			 	$this->db->where('rencontre_id',$id_rencontre);
			 	$this->db->where('etat_rencontre',1);
			 	$this->db->join('equipe','equipe.equipe_id=equipe_rencontre.equipe_id',);
			 	$req=$this->db->get();
			 	return $req->result_array();
			}
			//RECUPERE L'EQUIPE 2 ADVERSE DE LA TABLE EQUIPE_RENCONTRE
					public function get_equipe_adverse($equipe2)
					{
						$this->db->where('equipe_id',$equipe2);
							$result=$this->db->get('equipe');
							if ($result->num_rows()==1) 
							{
								return $result->row(0)->nom;
							}
							else
							{
								return false;
							}
					}

			//RECUPERE LES DICCIPLINE D'UNE COMPETITION D'UNE ANNEE
			public function get_discipline($id_comp)
			{
				$this->db->select('*');
			 	$this->db->from('competition_discipline');
			 	$this->db->where('id_compet',$id_comp);
			 	$this->db->join('discipline','competition_discipline.id_discipline = discipline.id_discipline');
			 	$req=$this->db->get();
			 	return $req->result_array();
			}

			// LÉTABLISSEMNET D'UNE COMPETITION D'UNE ANNEE DONNEE
			public function get_etablissement_competition_annee($id_comp)
			{
				$this->db->select('*');
			 	$this->db->from('competition_etablissement');
			 	$this->db->where('id_competition',$id_comp);
			 	$this->db->join('etablissement','id_etablissement=etablissement_id');
			 	$req=$this->db->get();
			 	return $req->result_array();
			}



	//GESTION DES STADES

		//INSERT TOUT LES STADES
		public function insert_stade($insert)
		{
			$this->db->insert('stade',$insert);
			return true;
		}

		//RECUPERE TOUS LES STADES
		public function get_stade()
		{
			$this->db->select('*');
			$this->db->from('stade');
			$this->db->where('etat_stade',0);
			$req=$this->db->get();
			return $req->result_array();
		}

		//MODIFIER UN STADE
		public function update_stade($id,$new_stade,$new_lieu)
		{
			$req=$this
					  ->db
					  ->SET('nom_stade',$new_stade)
					  ->SET('lieu_stade',$new_lieu)
					  ->where('id_stade',$id)
					  ->update('stade');
					  return true;
		}
			//SUPPRIMER UN STADE
		public function delete_stade($id,$value)
		{
			$req=$this
					  ->db
					  ->SET('etat_stade',$value)
					  ->where('id_stade',$id)
					  ->update('stade');
					  return true;
		}


	//TOUTE LES COMPETITIONS DE CHAQUE ANNEE

			//RECUPERE TOUTE LES ANNEES
			public function get_annee()
			{
				$query=$this->db->get('annee_academique');
				return $query->result_array();
			}

			//RECUPERE L'ID DE L'ANNEE
			public function get_id_annee($annee)
			{
				$this->db->where('annee',$annee);
					$result=$this->db->get('annee_academique');
					if ($result->num_rows()==1) 
					{
						return $result->row(0)->id_anneee;
					}
					else
					{
						return false;
					}
			}
			//INSERE L'ANNEE ENTRANT DANS LA TABLE ANNEE
			public function saveannee($annee_entrant,$id)
			{ 
				$req=$this
						  ->db
						  ->SET('etat_annee',1)
						  ->where('id_anneee',$id)
						  ->update('annee_academique');
				$this->db->insert('annee_academique',$annee_entrant);
				return true;
			}

			//MODIFIE UNE ANNEE
			public function update_annee($new_annee,$id)
			{
				$this
					 ->db
					 ->SET('annee',$new_annee)
					 ->where('id_anneee',$id)
					 ->update('annee_academique');
					 return true;
			}

	//RECUPERE TOUTE LES DEMANDES DE RENCONTRE D'UNE COMPETITION DE L'ANNEE ENCOURS

		//RECUPERE LES DEMANDES DE RENCONTRES D'UNE COMPETITION
		public function get_id_equipe_rencontre()
		{
			$this->db->select('*');
		 	$this->db->from('equipe_rencontre');
		 	$this->db->where('etat_rencontre',0);
		 	$this->db->join('equipe','equipe.equipe_id=equipe_rencontre.equipe_id',);
		 	//$this->db->join('equipe','equipe_id2=id_equipe');
		 	$this->db->join('rencontre','equipe_rencontre.rencontre_id = rencontre.id_rencontre');
		 	$this->db->join('occupation','rencontre.occupation_id = occupation.id_occupation');
		 	$this->db->join('stade','occupation.stade_id = stade.id_stade');
		 	$this->db->join('phase_discipline','rencontre.phasedisciple_id= phase_discipline.id_phase_discipline');
		 	$req=$this->db->get();
		 	return $req->result_array();
		}
		//RECUPERE L'ID_DISCIPLINE DE LA TABLE PHASE_DISCIPLINE
		public function get_id_discipline($id_phase_discipline)
		{
			$this->db->select('*');
		 	$this->db->from('phase_discipline');
		 	$this->db->where('id_phase_discipline',$id_phase_discipline);
		 	$this->db->join('discipline','discipline.id_discipline = phase_discipline.discipline_id');
		 	$this->db->join('phase','phase_id=id_phase');
		 	$req=$this->db->get();
		 	return $req->result_array();
		}
		//RECUPERE L'ID_COMPETITION DE LA TABLE COMPETITION_DISCIPLINE
		public function get_id_competition_discipline($id_discipline)
		{
			$this->db->select('*');
		 	$this->db->from('competition_discipline');
		 	$this->db->join('competition','id_compet=id_competition');
		 	$this->db->where('id_discipline',$id_discipline);
		 	$this->db->where('etat_competition',1);
		 	$req=$this->db->get();
		 	return $req->result_array();
		}
		//RECUPERE LE NOM DE L'ETABLISSEMENT
		public function get_id_etablissement($id_competition)
		{
			$this->db->select('*');
		 	$this->db->from('competition_etablissement');
		 	$this->db->where('id_competition',$id_competition);
		 	$this->db->join('etablissement','etablissement_id=id_etablissement');
		 	$req=$this->db->get();
		 	return $req->result_array();
		}
		//RECUPERE L'ID DE L'ANNÉE NON CLOTURÉ
		public function get_id_annee_no_close($id_competition)
		{
			$this->db->select('*');
		 	$this->db->from('annee_competition');
		 	$this->db->join('annee_academique','annee_id=id_anneee');
		 	$this->db->where('competition_id',$id_competition);
		 	$this->db->where('etat_annee',0);
		 	$req=$this->db->get();
		 	return $req->result_array();
		}


	//GESTIONS DES AUTORISATIONS D'UNE COMPETITIONS

		//AUTORISER UNE COMPETITION
		public function autorisation_competition_ok($id_competition)
		{
			$this
				 ->db
				 ->set('etat_competition',1)
				 ->where('id_competition',$id_competition)
				 ->update('competition');
				 return true;
		}
		//DECLINE UNE COMPETITION
		public function decliner_competition($id_competition,$comment)
		{
			$this
				 ->db
				 ->set('etat_competition',2)
				 ->set('commentaire_competition',$comment)
				 ->where('id_competition',$id_competition)
				 ->update('competition');
				 return true;
		}


	//GESTIONS DES AUTORISATIONS D'UNE RENCONTER

		//AUTORISER UNE RENCONTRE
		public function autorisation_rencontre_ok($id_equipe_rencontre)
		{
			$this
				 ->db
				 ->set('etat_rencontre',1)
				 ->where('id_equip_rencontre',$id_equipe_rencontre)
				 ->update('equipe_rencontre');
				 return true;
		}
		//DECLINER UNE RENCONTRE
		public function decline_rencontre($id_equipe_rencontre,$comment)
		{
			$this
				 ->db
				 ->set('etat_rencontre',2)
				 ->set('commentaire_rencontre',$comment)
				 ->where('id_equip_rencontre',$id_equipe_rencontre)
				 ->update('equipe_rencontre');
				 return true;
		}


		//GESTION DU CALENDRIER DES COMPETITIONS
	//RECUPERE LES DEMANDES DE RENCONTRES VALIDER D'UNE COMPETITION
		public function get_id_equipe_rencontre_ok()
		{
			$this->db->select('*');
		 	$this->db->from('equipe_rencontre');
		 	$this->db->where('etat_rencontre',1);
		 	$this->db->where('statut_rencontre',0);
		 	$this->db->join('equipe','equipe_rencontre.equipe_id=equipe.equipe_id',);
		 	//$this->db->join('equipe','equipe_id2=id_equipe');
		 	$this->db->join('rencontre','equipe_rencontre.rencontre_id=rencontre.id_rencontre');
		 	$this->db->order_by('date_rencontre','ASC');
		    	$this->db->join('occupation','occupation_id=id_occupation');
		 	$this->db->order_by('debut_occupation','ASC');
		 	$this->db->join('stade','stade_id=id_stade');
		 	$this->db->join('phase_discipline','phasedisciple_id=id_phase_discipline');
		 	$req=$this->db->get();
		 	return $req->result_array();
		}


	//GESTION DES OCCUPATIONS

		//RECUPERE L'ANNEE NON CLOTURÉ DE LA TABLE ANNÉE_ACADEMIQUE
			public function recupere_annee_encours()
			{
				$this->db->where('etat_annee',0);
					$result=$this->db->get('annee_academique');
					if ($result->num_rows()==1) 
					{
						return $result->row(0)->annee;
					}
					else
					{
						return false;
					}
			}
		//RECUPERE L'ID DE L'OCCUPATION
			public function get_id_heure_occupation($heure_debut,$heure_fin,$unique)
			{
				$this->db->where('debut_occupation',$heure_debut);
				$this->db->where('fin_occupation',$heure_fin);
				$this->db->where('uniq',$unique);
					$result=$this->db->get('occupation');
						return $result->row(0)->id_occupation;
			}
		//INSERTION MULTIPLE
			//INSERT DANS LA TABLE AUTRE
			public function insert_data($data1)
			{
				$this->db->insert('autre',$data1);
				return true;
			}
		//INSERT DANS LA TABLE OCCUPATION
			public function insert_occupation($data2)
			{
				$this->db->insert('occupation',$data2);
				return true;
			}
		//MODIFIE UNE OCCUPATION
			public function update_occupation($id,$heure_debut,$heure_fin,$id_stade)
			{
				$req=$this
					  ->db
					  ->SET('debut_occupation',$heure_debut)
					  ->SET('fin_occupation',$heure_fin)
					  ->SET('stade_id',$id_stade)
					  ->where('id_occupation',$id)
					  ->update('occupation');
					  return true;
			}
		//MODIFIE AUTRE
			public function update_autre($id,$event,$converdate)
			{
				$req=$this
					  ->db
					  ->SET('nom_autre',$event)
					  ->SET('date_autre',$converdate)
					  ->where('occupation_id',$id)
					  ->update('autre');
					  return true;
			}
			//SUPPRIME UNE OCCUPATION
			public function delete_occupation($id,$value)
		{
			$req=$this
					  ->db
					  ->SET('etat_autre',$value)
					  ->where('id_autre',$id)
					  ->update('autre');
					  return true;
		}
			//CLOTURE UNE OCCUPATION
			public function closed_occupation($id,$value)
		{
			$req=$this
					  ->db
					  ->SET('statut_autre',$value)
					  ->where('id_autre',$id)
					  ->update('autre');
					  return true;
		}

		//RECUPERE L'ID DU STADE CHOISI
			public function get_id_stade($stade,$lieu)
			{
				$this->db->where('nom_stade',$stade);
				$this->db->where('lieu_stade',$lieu);
					$result=$this->db->get('stade');
					if ($result->num_rows()==1) 
					{
						return $result->row(0)->id_stade;
					}
					else
					{
						return false;
					}
			}
		//RECUPERE L'ID DE LA DATE;
			public function get_id_annee2($annee)
			{
				$this->db->where('annee',$annee);
					$result=$this->db->get('annee_academique');
					if ($result->num_rows()==1) 
					{
						return $result->row(0)->id_anneee;
					}
					else
					{
						return false;
					}
			}
	    //RECUPERE L'ID DE L'AUTRE
			public function get_id_autre($event,$converdate)
			{
				$this->db->where('nom_autre',$event);
				$this->db->where('date_autre',$converdate);
					$result=$this->db->get('autre');
					if ($result->num_rows()==1) 
					{
						return $result->row(0)->id_autre;
					}
					else
					{
						return false;
					}
			}
		//INSERTION MULTIPLE ID
			public function insert_id($insert2)
			{
				$this->db->insert('annee_autre',$insert2);
				return true;
			}


	//AFFICHAGE DES AUTRES EVENEMENT
		//RECUPERE L'ID_AUTRE DE LA TABLE ANNEE_AUTRE D'UNE ANNEE ENCOURS
			public function get_id_autre_annee($recup_annee)
			{
				$req=$this
					 ->db
					 ->select("*")
					 ->from("annee_autre")
					 ->where("annee_id",$recup_annee)
					 ->join("autre","autre_id=id_autre")
					 ->where("etat_autre",0)
					 ->order_by('date_autre','ASC')
					 ->join("occupation","occupation_id=id_occupation")
					 ->order_by('debut_occupation','ASC')
					 ->join("stade","stade_id=id_stade")
					 ->get();
				return $req->result_array();
			}
				//RECUPERE L'ID_AUTRE DE LA TABLE ANNEE_AUTRE DE TOUTES LES ANNEES
			public function get_all_autre($id)
			{
				$req=$this
					 ->db
					 ->select("*")
					 ->from("annee_autre")
					 ->where("annee_id",$id)
					 ->join("autre","autre_id=id_autre")
					 ->where("etat_autre",0)
					 ->join("occupation","occupation_id=id_occupation")
					 ->join("stade","stade_id=id_stade")
					 ->get();
				return $req->result_array();
			}

	//CALENDRIER DES RENCONTRE 
		public function calender_occupation()
		{
			$this->db->select('*');
		 	$this->db->from('equipe_rencontre');
		 	$this->db->where('etat_rencontre',1);
		 	$this->db->join('equipe','equipe.equipe_id = equipe_rencontre.equipe_id',);
		 	//$this->db->join('equipe','equipe_id2=id_equipe');
		 	$this->db->join('rencontre','rencontre_id=id_rencontre');
		 	$this->db->join('occupation','occupation_id=id_occupation');
		 	$this->db->join('stade','stade_id=id_stade');
		 	$this->db->join('phase_discipline','phasedisciple_id=id_phase_discipline');
		 	$req=$this->db->get();
		 	return $req->result_array();
		}
	//CALENDRIER DES OCCUPATIONS
	public function calender_occup()
			{
				$req=$this
					 ->db
					 ->select("*")
					 ->from("annee_autre")
					 ->join("autre","autre_id=id_autre")
					 ->where("etat_autre",0)
					 ->join("occupation","occupation_id=id_occupation")
					 ->order_by('debut_occupation','ASC')
					 ->join("stade","stade_id=id_stade")
					 ->get();
				return $req->result_array();
			}
			//CALENDRIER DES OCCUPATIONS
			public function get_competition_etab()
			{
				$req=$this
					 ->db
					 ->select("*")
					 ->from("competition_etablissement")
					 ->join("competition","competition_etablissement.id_competition=competition.id_competition")
					 ->where("etat_competition",1)
					 ->join("etablissement","etablissement_id=id_etablissement")
					 ->get();
				return $req->result_array();
			}	
	//REPORTER UNE RENCONTRE
		public function reporter_rencontre($id_equipe_rencontre,$comment)
		{
			$this
				 ->db
				 ->set('etat_rencontre',2)
				 ->set('commentaire_rencontre',$comment)
				 ->where('id_equip_rencontre',$id_equipe_rencontre)
				 ->update('equipe_rencontre');
				 return true;
		}	

}
?>