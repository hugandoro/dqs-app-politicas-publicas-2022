<!-- Vista para pantalla de login -->
<div class="row">
    <div class="col-sm-12"><hr></div>

    <div class="col-sm-2"></div>
    <div class="col-sm-3">
        <center>
            <picture><img src="assets/img/politicas_publicas.png" class="img-fluid" width="100%"></picture>
        </center>
    </div>
    <div class="col-sm-5">
        <!-- El form de logueo hace un llamado al controlador Auth con la accion/metodo Autenticar -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ingreso contratistas | Registro planillas asistencias</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="?c=Auth&a=Autenticar" role="login">
                    <input type="text" name="usuario" placeholder="Usuario" required class="form-control" value="" autocomplete="off" />
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required autocomplete="off" />
                    <hr />
                    <button type="submit" name="go" class="btn btn-lg btn-default btn-block">Ingresar a plataforma</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-2"></div>

    <div class="col-sm-12"><hr></div>
</div>