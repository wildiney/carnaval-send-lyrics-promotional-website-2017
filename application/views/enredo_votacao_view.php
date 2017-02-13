<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="banner">
                <img src="<?php echo base_url()?>assets/img/banner-votacao.jpg" class="img-responsive" >
            </div>
        </div>
    </div>
    <div class="row enredos">
        <?php foreach ($resultados as $item): ?>
                <input type="hidden" name="matricula" value="<?php echo $this->session->userdata("matricula"); ?>">
                <input type="hidden" name="idEnredo" value="<?php echo $item->e_idEnredo; ?>">
                <div class="col-sm-6">
                    <div class='card' id="<?php echo "#" . $item->e_idEnredo; ?>">
                        <div class="like">
                            <?php 
                            if (!is_null($this->session->userdata("matricula")) && $item->v_matricula==$this->session->userdata("matricula")): ?>
                            <a href="/enredo/like/<?php echo $item->e_idEnredo; ?>" class="btn"><span class="glyphicon glyphicon-heart red" aria-hidden="true"></span> <?php echo $item->total; ?></a>
                            <?php else: ?>
                            <a href="/enredo/like/<?php echo $item->e_idEnredo; ?>" class="btn"><span class="glyphicon glyphicon-heart gray" aria-hidden="true"></span> <?php echo $item->total; ?></a>
                            <?php endif; ?>
                        </div>
                        <p class="title"><?php echo $item->e_tituloEnredo; ?></p>
                        <p class='author'><?php echo $item->e_compositor; ?> - <?php echo $item->u_cidade; ?></p>
                        <div class="row">
                        <div class="col-sm-4">
                            <div style="border:1px solid gray; border-radius:5px; height:150px; width:150px; background: url(<?php echo base_url()  . $item->imagem; ?>) no-repeat center center; background-size:cover"></div>
                        </div>
                        <div class="col-sm-8">
                            <div class="boxEnredo">
                                <?php echo nl2br($item->e_enredo); ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
</div>