<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->enable_profiler(false);
    }

    public function index() {
        $message = "<p style='font-size:18px; font-family:Arial,sans-serif;'><strong>CARNAVAL 2017</strong></p>";
        $message .= "<p style='font-size:12px; font-family:Arial,sans-serif;'>O seu samba-enredo foi enviado para aprovação.</p>";
        $message .= "<p style='font-size:12px; font-family:Arial,sans-serif;'>Assim que aprovado, estará disponível para votação.</p>";

        $headers = 'From: contato@carnavalnaindra.com.br' . "\r\n" .
                'Reply-To: contato@carnavalnaindra.com.br' . "\r\n" .
                "MIME-Version: 1.0" . "\r\n" .
                "Content-type: text/html; charset=UTF-8" . "\r\n" .
                'Date:' . date('r');



        if (mail('wfpimentel@indracompany.com', 'Teste', $message, $headers)) {
            print('Funcionou');
        } else {
            print('Nao Funcionou!');
        }
    }

    public function enviar() {
        ##---------------------------------------------------
        ##  Envio de Emails pelo SMTP Autênticado usando PEAR
        ##---------------------------------------------------
        # Mais detalhes sobre o PEAR:
        #   http://pear.php.net/
        #
        # Mais detalhes sobre o PEAR Mail:
        #   http://pear.php.net/manual/en/package.mail.mail-mime.php
        ##---------------------------------------------------
        # Faz o include do PEAR Mail e do Mime.
        include ("Mail.php");
        include ("Mail/mime.php");

        # E-mail de destino. Caso seja mais de um destino, crie um array de e-mails.
        # *OBRIGATÓRIO*
        $recipients = 'contato@carnavalnaindra.com.br';

        # Cabeçalho do e-mail.
        $headers = array(
                    'From' => 'contato@carnavalnaindra.com.br', # O 'From' é *OBRIGATÓRIO*.
                    'To' => 'wfpimentel@indracompany.com',
                    'Subject' => 'Teste',
                    'Date' => date('r')
        );

        # Utilize esta opção caso deseje definir o e-mail de resposta
        # $headers['Reply-To'] = 'EMailDeResposta@DominioDeResposta.com';
        # Utilize esta opção caso deseje definir o e-mail de retorno em caso de erro de envio
        # $headers['Errors-To'] = 'EMailDeRerornoDeERRO@DominioDeretornoDeErro.com';
        # Utilize esta opção caso deseje definir a prioridade do e-mail
        # $headers['X-Priority'] = '3'; # 1 UrgentMessage, 3 Normal
        # Define o tipo de final de linha.
        $crlf = "\r\n";

        # Corpo da Mensagem e texto e em HTML
        $text = 'Teste texto';
        $html = "<HTML><BODY><font color=blue>$text</font></BODY></HTML>";


        # Instancia a classe Mail_mime
        $mime = new Mail_mime($crlf);

        # Coloca o HTML no email
        $mime->setHTMLBody($html);


##  # Anexa um arquivo ao email.
##  $mime->addAttachment('/home/suapastahome/www/seuarquivo.txt');
        # Procesa todas as informações.
        $body = $mime->get();
        $headers = $mime->headers($headers);

        # Parâmetros para o SMTP. *OBRIGATÓRIO*
        $params = array(
                    'auth' => true, # Define que o SMTP requer autenticação.
                    'host' => 'smtp.carnavalnaindra.com.br', # Servidor SMTP
                    'username' => 'contato=carnavalnaindra.com.br', # Usuário do SMTP
                    'password' => 'ContatoCarnaval@2017' # Senha do seu MailBox.
        );

        # Define o método de envio
        $mail_object = & Mail::factory('smtp', $params);

        # Envia o email. Se não ocorrer erro, retorna TRUE caso contrário, retorna um
        # objeto PEAR_Error. Para ler a mensagem de erro, use o método 'getMessage()'.
        $result = $mail_object->send($recipients, $headers, $body);
        if (PEAR::IsError($result)) {
            echo "ERRO ao tentar enviar o email. (" . $result->getMessage() . ")";
        } else {
            echo "Email enviado com sucesso!";
        }
    }

}
