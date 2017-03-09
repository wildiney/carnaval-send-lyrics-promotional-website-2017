<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="banner">
                <img src="<?php echo base_url() ?>assets/img/banner-home.jpg" class="img-responsive" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php if ($resultados): ?>
                <h1>Enredos pendentes para aprovação</h1>
                <?php foreach ($resultados as $ependente): ?>
                    <table class="table table-bordered">
                        <input type="hidden" value="<?php echo $ependente->idEnredo ?>">
                        <tr>
                            <td style="width: 200px">
                                <p><strong><?php echo $ependente->tituloEnredo ?></strong></p>
                                <p><i><?php echo $ependente->compositor ?></i></p>
                                <p><small><?php echo $ependente->cidade ?></small></p>
                                <p><small><?php echo $ependente->created_at ?></small></p>
                            </td>
                            <td style="width: 250px">
                                <?php if($ependente->imagemIlustrativa):?>
                                <img src="<?php echo base_url() . $ependente->imagemIlustrativa; ?>" style="width:100%">
                                <?php endif;?>
                            </td>
                            <td>
                                <?php echo nl2br($ependente->enredo) ?>
                            </td>
                            <td style="width: 60px">
                                <form action="/AdminEnredo/" method="POST">
                                    <input hidden="idEnredo" name="idEnredo" value="<?php echo $ependente->idEnredo ?>">
                                    <input hidden="status" name="status" value="1">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                </form>
                            </td>
                            <td style="width: 60px">
                                <form action="/AdminEnredo/" method="POST">
                                    <input hidden="idEnredo" name="idEnredo" value="<?php echo $ependente->idEnredo ?>">
                                    <input hidden="status" name="status" value="2">
                                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                </form>
                            </td>
                        </tr>
                    </table>
                <?php endforeach; ?>
            <?php else: ?>
                <h1>Parabéns!</h1>
                <p>Não existem enredos pendentes para aprovação!</p>
            <?php endif; ?>
        </div>
    </div>
</div>

