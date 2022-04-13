<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enredo extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // if (!$this->session->userdata('logged')) {
        //     redirect("/login", "refresh");
        // }

        $this->output->enable_profiler(false);
    }

    public function enviar() {
        $date1 = date("Y-m-d");
        $date2 = "2023-03-03";

        if (strtotime($date1) < strtotime($date2)) {
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

                $data['tituloEnredo'] = $this->input->post('titulo-enredo');
                $data['compositor'] = $this->input->post('compositor');
                $data['matricula'] = $this->input->post('matricula');
                $data['enredo'] = $this->input->post('enredo');
                $data['aceite'] = $this->input->post('aceite');
                $data['created_at'] = date("Y-m-d H:i:s");

                $this->load->model("enredo_model");
                $result = $this->enredo_model->addEnredo($data);

                #EMAIL

                $message = "<p style='font-size:18px; font-family:Arial,sans-serif;'><strong>CARNAVAL 2017</strong></p>";
                $message .= "<p style='font-size:12px; font-family:Arial,sans-serif;'>O seu samba-enredo foi enviado para aprova&ccedil;&atilde;o.</p>";
                $message .= "<p style='font-size:12px; font-family:Arial,sans-serif;'>Assim que aprovado, estar&aacute; dispon&iacute;vel para vota&ccedil;&atilde;o.</p>";
                $message .= "<p style='font-size:12px; font-family:Arial,sans-serif;'>&nbsp;</p>";
                $message .= "<p style='font-size:12px; font-family:Arial,sans-serif;'><strong>Comunica&ccedil;&atilde;o e Marketing</strong></p>";

                //mail($this->session->userdata('email'), 'Você está participando!', $message, $headers);

                include ("Mail.php");
                include ("Mail/mime.php");

                $recipients = $this->session->userdata("email");
                $headers = array(
                    'From' => 'contato@dominio.com.br', # O 'From' é *OBRIGATÓRIO*.
                    'To' => $this->session->userdata("email"),
                    'Subject' => 'Voce esta participando!',
                    //'Content-Type'  => 'text/html; charset=UTF-8',
                    'Date' => date('r')
                );
                # $headers['Reply-To'] = 'EMailDeResposta@DominioDeResposta.com';
                # $headers['Errors-To'] = 'EMailDeRerornoDeERRO@DominioDeretornoDeErro.com';
                # $headers['X-Priority'] = '3'; # 1 UrgentMessage, 3 Normal
                $crlf = "\r\n";

                $text = $message;
                $html = "<HTML><BODY>$text</BODY></HTML>";


                $mime = new Mail_mime($crlf);

                $mime->setHTMLBody($html);

                $body = $mime->get();
                $headers = $mime->headers($headers);

                # Parâmetros para o SMTP. *OBRIGATÓRIO*
                $params = array(
                    'auth' => true, # Define que o SMTP requer autenticação.
                    'host' => 'smtp.dominio.com.br', # Servidor SMTP
                    'username' => 'contato=dominio.com.br', # Usuário do SMTP
                    'password' => '' # Senha do seu MailBox.
                );

                # Define o método de envio
                $mail_object = & Mail::factory('smtp', $params);

                # Envia o email. Se não ocorrer erro, retorna TRUE caso contrário, retorna um
                # objeto PEAR_Error. Para ler a mensagem de erro, use o método 'getMessage()'.
                $result = $mail_object->send($recipients, $headers, $body);
                if (PEAR::IsError($result)) {
                    echo "ERRO ao tentar enviar o email. (" . $result->getMessage() . ")";
                } else {
                    //echo "Email enviado com sucesso!";
                }

                # FIM EMAIL
                $this->load->view('header_view');
                $this->load->view('enredo_enviado_view');
                $this->load->view('footer_view');
            } else {
                $this->load->model("enredo_model");
                $participante = $this->enredo_model->verificaParticipacao($this->session->userdata("matricula"));
                if ($participante) {
                    redirect("/enredo/participante");
                }

                $this->load->view('header_view');
                $this->load->view('enredo_enviar_view');
                $this->load->view('footer_view');
            }
        } else {
            $this->load->view('header_view');
            $this->load->view('enredo_votacao_encerrada_view');
            $this->load->view('footer_view');
        }
    }

    public function votacao() {
        $date1 = date("Y-m-d");
        $date2 = "2017-03-04";

        if (strtotime($date1) < strtotime($date2)) {
            $this->load->model("enredo_model");
            $data['resultados'] = $this->enredo_model->listApproved();

            if ($data['resultados'] == false) {
                $this->load->view('header_view');
                $this->load->view('enredo_votacao_indisponivel_view', $data);
                $this->load->view('footer_view');
            } else {
                $this->load->view('header_view');
                $this->load->view('enredo_votacao_view', $data);
                $this->load->view('footer_view');
            }
        } else {
            $this->load->view('header_view');
            $this->load->view('enredo_votacao_encerrada_view');
            $this->load->view('footer_view');
        }
    }

    public function ranking() {
        $this->load->model("enredo_model");
        $data['resultados'] = $this->enredo_model->listApproved('total desc');

        if ($data['resultados'] == false) {
            $this->load->view('header_view');
            $this->load->view('enredo_votacao_indisponivel_view', $data);
            $this->load->view('footer_view');
        } else {
            $this->load->view('header_view');
            $this->load->view('enredo_ranking_view', $data);
            $this->load->view('footer_view');
        }
    }

    public function like($idEnredo) {
        $date1 = date("Y-m-d");
        $date2 = "2017-03-04";

        if (strtotime($date1) < strtotime($date2)) {
            if (!isset($idEnredo) || is_null($this->session->userdata("matricula"))) {
                $this->load->view('header_view');
                $this->load->view('errolike_view');
                $this->load->view('footer_view');
            } else {
                $data['matricula'] = $this->session->userdata("matricula");
                $data['idEnredo'] = $idEnredo;

                $this->load->model("voto_model");
                $this->voto_model->votar($data['idEnredo']);
            }
        } else {
            $this->load->view('header_view');
            $this->load->view('enredo_votacao_encerrada_view');
            $this->load->view('footer_view');
        }
    }

    public function participante() {
        $this->load->view('header_view');
        $this->load->view('enredo_participante_view');
        $this->load->view('footer_view');
    }

}
