<?php
class Respocompet_model extends CI_Model {

    public function __construct()
                 {
                         $this->load->database();//chargement de la bd  
                 }  
                 
                 public  function  get_type () //  de competion
        
                 {   
                        $query  =  $this -> db -> get ( 'type_competition' ); 
                        return  $query -> result_array (); 
                 }
                 public  function  get_discipline () //  de competion
        
                 {        $this->db->where('type_discipline','Collective');
                        $query  =  $this -> db -> get ( 'discipline' );
                       
                        return  $query -> result_array (); 
                 }

                
                 public  function  get_type1 () //de descipline 
        
                 { 
                        $query  =  $this -> db -> get ( 'type_discipline' ); 
                        return  $query -> result_array (); 
                 }

                 public function register_compet()
                 {
                        $data= array(
                                'nom'=>$this->input->post('nomcompet'),
                                'date_debut'=>$this->input->post('debut'),
                                'date_fin'=>$this->input->post('fin'),
                                'type_competition'=>$this->input->post('typecompet'),    
                                'respo_id' => $this->input->post('respo_id') ,
                        );
                    
                         $this->db->insert('competition', $data);
                         $insertId = $this->db->insert_id();
                         return  $insertId;

                 }   
                 public function competition_exist($id_annee, $id_etab, $data,$type)
                 {
                       
                    $this->db->select('*');
                    $this->db->from('competition');
                    $this->db->join('competition_discipline','id_compet = competition.id_competition','inner');
                    $this->db->join('annee_competition','competition_id = competition.id_competition','inner');
                    $this->db->join('competition_etablissement','competition_etablissement.id_competition = competition.id_competition','inner');
                    $this->db->join('type_competition','competition_type= type_competition','inner');
                    $this->db->where('annee_id',$id_annee);
                    $this->db->where('etablissement_id',$id_etab);
                    $this->db->where('id_discipline',$data);
                    $this->db->where('type_competition',$type);
                    $result=$this->db->get(); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_competition;
                     } else{
                              return false;
                     }

                 }   
               
                 public function id_etab($id)
                 {
                    
                     $this->db->where('nom_etablissement',$id);
                     $result=$this->db->get('etablissement'); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_etablissement;
                     } else{
                              return false;
                     }
                 }   
                 public function recup_iddiscipline($id)
                 {
                    
                     $this->db->where('id_compet',$id);
                     $result=$this->db->get('competition_discipline'); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_discipline;
                     } else{
                              return false;
                     }
                 }   
                 public function recup_idcompet($name, $debut,$fin,$type)
                 {
                     $this->db->where('nom',$name);
                     $this->db->where('date_debut',$debut);
                     $this->db->where('date_fin',$fin);
                     $this->db->where('type_competition',$type);
                     $result=$this->db->get('competition'); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_competition;
                     } else{
                              return false;
                     }
                 }   
                
                 public function insert_compet_discipline($compet_id_recup)
                 {
              
                    
                           $data  =  array ( 
                                   'id_compet'=>$compet_id_recup,
                                   'id_discipline'=>$this -> input->post('discipline')
                              );
                     
                   return $this->db->insert('competition_discipline',$data);  
                    
                 }  
                 public function insert_compet_annee($compet_id_recup,$annee)
                 {
              
                    
                           $data  =  array ( 
                                   'competition_id'=>$compet_id_recup,
                                   'annee_id'=>$annee
                              );
                     
                   return $this->db->insert('annee_competition',$data);  
                    
                 }  
                 public function insert_compet_etab($compet_id_recup,$etab)
                 {
              
                    
                           $data  =  array ( 
                                   'id_competition'=>$compet_id_recup,
                                   'etablissement_id'=>$etab
                              );
                     
                   return $this->db->insert('competition_etablissement',$data);  
                    
                 }  
                 public function insert_phase()
                 {
              
                    
                           $data  =  array ( 
                                   'nom_phase'=>$this -> input->post('phase'), 
                                   'periode_phase'=>$this -> input->post('phase_periode')
                              );
                     
                   return $this->db->insert('phase',$data);  
                    
                 }  

                 public function recup_idphase($nom_phase, $phase_debut,$compet_id)
                 {
                     $this->db->where('nom_phase',$nom_phase);
                     $this->db->where('date_debut',$phase_debut);
                     $this->db->where('compet_id',$compet_id);
                     $result=$this->db->get('phase'); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_phase;
                     } else{
                              return false;
                     }
                     
                 }   
                 public function recup_phase($id)
                 {
              
                     $this->db->select ( 'id_phase,nom_phase, periode_phase' ); 
                     $query =$this->db->get_where ( 'phase',array('id_phase'=>$id));
                    // $result=$this->db->get('competition'); 
                     
                    return  $query->row_array (); 
                    
                 }   
               
              
              
                  public function insert_phase_discipline1($id_phase)
                 {
              
                    
                           $data  =  array ( 
                                   'phase_id'=>$id_phase, 
                                   'discipline_id'=>$this->input->post('discipline'),
                                   'compet_id'=>$this -> input->post('id_competition')
                              );
                     
                   return $this->db->insert('phase_discipline',$data);  
                    
                 }   
                 
                 public function insert_phase_discipline($dat,$dat1,$dat2)
                 {
              
                    
                           $data  =  array ( 
                                   'phase_id'=>$dat, 
                                   'discipline_id'=>$dat1,
                                   'id_compet'=>$dat2
                                
                              );
                     
                    $this->db->insert('phase_discipline',$data);  
                    
                 }   
                 public function save($data)
                        {
                        $this->db->insert('poule', $data);
                        
                    }
                    //////////////////////////////////////////////////////////////////////
                       ///   configuration des equipes    ////////////////////

                    ////////////////////////////////////////////////////////////////




                    public  function  discipline ($dat) //  de competion
        
                    {        $this->db->where('type_discipline','Collective');
                        $this->db->where('id_discipline',$dat);
                           $result  =  $this -> db -> get ( 'discipline' );
                          
                           if($result->num_rows()==1)           
                    
                           {
                                   return $result->row(0)->nom_discipline;
                           } else{
                                    return false;
                           }
                    }
                    public  function  get_genre ($dat) //  de competion
        
                    {       
                        $this->db->where('id_competition',$dat);
                           $result  =  $this -> db -> get ( 'competition' );
                          
                           if($result->num_rows()==1)           
                    
                           {
                                   return $result->row(0)->type_competition;
                           } else{
                                    return false;
                           }
                    }
                    public function get_nom_etab($id)
                    {    $this->db->select('*');
                        $this->db->from('etablissement');
                        $this->db->join('competition_etablissement','id_etablissement = etablissement_id','inner');
                        $this->db->where('id_competition',$id);
                       
                        $result=$this->db->get(); 
                        return  $result -> row_array (); 
                     
                    }   
                    public function get_id_etab($id)
                    {    $this->db->select('*');
                        $this->db->from('etablissement');
                        $this->db->join('competition_etablissement','id_etablissement = etablissement_id','inner');
                        $this->db->where('id_competition',$id);
                        $result=$this->db->get(); 
                        if($result->num_rows()==1)           
                    
                        {
                                return $result->row(0)->id_etablissement;
                        } else{
                                 return false;
                        }
                     
                    }   
                    public function get_parcours($id)
                    {    $this->db->select('*');
                        $this->db->from('parcours');
                        $this->db->join('filiere','id_filiere = id_filiere_parcours','inner');
                        $this->db->join('niveau','id_niveau = id_niveau_parcours','inner');
                        $this->db->join('cycle','id_cycle = id_cycle_parcours','inner');
                        $this->db->where('id_nom_etablissement',$id);
                       
                        $result=$this->db->get(); 
                        return  $result -> result_array (); 
                    
                    }   
                    public function creation_equipe($parcours,$fil,$cycle,$niv,$discipline,$genre,$id)
                    {
                           $data= array(
                                   'parcours_id'=>$parcours,
                                   'nom'=>$fil.' '.$cycle.' '.$niv,
                                   'discipline'=>$discipline,
                                   'genre'=>$genre, 
                                   'id_etab'=>$id,    
                                  
                           );
                       
                            $this->db->insert('equipe', $data);
                            return true;
   

                    }   
                    public function verif_equipe($parcours, $discipline,$genre)
                    {
                        $this->db->where('parcours_id',$parcours);
                        $this->db->where('discipline',$discipline);
                        $this->db->where('genre',$genre);
                        $result=$this->db->get('equipe'); 
                        
                        
                       if($result->num_rows()==1)           
                       
                        {
                                return $result->row(0)->equipe_id;
                        } else{
                                 return false;
                        }
                        
                    }   
                   
                    ////////////////////////////////////////////
                    /////////////////////////////
                 //recuperation des phases en fonction de la discipline

                 public function get_phase($dat3)
                 {
                     $this->db->select('*');
                     $this->db ->order_by('date_debut','ASC');
                     $this->db->from('phase');
                     $this->db->join('phase_discipline','phase_id = id_phase','inner');
                     $this->db->where( array('compet_id' =>$dat3));
                    
                     $result=$this->db->get(); 
                     return  $result -> result_array (); 
                     
                    
                 } 
                 public function phase_exist($dat3,$dat)
                 {
                     $this->db->select('*');
                     $this->db->from('phase');
                     $this->db->where( array('compet_id' =>$dat3));
                     $this->db->where( array('nom_phase' =>$dat));
                    
                     $result=$this->db->get(); 
                     if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_phase;
                     } else{
                              return false;
                     }
                    
                 } 
                 public function poule_exist($dat3,$dat)
                 {
                     $this->db->from('poule');
                     $this->db->where( array('competition_id' =>$dat3));
                     $this->db->where( array('phase_id' =>$dat));
                     return $this->db->count_all_results();
                    
                 } 
                 public function get_phase_2_parameters($dat1,$dat2)
                 {
                     $this->db->select('*');
                     $this->db->from('phase');
                     $this->db->join('phase_discipline','phase_id = id_phase','inner');
                     $this->db->where( array('compet_id' =>$dat1));
                     $this->db->where( array('id_phase' =>$dat2));
                    
                     $result=$this->db->get(); 
                     return  $result -> result_array (); 
                     
                    
                 } 
                 

    
                //////////////////////////////////

                
                 public function  get_rencontre_equipe($compet_id){
                    $this->db->select('*');
                    $this->db ->order_by('rencontre.date_rencontre','ASC');
                    $this->db->from('equipe_rencontre');
                    $this->db->join('rencontre','rencontre_id = id_rencontre','inner');
                    $this->db->join('phase_discipline','id_phase_discipline = phasedisciple_id');
                    $this->db->join('phase','id_phase = phase_id');
                   // $this->db->where( array('statut_rencontre = 1'));
                    $this->db->where( array('id_compet' =>$compet_id));
                   
                    $result=$this->db->get(); 
                    return  $result -> result_array (); 
                } 
                 public function  get_rencontre_equipe_($compet_id,$id){
                    $this->db->select('*');
                    $this->db ->order_by('rencontre.date_rencontre','ASC');
                    $this->db->from('equipe_rencontre');
                    $this->db->join('rencontre','rencontre_id = id_rencontre','inner');
                    $this->db->join('phase_discipline','id_phase_discipline = phasedisciple_id');
                    $this->db->join('phase','id_phase = phase_id');
                    $this->db->where( array('id_compet' =>$compet_id));
                    $this->db->where( array('poule_id' =>$id));
                    
                    $result=$this->db->get(); 
                    return  $result -> result_array (); 
                } 

                 public function  recup_rencontre($dat){
                    $this->db->select('*');
                    $this->db->from('rencontre');
                    $this->db->limit(10);
                    $this->db->join('equipe_rencontre','rencontre_id = id_rencontre','inner');
                    $this->db->join('equipe AS a','a.equipe_id = equipe_rencontre.equipe_id2','inner');
                    $this->db->join('equipe AS b','b.equipe_id = equipe_rencontre.equipe_id','inner');
                    $this->db->join('poule_equipe AS c','a.equipe_id = c.id_equipe','inner');
                    $this->db->join('poule_equipe AS d','b.equipe_id = d.id_equipe','inner');
                    $this->db->join('poule AS e','e.id = c.id_poule','inner');
                    $this->db->join('poule AS f','f.id = d.id_poule','inner');
                    $this->db->where( array('e.id' =>$dat));   
                    $this->db->where( array('f.id' =>$dat));               
                    $result=$this->db->get(); 
                    if($result->num_rows()==1)           
                    
                    {
                            return $result->row(0)->id_rencontre;
                    } else{
                             return false;
                    }    
                }
                public function update_rencontre( $id,$date )
                {
                       $data  =  array ( 
                           'date_rencontre'  =>  $date,    
                        );
                   
                   $this -> db -> where ( 'id_rencontre' ,  $id ); 
                   $this -> db -> update ( 'rencontre' ,  $data );
                 return true;

                }  
                public function recup_date($id)
                {
                    $this->db->where('id_rencontre',$id);
                    
                    $result=$this->db->get('rencontre'); 
                    
                    
                   if($result->num_rows()==1)           
                   
                    {
                            return $result->row(0)->date_rencontre;
                    } else{
                             return false;
                    }
                    
                }   
                public function  get_groupe($dat1,$dat2){
                    $this->db->select('*');
                    $this->db->from('poule');
                   // $this->db->join('poule_equipe','poule.id = poule_equipe.id_poule','inner');
                    $this->db->join('phase','poule.phase_id = phase.id_phase','inner');
                    $this->db->join('phase_discipline','phase_discipline.phase_id = phase.id_phase','inner');
                    $this->db->where( array('phase_discipline.discipline_id' =>$dat1)); 
                    $this->db->where( array('phase_discipline.id_compet' =>$dat2));               
                    $result=$this->db->get(); 
                    return  $result -> result_array (); 
                
                } 
                //////////////////////////////////////////////////////////////////////////////////////////
                /////////////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////  Ne pas modifier/////////////////////////////////////////////////////////////
                /////////////////////////////////////////////////////////////////////////////////////////
           
           
                public function  get_rencontre_a($dat1,$dat2){
                        $this->db->select('*');

                        $this->db->from('phase_discipline');
                        $this->db->join('rencontre','id_phase_discipline= phasedisciple_id','inner');
                        $this->db->join('equipe_rencontre','rencontre_id = id_rencontre','inner');
                        $this->db->join('equipe','equipe.equipe_id = equipe_rencontre.equipe_id','equipe.equipe_id = equipe_rencontre.equipe_id2','inner');
                        $this->db->where( array('phase_discipline.discipline_id' =>$dat1)); 
                        $this->db->where( array('phase_discipline.id_compet' =>$dat2));               
                        $result=$this->db->get(); 
                        return  $result -> result_array (); 
                    
                } 
                public function  get_rencontre_b($dat1,$dat2){
                    $this->db->select('*');
                    $this->db->from('phase_discipline');
                    $this->db->join('rencontre','id_phase_discipline= phasedisciple_id','inner');
                    $this->db->join('equipe_rencontre','rencontre_id = id_rencontre','inner');
                    $this->db->join('equipe','equipe.equipe_id = equipe_rencontre.equipe_id2','equipe.equipe_id = equipe_rencontre.equipe_id','inner');
                    $this->db->where( array('phase_discipline.discipline_id' =>$dat1)); 
                    $this->db->where( array('phase_discipline.id_compet' =>$dat2));               
                    $result=$this->db->get(); 
                    return  $result -> result_array (); 
                
            } 
            public function  get_equipe_rencontre(){
                $this->db->select('*');
                $this->db->from('equipe_rencontre');          
                $result=$this->db->get(); 
                return  $result -> result_array (); 
            
        } 
       
        //////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////
           
              


                 public function get_poule_info($dat3)
                 {
                    $this->db->select('*');
                     $this->db->from('poule');
                     $this->db->join('phase','id_phase = phase_id','inner');
                     $this->db->where( array('id' =>$dat3));
                     $result=$this->db->get(); 
                     return  $result -> result_array (); 
                    
                 } 
                   public function get_poule($dat3)
                 {
                     $this->db->select('*');
                     $this->db->from('poule');
                     $this->db->join('phase','id_phase = phase_id');
                     $this->db->where( array('compet_id' =>$dat3));
                     $result=$this->db->get(); 
                     return  $result -> result_array (); 
                 }   

                 public function get_equipe()
                 {
                     $this->db->select('*');
                     $this->db->from('equipe');
                     $this->db->join('poule_equipe','id_equipe = equipe_id','inner');
                     $this->db->join('poule','poule.id = poule_equipe.id_poule','inner');
                     $this->db->where(array('respo_id'));
                    
                     $result=$this->db->get(); 
                     return  $result -> result_array (); 
                 }   



                 
                 public function get_equipe_rencontre_A()
                 {
                     $this->db->select('*');
                     $this->db->from('equipe');
                    // $this->db->join('poule_equipe','poule.id = poule_equipe.id_poule','inner');
                    // $this->db->join('equipe','equipe.equipe_id = poule_equipe.id_equipe','inner');
                     $this->db->join('equipe_rencontre','equipe.equipe_id = equipe_rencontre.equipe_id','inner');
                     $this->db->join('rencontre','rencontre.id_rencontre = equipe_rencontre.rencontre_id','inner');
                    // $this->db->where(array('nom_poule'=>'Groupe A'));
                    // $this->db->where(array('poule_id'=>'88'));
                    
                     $result=$this->db->get(); 
                     return  $result -> result_array (); 
                 }   
                 public function get_equipe_rencontre_B()
                 {
                     $this->db->select('*');
                     $this->db->from('equipe');
                    // $this->db->join('poule_equipe','poule.id = poule_equipe.id_poule','inner');
                    // $this->db->join('equipe','equipe.equipe_id = poule_equipe.id_equipe','inner');
                     $this->db->join('equipe_rencontre','equipe.equipe_id = equipe_rencontre.equipe_id2','inner');
                     $this->db->join('rencontre','rencontre.id_rencontre = equipe_rencontre.rencontre_id','inner');
                   //  $this->db->where(array('nom_poule'=>'Groupe A'));
                    // $this->db->where(array('poule_id'=>'88'));
                    
                     $result=$this->db->get(); 
                     return  $result -> result_array (); 
                 }   
                 public function recup_compet($data)
                 {
              
                     $this->db->select ( '*' ); 
                     $this->db ->order_by('competition.creer_le','DESC');
                     $this->db->from ( 'competition');  
                     $this->db->join('competition_discipline','id_compet = competition.id_competition','inner');
                     $this->db->join('discipline','competition_discipline.id_discipline = discipline.id_discipline','inner');
                     $this->db->join('annee_competition','competition_id = competition.id_competition','inner');
                     $this->db->join('annee_academique','id_anneee = annee_id','inner');
                     $this->db->join('competition_etablissement','competition_etablissement.id_competition = competition.id_competition','inner');
                     $this->db->join('etablissement','competition_etablissement.etablissement_id = id_etablissement','inner');
                     $this->db->where(array('respo_id'=>$data));
                     $this->db->where('etat_competition != 2');
                     $result=$this->db->get();
                     return  $result->result_array (); 
                    
                 }   
                 public function recup_compet_invalide($data)
                 {
              
                     $this->db->select ( '*' ); 
                     $this->db ->order_by('competition.date_debut','ASC');
                     $this->db->from ( 'competition');  
                     $this->db->join('competition_discipline','id_compet = competition.id_competition','inner');
                     $this->db->join('discipline','competition_discipline.id_discipline = discipline.id_discipline','inner');
                     $this->db->join('annee_competition','competition_id = competition.id_competition','inner');
                     $this->db->join('annee_academique','id_anneee = annee_id','inner');
                     $this->db->join('competition_etablissement','competition_etablissement.id_competition = competition.id_competition','inner');
                     $this->db->join('etablissement','competition_etablissement.etablissement_id = id_etablissement','inner');
                     $this->db->where(array('respo_id'=>$data));
                     $this->db->where('etat_competition = 2');
                     $result=$this->db->get();
                     return  $result->result_array (); 
                    
                 }   
                 public function stade()
                 {
              
                     $this->db->select ( '*' ); 
                    
                     $result=$this->db->get('stade');
                     return  $result->result_array (); 
                    
                 }    


              public function   get_phase_poule_equipe($data1,$data2){
                $this->db->select('*');
                $this->db->from('poule');
                $this->db->join('poule_equipe','poule_equipe.id_poule = poule.id','inner');
                $this->db->join('equipe','equipe.equipe_id = poule_equipe.id_equipe','inner');
                $this->db->join('phase','poule.phase_id = phase.id_phase','inner');
                $this->db->join('competition_discipline as c','c.id_compet = phase.compet_id','inner');
                $this->db->join('discipline as d','d.id_discipline = c.id_discipline','inner');
                $this->db->where(array('poule.id'=>$data1));
                $this->db->where(array('poule.phase_id'=>$data2));
               
                $result=$this->db->get(); 
                return  $result -> result_array (); 
              

              }



              public function recup_idphase_discipline($idphase)
                 {
                     $this->db->where('phase_id',$idphase);
                     
                     $result=$this->db->get('phase_discipline'); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_phase_discipline;
                     } else{
                              return false;
                     }
                     
                 }   

                 public function recup_compet2($data)
                 {
              
                     $this->db->select ( '*' ); 
                     $this->db->from ( 'competition');  
                     $this->db->join('competition_discipline','id_compet = id_competition','inner');
                     $this->db->join('discipline','competition_discipline.id_discipline = discipline.id_discipline','inner');
                     $this->db->where(array('id_competition'=>$data));
                     $result=$this->db->get();
                     return  $result->result_array (); 
                    
                 }   
                 public function recup_poule_equipe($data)
                 {
                     $this->db->select('*');
                     $this->db->from('poule');
                     $this->db->join('poule_equipe','id_poule = poule.id','inner');
                     $this->db->join('equipe','equipe.equipe_id = poule_equipe.id_equipe','inner');
                     $this->db->where(array('poule.id'=>$data));
                    
                     $result=$this->db->get(); 
                     return  $result -> result_array (); 
                 }   

                 public function equipe_id($data,$data2)
                 {
                     $this->db->select('*');
                     $this->db->from('poule');
                     $this->db->join('poule_equipe','id_poule = poule.id','inner');
                     $this->db->join('equipe','equipe.equipe_id = poule_equipe.id_equipe','inner');
                     $this->db->where(array('poule.id'=>$data));
                     $this->db->where(array('equipe.nom'=>$data2));
                    
                     $result=$this->db->get(); 
                     if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->equipe_id;
                     } else{
                              return false;
                     }
                     
                 }   

                 public function save_equipe_rencontre($home, $awa,$id,$id_poule,$nom_equipe1, $nom_equipe2)
                 {
                        $data= array(
                                'equipe_id'=>$home,
                                'equipe_id2'=>$awa,
                                'rencontre_id'=>$id,
                                'poule_id' =>$id_poule,
                                'nom_equipe1'=>$nom_equipe1, 
                                'nom_equipe2'=>$nom_equipe2 

                                  
                        );
                    
                         $this->db->insert('equipe_rencontre', $data);
                         return true;

                 }  
////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////

                 public function save_rencontre($date, $jour, $phase_dis,$unique,$val)
                 {
                        $data= array(
                                'date_rencontre'=>$date,
                                'journee'=>$jour,
                                'occupation_id'=> $val,
                                'phasedisciple_id'=>$phase_dis,     
                                'recup_unique' => $unique
                        );
                    
                         $this->db->insert('rencontre', $data);
                         return true;

                 }  
                 public function save_occupation($debut,$fin,$id_stade,$uniq){

                    $data= array(
                        'debut_occupation'=>$debut,
                        'fin_occupation'=>$fin,
                        'uniq'=>$uniq,     
                        'stade_id' =>$id_stade 
                );
            
                 $this->db->insert('occupation', $data);
                 $insertId = $this->db->insert_id();
                 return  $insertId;

                 }

                 public function save_results($awa ,$home , $poule_id, $perfo1, $perfo2 )
                 {
                        $data  =  array ( 
                            'resultat_equipe1'  =>  $perfo1 , 
                            'resultat_equipe2'  => $perfo2 ,  
                            'statut_rencontre'  => 1         
                         );
                    
                    $this -> db -> where ( 'poule_id' ,  $poule_id ); 
                    $this -> db -> where ( 'equipe_id' ,  $home  ); 
                    $this -> db -> where ( 'equipe_id2' ,  $awa );
                    $this -> db -> update ( 'equipe_rencontre' ,  $data );
                  return true;

                 }  
                
                 public function recup_id_rencontre($phase_dis,$unique)
                 {
                    
                    $this->db->where('phasedisciple_id',$phase_dis);
                    $this -> db -> where ( 'recup_unique' , $unique);

                     $result=$this->db->get('rencontre'); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_rencontre;
                     } else{
                              return false;
                     }
                     
                 }   
                 public function get_equipe_id($data)
                 {
                     $this->db->where('nom',$data);
                     
                     $result=$this->db->get('equipe'); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->equipe_id;
                     } else{
                              return false;
                     }
                     
                 }   
                 
                 
                


                //////////// validation des données
    
                 public function valid_donnees($donnees)
                 {
                             $donnees = trim($donnees);
                             $donnees = stripslashes($donnees);
                             $donnees = htmlspecialchars($donnees);
                             return $donnees;
                 }
                            
                 public function recup_discipline($data)
                 {
                     $this->db->select('discipline.id_discipline,discipline.nom_discipline,competition_discipline.id_discipline');
                     $this->db->from('discipline');
                     $this->db->join('competition_discipline','competition_discipline.id_discipline = discipline.id_discipline');
                     $this->db->where( array('id_compet' =>$data));
                    
                     $result=$this->db->get(); 
                     return  $result -> result_array (); 
                     
                    
                 } 
                 ////////////// user_profil

                   public function get_user_profil($id)
                   {
              
                     $this->db->select ( '*' ); 
                     $query =$this->db->get_where ( 'utilisateur',array('id'=>$id));
                    return  $query->row_array (); 
                    
                    }   
                    public function update_profil($nom ,$prenom , $username, $password, $email,$contact,$id )
                    {
                           $data  =  array ( 
                               'username'  =>  $username , 
                               'nom'  => $nom ,  
                               'prenom'  =>  $prenom , 
                               'password'  => $password ,  
                               'email'  =>  $email , 
                               'contact'  => $contact ,         
                            );
                       
                       $this -> db -> where ( 'id' ,  $id ); 
                       $this -> db -> update ( 'utilisateur' ,  $data );
                     return true;
   
                    }  
                 /////////////////////////////////////////////////// 
                 ///////////////////////////////////////////////////
                 //////////                             ///////////
                 /////////        STATISTIQUES         ////////////
                 /////////                             ////////////
                 //////////////////////////////////////////////////
                 public function total_competition()
                 { 
                    $this->db->from('competition');
		            return $this->db->count_all_results();
                 }
                 public function total_equipe()
                 { 
                    $this->db->from('equipe');
		            return $this->db->count_all_results();
                 }  
                 public function total_rencontre()
                 { 
                    $this->db->from('rencontre');
		            return $this->db->count_all_results();
                 }  
                 public function total_rencontre_jouee()
                 { 
                    $this->db->from('equipe_rencontre');
                    $this -> db -> where ( 'statut_rencontre',1 ); 
		            return $this->db->count_all_results();
                 }  
                 public function total_stade()
                 { 
                    $this->db->from('stade'); 
		            return $this->db->count_all_results();
                 }  
                 public function football()
                 { 
                    $this->db->from('competition_discipline'); 
                    $this -> db -> where ( 'id_discipline',3 ); 
		            return $this->db->count_all_results();
                 }  
                  public function basket()
                 { 
                    $this->db->from('competition_discipline'); 
                    $this -> db -> where ( 'id_discipline',2 ); 
		            return $this->db->count_all_results();
                 }  
                 public function hand_ball()
                 { 
                    $this->db->from('competition_discipline'); 
                    $this -> db -> where ( 'id_discipline',4 ); 
		            return $this->db->count_all_results();
                 }  
                 public function volley_ball()
                 { 
                    $this->db->from('competition_discipline'); 
                    $this -> db -> where ( 'id_discipline',9 ); 
		            return $this->db->count_all_results();
                 }  
                 public function pourcentage($a,$b)
                 { 
                     if($a==0 || $b==0){
                         return 0;
                     } else{
                    $c= round( $b/$a,2)*100;
                  
		             return $c;
                     }
                 }  
                 public  function  nb_discipline ()//  de competion
        
                 {      
                      
                        $this->db->where('type_discipline','Collective'); 
                        $query  =  $this -> db -> get ( 'discipline' );
                        return  $query -> result_array (); 
                 }
             
//////////////////////////////////////////////////////////////////////////////////////////

public function match_joue1()
{ 
   $this->db->from('equipe_rencontre'); 
   $this -> db -> where ( 'statut_rencontre',1 ); 
   $this -> db -> where ( 'equipe_id',23); 
   return $this->db->count_all_results();
} 
 public function match_joue2()
{ 
   $this->db->from('equipe_rencontre'); 
   $this -> db -> where ( 'statut_rencontre',1 ); 
   $this -> db -> where ( 'equipe_id2',23); 
   return $this->db->count_all_results();
}  

public function victoire_r1()
{ 
   $this->db->from('equipe_rencontre'); 
   $this -> db -> where ( 'resultat_equipe1 > resultat_equipe2' ); 
   $this -> db -> where ( 'statut_rencontre',1 ); 
   $this -> db -> where ( 'equipe_id',23); 
   return $this->db->count_all_results();
} 
 public function victoire_r2()
{ 
   $this->db->from('equipe_rencontre'); 
   $this -> db -> where ( 'resultat_equipe1 < resultat_equipe2' ); 
   $this -> db -> where ( 'statut_rencontre',1 ); 
   $this -> db -> where ( 'equipe_id2',23); 
   return $this->db->count_all_results();
}  
public function victoire_null()
{ 
   $this->db->from('equipe_rencontre'); 
   $this -> db -> where ( 'resultat_equipe1 = resultat_equipe2' ); 
   $this -> db -> where ( 'statut_rencontre',1 ); 
   $this -> db -> where ( 'equipe_id2',23); 
   return $this->db->count_all_results();
}  
      //////////////////////////////////////////////////////////////////////////////////
                        
      public function   cross_join($data2,$data1){
        $this->db->select('id_equipe');
        $this->db->from('poule_equipe');
        $this->db->join('poule','poule_equipe.id_poule = poule.id','inner');
        $this->db->join('phase','poule.phase_id = phase.id_phase','inner');
       // $this->db->where(array('poule.id'=>$data1));
        $this->db->where(array('poule.phase_id'=>$data2));
        $this->db->where(array('id_equipe'=>$data1));
       
        $result=$this->db->get(); 
             
        if($result->num_rows()==1)           
                    
        {
                return $result->row(0)->id_equipe;
        } else{
                 return false;
        }
      }



      public function date_debut($id)
      {
         
         $this->db->where('id_competition',$id);
       

          $result=$this->db->get('competition'); 
          
          
         if($result->num_rows()==1)           
         
          {
                  return $result->row(0)->date_debut;
          } else{
                   return false;
          }
          
      }   
      public function date_fin($id)
      {
         
         $this->db->where('id_competition',$id);
       

          $result=$this->db->get('competition'); 
          
          
         if($result->num_rows()==1)           
         
          {
                  return $result->row(0)->date_fin;
          } else{
                   return false;
          }
          
      }   
      public function reporter($id ,$debut , $fin)
      {
             $data  =  array ( 
                 'date_debut'  =>  $debut , 
                 'date_fin'  => $fin ,  
                 'etat_competition'  =>  0, 
                 'commentaire_competition'  => ''
                       
              );
         
         $this -> db -> where ( 'id_competition' ,  $id ); 
         $this -> db -> update ( 'competition' ,  $data );
       return true;

      }  

      ////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////
      /////////                  DELETE                                ////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////

      public function delete_poule($id) {
        $this->db->where('id', $id);
        $this->db->delete('poule');
            

                 }
      public function delete_phase($id) {
                $this->db->where('id_phase', $id);
                $this->db->delete('phase');

            }

            //// suppression de la compétition et de toute ses données
            public function delete_compet1($id) {
                $this->db->where('id_competition', $id);
                $this->db->delete('competition');

            }
            public function delete_compet2($id) {
                $this->db->where('compet_id', $id);
                $this->db->delete('phase');

            }
}
                                         
  