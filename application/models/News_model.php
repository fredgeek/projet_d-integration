<?php
class News_model extends CI_Model {

   public function __construct()
                {
                        $this->load->database();//chargement de la bd  
                }
   public  function  get_news ( $slug  =  FALSE ) 
        { // 
                if  ( $slug  ===  FALSE ) 
                {       
                        $this->db ->order_by('news.post','DESC');
                        $this ->db -> join( 'categorie','categorie.id = news.categorie_id' ); // jointure 
                        $query  =  $this -> db -> get ( 'news' ); 
                        return  $query -> result_array (); 
                }

                            $this -> db -> get_where ( 'news' ,  array ( 'slug'  =>  $slug )); 
                           
                           $query = $this-> db-> get('news');
                return  $query -> row_array (); 
        }
        public  function  set_news ($image) //creation d'une nouvelle
        { 
            $this -> load -> helper ( 'url' );
        
            $slug  =  url_title ( $this -> input -> post ( 'title' ),  'dash' ,  TRUE );
        
            $data  =  array ( 
                'title'  =>  $this -> input -> post ( 'title' ), 
                'slug'  =>  $slug , 
                'text'  =>  $this -> input -> post ( 'text' ) ,
                'categorie_id'  =>  $this -> input -> post ( 'categorie_id' ), 
                'image' => $image
            );
        
            return  $this -> db -> insert ( 'news' ,  $data ); 
           
        }
        public function delete_post($id) {
         $this->db->where('id',$id);
         $this->db->delete('news');
         return(true);
        }
        public function update () {
                $this -> load -> helper ( 'url' );
        
            $slug  =  url_title ( $this -> input -> post ( 'title' ),  'dash' ,  TRUE );
        
            $data  =  array ( 
                'title'  =>  $this -> input -> post ( 'title' ), 
                'slug'  =>  $slug , 
                'text'  =>  $this -> input -> post ( 'text' ),
                'categorie_id'  =>  $this -> input -> post ( 'categorie_id' ) 
            );
        
                    $this -> db ->where ( 'id' ,  $this -> input -> post ( 'id' ) ); 
                    $this -> db ->update( 'news',$data ); 
                    return true;
              
               }

               public function get_categorie () {

                $this-> db-> order_by('nom');
                $query = $this-> db-> get('categorie');
                return $query-> result_array();
              
               }
}