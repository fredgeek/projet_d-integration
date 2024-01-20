<?php
class Principal_model extends CI_Model {

    public function __construct()
                 {
                         $this->load->database();//chargement de la bd  
                 }   


                 public  function  get_pub () //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'news' ); 
                        $this->db ->order_by('news.post','DESC');
                        $this->db->limit(4);
                        $this ->db -> join( 'categorie','categorie.id = news.categorie_id' ); // jointure
                      //  $this ->db -> join( 'utilisateur ','news.user_id = utilisateur.id' ); 
                        $query  =  $this -> db -> get ( 'news' ); 
                        return  $query -> result_array (); 
                      
                 }
                 public  function  get_compet () //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'competition' ); 
                        $this->db ->order_by('competition.date_debut','DESC');
                        $this->db->limit(4);
                        $this ->db -> join( 'competition_etablissement as c','c.id_competition = competition.id_competition' ); // jointure
                        $this ->db -> join( 'etablissement','etablissement_id = id_etablissement' );
                        $this ->db -> join( 'competition_discipline as co','co.id_compet = competition.id_competition' );
                        $this ->db -> join( 'discipline','co.id_discipline = discipline.id_discipline' ); 
                        $query  =  $this -> db -> get ( 'competition' ); 
                        return  $query -> result_array (); 
                      
                 }
                 public  function  get_rencontre () //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'rencontre' ); 
                        $this->db ->order_by('rencontre.date_rencontre','DESC');
                        $this->db->limit(10);
                        $this ->db -> join( 'equipe_rencontre as r','r.rencontre_id = rencontre.id_rencontre' ); // jointure
                        $this ->db -> join( 'phase_discipline','id_phase_discipline = phasedisciple_id' );
                        $this ->db -> join( 'phase','id_phase = phase_id' );
                        $this ->db -> join( 'competition as ce','phase_discipline.id_compet = ce.id_competition' );
                        $this ->db -> join( 'competition_etablissement as c','c.id_competition = ce.id_competition' );
                        $this ->db -> join( 'etablissement','etablissement_id = id_etablissement' );
                        $this ->db -> join( 'occupation','rencontre.occupation_id = occupation.id_occupation' );
                        $this ->db -> join( 'stade','stade_id = id_stade' );
                        $this -> db -> where ( 'etat_rencontre',1);
                        $query  =  $this -> db -> get ( 'rencontre' ); 
                        return  $query -> result_array (); 
                      
                 } 
                 public  function  get_equipe () //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'equipe' ); 
                      
                        $this->db->limit(50);
                        $this ->db -> join( 'parcours','parcours_id = id_parcours' ); // jointure
                        $this ->db -> join( 'etablissement','id_nom_etablissement = id_etablissement' );
                        $this ->db -> join( 'cycle','id_cycle = id_cycle_parcours' );
                        $this ->db -> join( 'filiere','id_filiere = id_filiere_parcours' );
                        $this ->db -> join( 'niveau','id_niveau = id_niveau_parcours' );
                        $query  =  $this -> db -> get ( 'equipe' ); 
                        return  $query -> result_array (); 
                      
                 } 
                 public  function  equipe () //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'equipe' ); 
                      
                        
                        $this ->db -> join( 'parcours','parcours_id = id_parcours' ); // jointure
                        $this ->db -> join( 'etablissement','id_nom_etablissement = id_etablissement' );
                        $this ->db -> join( 'cycle','id_cycle = id_cycle_parcours' );
                        $this ->db -> join( 'filiere','id_filiere = id_filiere_parcours' );
                        $this ->db -> join( 'niveau','id_niveau = id_niveau_parcours' );
                        $query  =  $this -> db -> get ( 'equipe' ); 
                        return  $query -> result_array (); 
                      
                 } 
                 public  function  get_stade () //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'stade' ); 
                     //   $this->db ->order_by('id_stade','DESC');
                        $this->db->limit(10);
                      
                        return  $query -> result_array (); 
                      
                 }
               
               

                 public  function  get_publication ( $id ) 
                 { // 
                        
         
                       $this -> db -> get_where ( 'news' ,  array ( 'id'  =>  $id )); 
                       $this ->db -> join( 'categorie','categorie.id = news.categorie_id' ); // jointure
                      $this ->db -> join( 'utilisateur ','news.user_id = utilisateur.id' );         
                       $query = $this-> db-> get('news');
                         return  $query -> row_array (); 
                 }
                 public  function  get_competition ($id) //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'competition' ); 
                        $this -> db -> get_where ( 'competition' ,  array ( 'id_competition'  =>  $id ));
                        $this ->db -> join( 'competition_etablissement as c','c.id_competition = competition.id_competition' ); // jointure
                        $this ->db -> join( 'etablissement','etablissement_id = id_etablissement' );
                        $this ->db -> join( 'competition_discipline as co','co.id_compet = competition.id_competition' );
                        $this ->db -> join( 'discipline','co.id_discipline = discipline.id_discipline' ); 
                        $this ->db -> join( 'annee_competition','annee_competition.competition_id = competition.id_competition' ); 
                        $this ->db -> join( 'annee_academique','annee_id = id_anneee' ); 
                        $query  =  $this -> db -> get ( 'competition' ); 
                        return  $query -> row_array (); 
                      
                 }
                 public  function  getphase ($id) //  de competion
        
                 {   
                       
                       
                        $this -> db -> where ( 'compet_id',  $id );
                        $this->db ->order_by('phase.date_debut','ASC');
                        $query  =  $this -> db -> get ( 'phase' ); 
                        return  $query -> result_array (); 
                      
                 }
                 public  function  rencontre ($id) //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'rencontre' ); 
                        $this -> db -> where ( 'id_rencontre',  $id );
                        
                        $this ->db -> join( 'equipe_rencontre as r','r.rencontre_id = rencontre.id_rencontre' ); // jointure
                        $this ->db -> join( 'phase_discipline','id_phase_discipline = phasedisciple_id' );
                        $this ->db -> join( 'phase','id_phase = phase_id' );
                        $this ->db -> join( 'competition as ce','phase_discipline.id_compet = ce.id_competition' );
                        $this ->db -> join( 'competition_etablissement as c','c.id_competition = ce.id_competition' );
                        $this ->db -> join( 'etablissement','etablissement_id = id_etablissement' );
                        $this ->db -> join( 'competition_discipline as co','co.id_compet = ce.id_competition' );
                        $this ->db -> join( 'discipline','co.id_discipline = discipline.id_discipline' ); 
                        $this ->db -> join( 'occupation','rencontre.occupation_id = occupation.id_occupation' );
                        $this ->db -> join( 'stade','stade_id = id_stade' );
                       
                        $query  =  $this -> db -> get ( 'rencontre' ); 
                        return  $query -> row_array (); 
                      
                 }
                 public  function  resultat ($id) //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'rencontre' ); 
                        $this -> db -> where ( 'id_rencontre',  $id );
                        $this -> db -> where ( 'statut_rencontre',  1 );
                        $this ->db -> join( 'equipe_rencontre as r','r.rencontre_id = rencontre.id_rencontre' ); // jointure
                        $this ->db -> join( 'phase_discipline','id_phase_discipline = phasedisciple_id' );
                        $this ->db -> join( 'phase','id_phase = phase_id' );
                        $this ->db -> join( 'competition as ce','phase_discipline.id_compet = ce.id_competition' );
                        $this ->db -> join( 'competition_etablissement as c','c.id_competition = ce.id_competition' );
                        $this ->db -> join( 'etablissement','etablissement_id = id_etablissement' );
                        $this ->db -> join( 'competition_discipline as co','co.id_compet = ce.id_competition' );
                        $this ->db -> join( 'discipline','co.id_discipline = discipline.id_discipline' ); 
                        $this ->db -> join( 'occupation','rencontre.occupation_id = occupation.id_occupation' );
                        $this ->db -> join( 'stade','stade_id = id_stade' );
                         
                        $query  =  $this -> db -> get ( 'rencontre' ); 
                        return  $query -> row_array (); 
                      
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
            //RECUPERE TOUS LES STADES
        public function get_stade1()
        {
            $this->db->select('*');
            $this->db->from('stade');
            $this->db->where('etat_stade',0);
            $req=$this->db->get();
            return $req->result_array();
        }
                

              
         }  

