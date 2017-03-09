
<footer class="footer navbar-fixed-bottom">
    <div class="row">
        <div class="col-sm-12 text-center">
            &copy 2017 - <a href="http://www.indracompany.com/pt-br/">indracompany.com</a>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">LOGIN</h4>
            </div>
            <div class="modal-body">
                <form action="/login" method="POST">
                    <div class="form-group">
                        <label for="matricula">Matrícula</label>
                        <input type="number" class="form-control" id="matricula" name="matricula" placeholder="MATRÍCULA" required="required">
                    </div>
                    <div class="form-group">
                        <label for="data-de-nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="data-de-nascimento" name="data-de-nascimento" placeholder="00/00/0000" required="required">
                    </div>
                    <input type="submit" name="login" class="btn btn-default" value="login">
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92197459-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="<?php echo base_url(); ?>vendor/components/modernizr/modernizr.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>vendor/igorescobar/jquery-mask-plugin/dist/jquery.mask.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js" type="text/javascript"></script>
</body>
</html>
