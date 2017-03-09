<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEnredo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('level')){
            redirect("/AdminLogin","refresh");
        }
    }

    public function index() {
        if ($this->input->post("idEnredo")) {
            $idEnredo = $this->input->post("idEnredo");
            $status = $this->input->post("status");

            $this->load->model("enredo_model");
            $query = $this->enredo_model->changeStatus($idEnredo, $status);
            
            redirect('/AdminDashboard/');
        } else {
            die("Erro");
        }
    }

    public function votacao() {
        $this->load->model("enredo_model");
        $data['resultados'] = $this->enredo_model->listApproved();

        $this->load->view('header_view');
        $this->load->view('enredo_votacao_view', $data);
        $this->load->view('footer_view');
    }

    public function like($idEnredo) {
        $data['matricula'] = $this->input->post("matricula");
        $data['idEnredo'] = $idEnredo;

        $this->load->model("voto_model");
        $this->voto_model->votar($data['idEnredo']);
    }

}
