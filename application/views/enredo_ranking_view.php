<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="banner">
                <img src="<?php echo base_url()?>assets/img/banner-ranking.jpg" class="img-responsive" >
            </div>
        </div>
    </div>
    <div class="row enredos">
        <div class="col-sm-12">
            <table class="table table-hover table-striped">
                <tr>
                    <th class="text-center">&nbsp;</th>
                    <th>Título</th>
                    <th>Compositor</th>
                    <th>Cidade</th>
                    <th class="text-center">Votos</th>
                </tr>
                <?php foreach ($resultados as $item): ?>
                    <tr>
                        <td valign="middle" style="display: table-cell; vertical-align: middle;"><div style="border:1px solid gray; border-radius:5px; height:30px; width:30px; background: url(<?php echo base_url() . $item->imagem; ?>) no-repeat center center; background-size:cover"></div></td>
                        <td valign="middle" style="display: table-cell; vertical-align: middle;"><?php echo $item->e_tituloEnredo; ?></td>
                        <td valign="middle" style="display: table-cell; vertical-align: middle;"><?php echo $item->e_compositor; ?></td>
                        <td valign="middle" style="display: table-cell; vertical-align: middle;"><?php echo $item->u_cidade; ?></td>
                        <td valign="middle" style="display: table-cell; vertical-align: middle; text-align: center;"><?php echo $item->total; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>