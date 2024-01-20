<?php
class Messages extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Messages_model');
                $this->load->model('News_model');
                $this->load->helper('url_helper');
        }
        public  function  create ($news_id) 
        {                          
            $this -> load -> helper ( 'form' ); 
            $this -> load -> library ( 'form_validation' );

            $slug =  $this->input->post('slug');
            $data['news_item'] = $this->News_model->get_news($slug);  // recuperation ds la table news


            $this -> form_validation -> set_rules ( 'nom' ,  'Nom' ,  'required' ); // nom de l'attribut "name"+++ nom du label ++++ exigence
            $this -> form_validation -> set_rules ( 'email' ,  'email' ,  'required' );
            $this -> form_validation -> set_rules ( 'email' ,  'email' ,  'valid_email' );
            $this -> form_validation -> set_rules ( 'messages' ,  'Message' ,  'required' );

           if ($this -> form_validation ->run()===FALSE) {
            $this -> load -> view ( 'templates/header'  ); 
            $this -> load -> view ( 'news/view' ,  $data); 
            $this -> load -> view ( 'templates/footer' );

           } else { 
            $this->Messages_model->create_message($news_id);
            redirect('News/'.$slug);
           }
           
           
         }
}