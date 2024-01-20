<?php
class Test_model extends CI_Model {

    public function __construct()
                 {
                         $this->load->database();//chargement de la bd  
                 }   

                 public function register($enc_password)
                 {
                        $data= array(
                                'password'=>$enc_password,
                                'username'=>$this->input->post('name'),
                                'role'=>$this->input->post('role'),
                                
                        );
                        return $this->db->insert('utilisateur', $data);

                 }   
                 
                 
             // fonction login retourne l'id de l'user
             public function login($username,$password){
             // validate
                $this->db->where('username',$username);
                $this->db->where('password',$password);
               // $this->db->where('role',$role);
                $result=$this->db->get('utilisateur'); 
                
                
               if($result->num_rows()==1)           
               
                {
                        return $result->row(0)->id;
                } else{
                         return false;
                }

              }
              public  function  get_role () //  les roles recupérés
        
              { 
                     $query  =  $this -> db -> get ( 'utilisateur' ); 
                     return  $query -> result_array (); 
              }
              public function recup_role($user_id)   // fonction qui recupere un champ dans la bd en fonction d'une specification
              {
                  $query =$this->db->get_where ( 'utilisateur', array('id'=>$user_id));
                 // $result=$this->db->get('competition'); 
                 if($query->num_rows()==1)           
               
                 {
                         return $query->row(0)->role;
                 } else{
                          return false;
                 }
               //  return  $query->row_array (); 
                 
              }   
              public function recup_matricule($user_id)   // fonction qui recupere un champ dans la bd en fonction d'une specification
              {
                  $query =$this->db->get_where ( 'utilisateur', array('id'=>$user_id));
                 // $result=$this->db->get('competition'); 
                 if($query->num_rows()==1)           
               
                 {
                         return $query->row(0)->matricule;
                 } else{
                          return false;
                 }
               //  return  $query->row_array (); 
                 
              }   

              public function valid_donnees($donnees)
              {
                          $donnees = trim($donnees);
                          $donnees = stripslashes($donnees);
                          $donnees = htmlspecialchars($donnees);
                          return $donnees;
              }

         }  

