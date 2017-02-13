<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Carnaval 2017 - Enredos / <?php echo (isset($title))? $title : ""; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url(); ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>vendor/components/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <?php echo (isset($scripts))? $scripts : ""; ?>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="alert alert-warning">Você está usando um navegador <strong>desatualizado</strong>. Por favor, <a href="http://browsehappy.com/">atualize seu browser</a> para melhorar a sua experiência e segurança.</p>
        <![endif]-->
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="<?php echo base_url(); ?>assets/img/logo-carnaval.png" alt=""/></a>
                    
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/" class=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span> INÍCIO</a></li>
                        <li><a href="/regulamento" class=""><span class="glyphicon glyphicon-file" aria-hidden="true"></span> REGULAMENTO</a></li>
                        <?php if ($this->session->userdata('logged')): ?>
                        <li>
                            <a href="/login/logout" class=""><span class="glyphicon glyphicon-user" aria-hidden="true"></span> LOGOUT</a>
                        </li>
                        <?php else:  ?>
                        <li>
                            <a href="#" class="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> LOGIN</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


