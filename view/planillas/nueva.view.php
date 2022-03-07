<!-- Vista para pantalla de login -->
<div class="row">
    <div class="col-sm-12">
        <h2 align="Center">Nueva planilla de asistencia</h2>
    </div>
</div>

<div class="row">
    <div class="col-sm-3">
        <center>
            <picture><img src="assets/img/politicas_publicas.png" class="img-fluid" width="100%"></picture>
        </center>
    </div>

    <div class="col-sm-9">

        <form method="post" action="?c=Planillas&a=guardarPlanilla&token=<?php echo @$_GET['token']; ?>">
            <div class="form-group">
                <input type="date" class="form-control form-control-lg" style="font-size: 16pt;" name="fechaReunion" placeholder="" required value="" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Fecha de la actividad</small><br><br>

                <input type="text" class="form-control form-control-lg" style="font-size: 16pt;" name="tituloReunion" placeholder="" required value="" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Digite un titulo para la reunion/actividad/evento</small><br><br>

                <input type="text" class="form-control form-control-lg" style="font-size: 16pt;" name="descripcionReunion" placeholder="" required value="" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Digite una breve descripcion de los temas a tratar</small><br><br>

                <input type="text" class="form-control form-control-lg" style="font-size: 16pt;" name="lugarReunion" placeholder="" required value="" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Digite la direccion donde se lleva a cabo la reunion/actividad/evento</small><br><br>

                <fieldset>
                <div class="col-sm-3">
                    <input type="checkbox" value="Equidad de genero" name="equidad_de_genero">
                    <label>Equidad de genero</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Discapacidad" name="discapacidad">
                    <label>Discapacidad</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Seguridad y convivencia" name="seguridad_y_convivencia">
                    <label>Seguridad y convivencia</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Primera infancia" name="primera_infancia">
                    <label>PIIA</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Juventudes" name="juventudes">
                    <label>Juventudes</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Presupuesto participativo" name="presupuesto_participativo">
                    <label>Presupuesto participativo</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Migraciones" name="migraciones">
                    <label>Migraciones</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Adulto mayor" name="adulto_mayor">
                    <label>Adulto mayor</label>
                </div>
                </fieldset>

                <small id="emailHelp" class="form-text text-muted">Seleccione las políticas públicas vinculadas a esta actividad</small>

                <br><br>
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-lg" name="go" class="btn btn-lg btn-default btn-block">Guardar planilla</button>
        </form>

    </div>

</div>

<hr>