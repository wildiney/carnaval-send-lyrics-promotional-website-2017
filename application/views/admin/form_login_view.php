<div class="container">
    <div class="row login">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">LOGIN ADMIN</h3>
                </div>
                <div class="panel-body">
                    <p>Olá administrador(a) utilize o seu email e a sua fantástica senha para logar no administrativo.</p>
                    <form action="/AdminLogin" method="POST">
                        <div class="form-group">
                            <label for="email">EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required="required">
                        </div>
                        <div class="form-group">
                            <label for="senha">SENHA</label>
                            <input type="password" class="form-control" id="password" name="password" required="required">
                        </div>
                        <input type="submit" name="login" class="btn btn-default" value="LOGIN">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

