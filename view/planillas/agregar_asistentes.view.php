<!-- Vista para pantalla de login -->
<div class="row">
    <div class="col-md-12">
        <h2 align="Center"><b>Datos generales de la planilla</b></h2>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <b><?php echo "ID unico de la planilla : "?><br><br>
        <?php echo "Fecha del evento/reunion : "?><br><br>
        <?php echo "Evento/reunion : "?><br><br>
        <?php echo "Descripcion : "?><br><br>
        <?php echo "Lugar de realizacion : "?><br><br>
    </div>

    <div class="col-md-3">
        <?php echo $planilla->id; ?><br><br>
        <?php echo $planilla->fecha; ?><br><br>
        <?php echo $planilla->titulo; ?><br><br>
        <?php echo $planilla->descripcion; ?><br><br>
        <?php echo $planilla->lugar; ?><br><br>

        <?php if ($planilla->politica == "1") echo "Equidad de genero"; ?>
        <?php if ($planilla->politica == "2") echo "Discapacidad"; ?>
        <?php if ($planilla->politica == "3") echo "Seguridad y convivencia"; ?>
        <?php if ($planilla->politica == "4") echo "Primera infancia"; ?>
        <?php if ($planilla->politica == "5") echo "Juventudes"; ?>
        <?php if ($planilla->politica == "6") echo "Presupuesto participativo"; ?>
        <?php if ($planilla->politica == "7") echo "Migraciones"; ?>
        <?php if ($planilla->politica == "8") echo "Adulto mayor"; ?>
    </div>

    <div class="col-md-6">
        <h3 align="Center">Agregar un nuevo Asistente</h3>

        <form method="post" action="?c=Planillas&a=validarDocumento&token=<?php echo @$_GET['token']; ?>">
                <input type="hidden" name="id" value="<?php echo $planilla->id; ?>" />

                <div class="form-group col-md-12" style="display: block;">
                    <input type="text" class="form-control form-control-lg" style="font-size: 10pt;" name="identificacion" placeholder="" required value="<?php echo $asistente->identificacion; ?>" autocomplete="off" />
                    <small id="emailHelp" class="form-text text-muted">Identificacion</small><br>
                </div>

                <div class="form-group col-md-12" style="display: block;">
                    <button type="submit" class="btn btn-info btn-xl btn-block" name="go" class="btn btn-lg btn-default btn-block">Verificar documento de identificacion</button><hr>
                </div>
        </form>
    </div>
</div>

<hr>


<div class="row">


    <div class="col-md-12">
        <h3 align="Center"><b>Listado de asistentes registrados ( <?php echo count($listadoAsistentes); ?> )</b></h3><br>

        <table class="table table-bordered">
                <tr bgcolor="#58D68D">
                    <td><b>Identificacion</b></td>
                    <td><b>Nombres</b></td>
                    <td><b>Apellidos</b></td>
                    <td><b>Comuna</b></td>
                    <td><b>Direccion</b></td>
                    <td><b>Zona</b></td>
                    <td><b>Telefono</b></td>
                    <td><b>Edad</b></td>
                    <td><b>Genero</b></td>
                    <td></td>
                </tr>
            <tbody>
                <?php foreach ($listadoAsistentes as $r){ ?>

                <tr>
                    <th scope="row"><?php echo $r->identificacion; ?></th>
                    <td><?php echo $r->nombre1 . " " . $r->nombre2; ?></td>
                    <td><?php echo $r->apellido1 . " " . $r->apellido2; ?></td>
                    <td><?php echo $r->comuna; ?></td>
                    <td><?php echo $r->direccion; ?></td>
                    <td><?php echo $r->zona; ?></td>
                    <td><?php echo $r->telefono; ?></td>
                    <td><?php echo $r->edad; ?></td>
                    <td><?php echo $r->genero; ?></td>
                    <td>
                        <a onclick="javascript:return confirm('¿ Seguro de BORRAR este asistente de la actual planilla ?');" href='?c=Planillas&a=desvincularAsistente&identificacion=<?php echo $r->identificacion; ?>&id=<?php echo $planilla->id; ?>&token=<?php echo @$_GET['token']; ?>'>
                            <button class="btn btn-danger btn-xs" name="borrar" id="borrar">Borrar</button>
                        </a>
                    </td>

                </tr>

                <?php } ?>


            </tbody>
        </table>
    </div>

</div>

<hr>