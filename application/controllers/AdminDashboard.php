<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {
     public function __construct() {
        parent::__construct();
        
        $this->output->enable_profiler(false);
        
        if(!$this->session->userdata('level')){
            redirect("/adminlogin","refresh");
        }
    }


    public function index(){
        $this->load->model("enredo_model");
        $data['resultados'] = $this->enredo_model->listAllPending();
        
        $this->load->view('header_view');
        $this->load->view('admindashboard_view', $data);
        $this->load->view('footer_view');
    }
    
}
