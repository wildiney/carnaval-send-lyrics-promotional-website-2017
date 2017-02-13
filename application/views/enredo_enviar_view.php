<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="banner">
                <img src="<?php echo base_url() ?>assets/img/banner-enredo.jpg" class="img-responsive" >
            </div>
        </div>
    </div>

    <form action="/enredo/enviar" method="POST" enctype="multipart/form-data">
        <div class="row sections">
            <div class="col-sm-6 ">
                <div class="form-group">
                    <label for="matricula">Matrícula</label>
                    <input type="number" class="form-control" id="matricula" name="matricula" placeholder="MATRÍCULA" readonly="readonly" value="<?php echo $this->session->userdata("matricula"); ?>"  required="required">
                </div>
                <div class="form-group">
                    <label for="compositor">Compositor</label>
                    <input type="text" class="form-control" id="compositor" name="compositor" readonly="readonly" value="<?php echo $this->session->userdata("nome"); ?>" placeholder=""  required="required">
                </div>
                <div class="form-group">
                    <label for="titulo-enredo">Título do Enredo</label>
                    <input type="text" class="form-control" id="titulo-enredo" name="titulo-enredo" placeholder=""  required="required">
                </div>


                <div class="form-group">
                    <label for="matricula">Imagem ilustrativa (opcional)</label>

                    <div class="input-group">
                        <span class="input-group-btn">
                            <label class="btn btn-default btn-file">
                                <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                                <input type="file" id="file" name="file" style="display: none;">
                            </label>
                        </span>
                        <input type="text" id="inputFileName" name="inputFileName" class="form-control inputs" placeholder="apenas *.jpg ou *.png até 100kb">
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="aceite" name="aceite" value="1"  required="required"> Li e concordo com o <a href="/regulamento">regulamento</a> do concurso cultural
                    </label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="matricula">Enredo</label>
                    <textarea class="form-control" id="enredo" name="enredo" placeholder="" rows="12"  required="required" style="height: 260px"></textarea>
                </div>
                <input type="submit" name="participar" class="btn btn-default" value="PARTICIPAR">
            </div>
        </div>
    </form>
</div>