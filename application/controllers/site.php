<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    public function index() {
        $this->home();
    }

    public function home() {
        $this->load->model("model_get");
        $data["results"] = $this->model_get->getData("Home");
        
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("site_content_home.php", $data);
        $this->load->view("site_footer");
    }

    public function about() {
        $this->load->model("model_get");
        $data["results"] = $this->model_get->getData("About");
        
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("site_content_about", $data);
        $this->load->view("site_footer");
    }

    public function contact() {
        $data["message"] = "";
        
        $this->load->model("model_get");
        $data["results"] = $this->model_get->getData("Contact");
        
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("site_content_contact", $data);
        $this->load->view("site_footer");
    }
    
    public function send_email() {
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("fullName","Name","required|alpha|xss_clean");
        $this->form_validation->set_rules("email","Email","required|valid_email|xss_clean");
        $this->form_validation->set_rules("message","Message","required|alpha|xss_cleans");
        
        if($this->form_validation->run() == FALSE) {
            $data["message"] = "";
            
            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("site_content_contact", $data);
            $this->load->view("site_footer");
        }   else {
            $data["message"] = "The email has successfully been sent!";
            
            $this->load->library("email");
            $this->email->from(set_value("email"),  set_value("fullName"));
            $this->email->to("meyer.braulio@gmail.com");
            $this->email->subject("Message from out form");
            $this->email->message(set_value("message "));
            
            $this->email->send();
            echo $this->email->print_debugger();

            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("site_content_contact", $data);
            $this->load->view("site_footer");
        }
    }

}

?>