<?php
class Respoclasse_model extends CI_Model {

    public function __construct()
                 {
                         $this->load->database();//chargement de la bd  
                 }  
                 public function multisave10($nom_jr, $email_jr,$contact_jr, $matricule_jr)
                 {
                        $data= array(
                                'nom_joueur'=>$nom_jr,
                                'email'=>$email_jr,
                                'contact_joueur'=>$contact_jr,     
                                'matricule'=>$matricule_jr   
                        );
                    
                         $this->db->insert('joueur', $data);
                         return true;

                 }  
                 public function insert_joueur()
                 {
                        $data= array(
                                'nom_joueur'=> $this -> input->post('name') ,
                                'email'=> $this -> input->post('email'),
                                'contact_joueur'=> $this -> input->post('contact'),     
                                'matricule'=> $this -> input->post('matricule')   
                        );
                    
                         $this->db->insert('joueur', $data);
                         return true;
                    
                     
                    
                    
                 }  
                 public function get_equipe_masculine($data,$g)
                 {
                     
                     $this->db->where('matricule_responsable',$data);
                     $this->db->where('genre ',$g);
                     $result=$this->db->get('equipe'); 
                     
                     
                     return  $result -> row_array ();         
                    
                   
                 }   
                 public function recup_joueur($data,$g)
                 {
                
                      $this->db->select('*');
                     $this->db->from('joueur');
                     $this->db->where('matricule_respo',$data);
                     $this->db->where('Genre_discipline',$g);
                   
                     $result=$this->db->get(); 
                     
                     
                     return  $result -> result_array ();         
                    
                   
                 }  
               
                 public function get_joueurs($data)
                 {
                     
                     $this->db->where('matricule_respo',$data);
                     $result=$this->db->get('joueur'); 
                     
                     
                     return  $result -> result_array ();         
                    
                   
                 }  
                
                  public function  recup_id_joueur($data)
                  {
                        $this->db->where('id_jr',$data);
                        
                        $result=$this->db->get('joueur_equipe'); 
                      
                      
                        if($result->num_rows()==1)           
                    
                        {
                                return $result->row(0)->id_jr;
                        } else{
                                 return false;
                        }
                 }
                 public function  recup_id_equipe($data,$data2,$data3)
                 {

                      $this->db->where('genre',$data2);
                      $this->db->where('discipline',$data3);
                      $this->db->where('matricule_responsable',$data);
                       $result=$this->db->get('equipe'); 
                       if($result->num_rows()==1)           
                    
                       {
                               return $result->row(0)->equipe_id;
                       } else{
                                return false;
                       }
                }
                public function  info_equipe($data,$data2,$data3)
                {

                     $this->db->where('genre',$data2);
                     $this->db->where('discipline',$data3);
                     $this->db->where('matricule_responsable',$data);
                      $result=$this->db->get('equipe'); 
                      return  $result -> row_array ();   
               }
                public function  get_joueur($data,$data2)
                {
                        $this->db->select('*');
                        $this->db->from('joueur_equipe');
                        $this->db->join('joueur_discipline','id_jr = joueur_discipline.id_jr_dis','inner');
                        $this->db->join('joueur','joueur.id = joueur_discipline.joueur_id','inner');
                        $this->db->join('discipline','id_discipline = discipline_id','inner');
                       
                        $this->db->where('equipe_id',$data);
                        $this->db->where('nom_discipline',$data2);
                      
                      $result=$this->db->get(); 
                    
                      return $result->result_array (); 
                     
               }
                 public function   get_equipe_inscription($data)
                 {
                      
                     $this->db->select ( '*' ); 
                     $this->db->from ( 'joueur_equipe');  
                     $this->db->join('joueur','id = id_jr','inner');
                     $this->db->where(array('Genre_discipline'=>$data));
                     $result=$this->db->get();
                      return $result->result_array (); 
                      
                }
                 public function  save_joueur_equipe($dat,$dat1,$dat2)
                 {
                     
                        $data= array(
                                'id_jr'=>$dat,
                                'equipe_id'=>$dat1,
                                'annee_academique'=>$dat2,     
                               
                        );
                    
                         $this->db->insert('joueur_equipe', $data);
                         return true;  
                    
                   
                 }   
                 public function id_discipline($id)
                 {
                    
                     $this->db->where('nom_discipline',$id);
                     $result=$this->db->get('discipline'); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_discipline;
                     } else{
                              return false;
                     }
                 }   
                 public function id_joueur_discipline($id,$id1)
                 {
                        $this->db->where('joueur_id',$id);
                     $this->db->where('discipline_id',$id1);
                     $result=$this->db->get('joueur_discipline'); 
                     
                     
                    if($result->num_rows()==1)           
                    
                     {
                             return $result->row(0)->id_jr_dis;
                     } else{
                              return false;
                     }
                 }   

                 function annee(){
                        $this->db->where('etat_annee = 0',);
                       
                        $result=$this->db->get('annee_academique'); 
                        
                        
                       if($result->num_rows()==1)           
                       
                        {
                                return $result->row(0)->annee;
                        } else{
                                 return false;
                        }
                         
                 }

                 function  matricule_existant($matricule, $annee ){
                        $this->db->where('matricule',$matricule);
                        $this->db->where('annee_academique',$annee);
                        $result=$this->db->get('joueur'); 
                        
                        
                       if($result->num_rows()==1)           
                       
                        {
                                return $result->row(0)->matricule;
                        } else{
                                 return false;
                        }
                         
                 }
         
                 function insert($data)
                 {
                         $this->db->insert_batch('joueur', $data);
                 }

 } 