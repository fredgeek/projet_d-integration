<?php
class Messages_model extends CI_Model {

    public function __construct()
                 {
                         $this->load->database();//chargement de la bd  
                 }   

                 public function create_message($news_id)
                 {
                        $data= array(
                                'news_id'=>$news_id,
                                'nom'=>$this->input->post('nom'),
                                'email'=>$this->input->post('email'),
                                'text'=>$this->input->post('messages'),
                        );
                        return $this->db->insert('messages', $data);

                 }   
                 public  function  get_messages ( $news_id ) 
        { // 
               
                $this->db ->order_by('messages.poster_le','DESC');
                $query  =  $this -> db -> get_where ( 'messages' ,  array ( 'news_id'  =>  $news_id )); 
                return  $query -> result_array (); 
        }

 }  