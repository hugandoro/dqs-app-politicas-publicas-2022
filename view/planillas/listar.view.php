<!-- Vista para pantalla de login -->
<div class="row">
    <div class="col-sm-12">
        <h2 align="Center">Historico planillas de asistencia generadas</h2>
    </div>
</div>

<div class="row">

    <div class="col-sm-12">

        <br><br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Evento</th>
                    <th>Lugar</th>
                    <th style="width:21%;">Opciones Planilla</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // Recorrido de todos los registros para clasificar y mover los contadores segun estado de las PQR
                //echo $this->auth->usuario()->identificacion;
                foreach ($this->modelPlanilla->Listar($this->auth->usuario()->identificacion) as $r) {
                    echo "<tr>";
                    echo "<td>$r->id</td>";
                    echo "<td>$r->fecha</td>";
                    echo "<td>$r->titulo</td>";
                    echo "<td>$r->lugar</td>";

                    ?>

                    <td>
                        <!-- COLUMNA OPCIONES PLANILLAS -->
                        <?php if ($r->estado_planilla == 'Edicion') { ?>
                            <a href='?c=Planillas&a=Crud&id=<?php echo $r->id; ?>&token=<?php echo @$_GET['token']; ?>'>
                            <button class="btn btn-success btn-xs" name="btn-filtrar" id="btn-filtrar">Editar</button>
                            </a>

                            <a href='?c=Planillas&a=agregarAsistente&id=<?php echo $r->id; ?>&token=<?php echo @$_GET['token']; ?>'>
                                <button class="btn btn-success btn-xs" name="btn-filtrar" id="btn-filtrar">Asistencia</button>
                            </a>

                            <a onclick="javascript:return confirm('¿ Seguro de CERRAR esta planilla ? Despues de cerrada no podra agregar mas asistentes...');" href='?c=Planillas&a=cerrarPlanilla&id=<?php echo $r->id; ?>&token=<?php echo @$_GET['token']; ?>'>
                                <button class="btn btn-warning btn-xs" name="btn-filtrar" id="btn-filtrar">Cerrar</button>
                            </a>

                            <!--<a onclick="javascript:return confirm('¿ Seguro de ELI]MINAR esta planilla ? Esta accion es irreversible...');" href='?c=Planillas&a=Crud&id=<?php echo $r->id; ?>&token=<?php echo @$_GET['token']; ?>'>
                            <button class="btn btn-danger btn-xs" name="btn-filtrar" id="btn-filtrar">Borrar</button>
                            </a>-->
                        <?php } ?>

                        <?php if ($r->estado_planilla == 'Cerrada') { ?>
                            <a href='?c=Planillas&a=listarAsistencia&id=<?php echo $r->id; ?>&token=<?php echo @$_GET['token']; ?>'>
                            <button class="btn btn-info btn-xs" name="btn-filtrar" id="btn-filtrar">Listar asistencia</button>
                            </a>
                        <?php } ?>

                    </td>
                    
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

</div>

<hr>