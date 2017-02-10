<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        if ($this->input->post('login')) {
            $data['matricula'] = $this->input->post("matricula");
            $data['dataDeNascimento'] = $this->input->post("data-de-nascimento");

            $this->load->model("user_model");
            $resultado = $this->user_model->logar($data);

            if ($resultado) {
                foreach ($resultado as $row) {
                    $dataDeNascimento = new DateTime($row->dataDeNascimento);
                    $nascimento = $dataDeNascimento->format("d-m-Y");
                    $data = array('nome' => $row->nomeCompleto, 'email' => $row->email, 'matricula' => $row->matricula,'dataDeNascimento' => $nascimento, 'logged' => true);
                }
                
                $this->user_model->updatedAt($row->idUsuario);

                $this->session->set_userdata($data);
                
                redirect('/');
            } else {
                echo "erro";
                //redirect('login/erro');
            }
        } else {
             $this->load->view('header_view');
            $this->load->view('form_login_view');
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
        $this->session->unset_userdata('level');
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
