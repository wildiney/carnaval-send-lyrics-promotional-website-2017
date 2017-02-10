<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

    public function index() {
        if ($this->input->post('login')) {
            $data['emailAdmin'] = $this->input->post("email");
            $data['senhaAdmin'] = $this->input->post("password");

            $this->load->model("admin_model");
            $resultado = $this->admin_model->logar($data);

            if ($resultado) {
                foreach ($resultado as $row) {
                    $data = array('nome' => $row->nomeAdmin, 'email' => $row->emailAdmin, 'level' => $row->levelAdmin, 'logged' => true);
                }

                $this->session->set_userdata($data);
                redirect('/admindashboard/');
            } else {
                echo "erro";
                //redirect('login/erro');
            }
        } else {
             $this->load->view('header_view');
            $this->load->view('admin/form_login_view');
            $this->load->view('footer_view');
        }
    }
    
    public function logout() {
        /**
         * Sessions Admins
         */
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nome');
        $this->session->sess_destroy();

        /**
         * Exec
         */
        redirect('/', 'refresh');
    }

    public function erro(){
        $this->load->view('header_view');
        $this->load->view('erro_view');
        $this->load->view('footer_view');
    }
}
