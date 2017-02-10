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
            <h1>Enredos pendentes para aprovação</h1>
            <?php foreach ($resultados as $ependente): ?>
                <table class="table table-bordered">
                    <input type="hidden" value="<?php echo $ependente->idEnredo ?>">
                    <tr>
                        <td style="width: 200px">
                            <p><?php echo $ependente->tituloEnredo ?></p>
                            <p><?php echo $ependente->compositor ?></p>
                            <p><?php echo $ependente->cidade ?></p>
                            <p><?php echo $ependente->created_at ?></p>
                        </td>
                        <td>
                            <?php echo nl2br($ependente->enredo) ?>
                        </td>
                        <td style="width: 60px">
                            <form action="/admin/enredo/" method="POST">
                                <input hidden="idEnredo" name="idEnredo" value="<?php echo $ependente->idEnredo ?>">
                                <input hidden="status" name="status" value="1">
                                <button type="submit" class="btn btn-success">Aprovar</button>
                            </form>
                        </td>
                        <td style="width: 60px">
                            <form action="/admin/enredo/" method="POST">
                                <input hidden="idEnredo" name="idEnredo" value="<?php echo $ependente->idEnredo ?>">
                                <input hidden="status" name="status" value="2">
                                <button type="submit" class="btn btn-danger">Reprovar</button>
                            </form>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </div>
    </div>
</div>

