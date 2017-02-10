<div class="container">
    <div class="row login">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">LOGIN</h3>
                </div>
                <div class="panel-body">
                    <p>Para participar do concurso de Carnaval da Indra é necessário estar logado no site.</p>
                    <form action="/login" method="POST">
                        <div class="form-group">
                            <label for="matricula">Matrícula</label>
                            <input type="number" class="form-control" id="matricula" name="matricula" placeholder="MATRÍCULA" required="required">
                        </div>
                        <div class="form-group">
                            <label for="data-de-nascimento">Data de Nascimento</label>
                            <input type="text" class="form-control" id="data-de-nascimento" name="data-de-nascimento" placeholder="00/00/0000" required="required">
                        </div>
                        <input type="submit" name="login" class="btn btn-default" value="LOGIN">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

