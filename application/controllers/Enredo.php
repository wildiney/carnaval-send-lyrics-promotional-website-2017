<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enredo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged')){
            redirect("/login","refresh");
        }
        
        $this->output->enable_profiler(false);
    }

    public function enviar() {
        if ($this->input->post('participar')) {

            if ($_FILES['file']['size'] > 100000) {
                echo "<div class='alert'>O tamanho da imagem superou o tamanho permitido.</div>";
                echo "<a href='javascript:history.go(-1);'>voltar</a>";
                exit;
            }
            if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                $file['allowed'] = array('jpg', 'png');
                $file['filename'] = $_FILES['file']['name'];
                $file['tempname'] = $_FILES['file']['tmp_name'];
                $file['extension'] = pathinfo($file['filename'], PATHINFO_EXTENSION);

                if (!in_array(strtolower($file['extension']), $file['allowed'])) {
                    echo "<div class='alert'>Esta extensão de arquivo não é permitida.</div>";
                    echo "<a href='javascript:history.go(-1);'>voltar</a>";
                    exit;
                }

                $file['dir'] = 'uploads/';
                
                $filename = $file['dir'] . time() . "-" . $file['filename'];
                
                if (move_uploaded_file($file['tempname'], $filename)) {
                    $data['imagemIlustrativa'] = $filename;
                }
            }

            $dataNascimento = $this->input->post('data-de-nascimento');
            $dataNascimento = str_replace(array("/", '.'), array("-"), $dataNascimento);
            $date = new DateTime($dataNascimento);
            $data['dataDeNascimento'] = $date->format('Y-m-d');
            $data['tituloEnredo'] = $this->input->post('titulo-enredo');
            $data['compositor'] = $this->input->post('compositor');
            $data['matricula'] = $this->input->post('matricula');
            $data['enredo'] = $this->input->post('enredo');
            $data['aceite'] = $this->input->post('aceite');
            $data['created_at'] = date("Y-m-d H:i:s");

            $this->load->model("enredo_model");
            $result = $this->enredo_model->addEnredo($data);

            $this->load->view('header_view');
            $this->load->view('enredo_enviado_view');
            $this->load->view('footer_view');
        } else {
            $this->load->view('header_view');
            $this->load->view('enredo_enviar_view');
            $this->load->view('footer_view');
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
