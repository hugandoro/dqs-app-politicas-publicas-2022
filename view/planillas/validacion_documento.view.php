<!-- Vista para pantalla de login -->
<div class="row">
    <div class="col-md-12">
        <h2 align="Center">Datos generales de la planilla</h2>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-2">
        <b><?php echo "ID planilla" ?></b>
    </div>
    <div class="col-md-2">
        <b><?php echo "Fecha" ?></b>
    </div>
    <div class="col-md-2">
        <b><?php echo "Evento/reunion" ?></b>
    </div>
    <div class="col-md-2">
        <b><?php echo "Descripcion" ?></b>
    </div>
    <div class="col-md-2">
        <b><?php echo "Lugar de realizacion" ?></b>
    </div>
    <div class="col-md-2">
        <b><?php echo "Politica impactada" ?></b>
    </div>

    <div class="col-md-2">
        <?php echo $planilla->id; ?>
    </div>

    <div class="col-md-2">
        <?php echo $planilla->fecha; ?>
    </div>

    <div class="col-md-2">
        <?php echo $planilla->titulo; ?>
    </div>

    <div class="col-md-2">
        <?php echo $planilla->descripcion; ?>
     </div>

    <div class="col-md-2">
        <?php echo $planilla->lugar; ?>
    </div>

    <div class="col-md-2">
        <?php if ($planilla->politica == "1") echo "Equidad de genero"; ?>
        <?php if ($planilla->politica == "2") echo "Discapacidad"; ?>
        <?php if ($planilla->politica == "3") echo "Seguridad y convivencia"; ?>
        <?php if ($planilla->politica == "4") echo "Primera infancia"; ?>
        <?php if ($planilla->politica == "5") echo "Juventudes"; ?>
        <?php if ($planilla->politica == "6") echo "Presupuesto participativo"; ?>
        <?php if ($planilla->politica == "7") echo "Migraciones"; ?>
        <?php if ($planilla->politica == "8") echo "Adulto mayor"; ?>
    </div>

</div>

<hr>


<div class="row">

    <div class="col-md-12">
        <h3 align="Center">Datos del asistente...</h3>

        <form method="post" action="?c=Planillas&a=guardarAsistente&token=<?php echo @$_GET['token']; ?>">
            <input type="hidden" name="id" value="<?php echo $planilla_id; ?>" />


            <?php 
                //var_dump($ficha_ciudadano);
                //var_dump($ficha_sisben);

                // CASO UNO - Ya existe en la tabla Ciudadano 
                if (!empty($ficha_ciudadano)) {
                    $asistente_identificacion = $identificacion;

                    $asistente_nombre1 = $ficha_ciudadano->nombre1;
                    $asistente_nombre2 = $ficha_ciudadano->nombre2;
                    $asistente_apellido1 = $ficha_ciudadano->apellido1;
                    $asistente_apellido2 = $ficha_ciudadano->apellido2;
                    $asistente_direccion = $ficha_ciudadano->direccion;
                    $asistente_comuna = $ficha_ciudadano->comuna;
                    $asistente_telefono = $ficha_ciudadano->telefono;
                    $asistente_edad = $ficha_ciudadano->edad;
                    $asistente_correo = $ficha_ciudadano->correo;
                    $asistente_genero = $ficha_ciudadano->genero;
                    $asistente_barrio = $ficha_ciudadano->barrio;
                    $asistente_caracterizacion = $ficha_ciudadano->caracterizacion;
                    $asistente_zona = $ficha_ciudadano->zona;

                }

                // CASO DOS - NO existe en la tabla Ciudadano PERO SI existe en SISBEN
                if ((empty($ficha_ciudadano)) and (!empty($ficha_sisben))) {
                    $asistente_identificacion = $identificacion;

                    $asistente_nombre1 = $ficha_sisben->nombre_1;
                    $asistente_nombre2 = $ficha_sisben->nombre_2;
                    $asistente_apellido1 = $ficha_sisben->apellido_1;
                    $asistente_apellido2 = $ficha_sisben->apellido_2;
                    $asistente_direccion = $ficha_sisben->direccion;
                    $asistente_comuna = $ficha_sisben->comuna;
                    $asistente_telefono = $ficha_sisben->telefono;
                    $asistente_edad = $ficha_sisben->edad;
                    $asistente_correo = '';
                    $asistente_genero = '';

                    $codigoBarrio = $this->modelBarrio->consultarPorNombre($ficha_sisben->barrio); // Consulta especial por nombre del barrio para traer el codigo
                    $asistente_barrio = $codigoBarrio->codigo; // Asignacion del codigo encontrado

                    $asistente_caracterizacion = '';
                    $asistente_zona = '';
                }

                // CASO TRES - NO existe en la tabla Ciudadano y NO existe en SISBEN
                if ((empty($ficha_ciudadano)) and (empty($ficha_sisben))) {
                    $asistente_identificacion = $identificacion;

                    $asistente_nombre1 = '';
                    $asistente_nombre2 = '';
                    $asistente_apellido1 = '';
                    $asistente_apellido2 = '';
                    $asistente_direccion = '';
                    $asistente_comuna = '';
                    $asistente_telefono = '';
                    $asistente_edad = '';
                    $asistente_correo = '';
                    $asistente_genero = '';
                    $asistente_barrio = '';
                    $asistente_caracterizacion = '';
                    $asistente_zona = '';
                } 
            ?>

            <div class="form-group col-md-3" style="display: block;">
                <input type="text" class="form-control form-control-lg" style="font-size: 10pt;" name="nombre1" placeholder="" required value="<?php echo $asistente_nombre1; ?>" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Primer nombre</small><br><br>
            </div>

            <div class="form-group col-md-3" style="display: block;">
                <input type="text" class="form-control form-control-lg" style="font-size: 10pt;" name="nombre2" placeholder="" value="<?php echo $asistente_nombre2; ?>" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Segundo nombre</small><br><br>
            </div>

            <div class="form-group col-md-3" style="display: block;">
                <input type="text" class="form-control form-control-lg" style="font-size: 10pt;" name="apellido1" placeholder="" required value="<?php echo $asistente_apellido1; ?>" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Primer apellido</small><br><br>
            </div>

            <div class="form-group col-md-3" style="display: block;">
                <input type="text" class="form-control form-control-lg" style="font-size: 10pt;" name="apellido2" placeholder="" value="<?php echo $asistente_apellido2; ?>" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Segundo apellido</small><br><br>
            </div>

            <div class="form-group col-md-2" style="display: block;">
                <input type="text" class="form-control form-control-lg" style="font-size: 10pt;" name="identificacion" placeholder="" required value="<?php echo $asistente_identificacion; ?>" autocomplete="off" readonly />
                <small id="emailHelp" class="form-text text-muted">Identificacion</small><br>
            </div>

            <div class="form-group col-md-2" style="display: block;">
                <input type="email" class="form-control form-control-lg" style="font-size: 10pt;" name="correo" placeholder="" value="<?php echo $asistente_correo; ?>" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Correo electronico</small><br><br>
            </div>

            <div class="form-group col-md-2" style="display: block;">
                <input type="number" class="form-control form-control-lg" style="font-size: 10pt;" name="telefono" placeholder="" required value="<?php if ($asistente_telefono == '') echo '0'; else echo $asistente_telefono; ?>" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Telefono de contacto</small><br><br>
            </div>

            <div class="form-group col-md-2" style="display: block;">
                <input type="number" class="form-control form-control-lg" style="font-size: 10pt;" name="edad" placeholder="" required value="<?php if ($asistente_edad == '') echo '0'; else echo $asistente_edad; ?>" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Edad</small><br>
            </div>

            <div class="form-group col-md-4" style="display: block;">
                <select class="form-control form-control-lg" style="font-size: 12pt;" name="genero" placeholder="" required value="" autocomplete="off" />
                    <option value="<?php echo $asistente_genero; ?>" selected><?php echo $asistente_genero; ?></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Genero</small><br><br>
            </div>

            <div class="form-group col-md-3" style="display: block;">
                <input type="text" class="form-control form-control-lg" style="font-size: 10pt;" name="direccion" placeholder="" required value="<?php echo $asistente_direccion; ?>" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Direccion</small><br><br>
            </div>

            <div class="form-group col-md-3" style="display: block;">
                <select class="form-control form-control-lg" style="font-size: 12pt;" name="barrio" placeholder="" required value="" autocomplete="off" />
                    <?php 
                        foreach ($listadoBarrios as $r) {
                            if ($asistente_barrio == $r->codigo)
                                echo "<option value='$r->codigo' selected>$r->nombre</option>";
                            else
                                echo "<option value='$r->codigo'>$r->nombre</option>";
                        } 
                     ?>
                </select>
                <small id="emailHelp" class="form-text text-muted">Barrio</small><br><br>


            </div>

            <div class="form-group col-md-3" style="display: block;">
                <select class="form-control form-control-lg" style="font-size: 12pt;" name="comuna" placeholder="" required value="" autocomplete="off" />
                    <option value="<?php echo $asistente_comuna; ?>" selected><?php echo $asistente_comuna; ?></option>
                    <option value="Comuna 1">Comuna 1</option>
                    <option value="Comuna 2">Comuna 2</option>
                    <option value="Comuna 3">Comuna 3</option>
                    <option value="Comuna 4">Comuna 4</option>
                    <option value="Comuna 5">Comuna 5</option>
                    <option value="Comuna 6">Comuna 6</option>
                    <option value="Comuna 7">Comuna 7</option>
                    <option value="Comuna 8">Comuna 8</option>
                    <option value="Comuna 9">Comuna 9</option>
                    <option value="Comuna 10">Comuna 10</option>
                    <option value="Comuna 11">Comuna 11</option>
                    <option value="Comuna 12">Comuna 12</option>
                    <option value="Las Marcadas">Las Marcadas</option>
                    <option value="Alto El Nudo">Alto El Nudo</option>
                    <option value="Otro municipio">Otro municipio</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Comuna</small><br><br>
            </div>

            <div class="form-group col-md-3" style="display: block;">
                <select class="form-control form-control-lg" style="font-size: 12pt;" name="zona" placeholder="" required value="" autocomplete="off" />
                    <option value="<?php echo $asistente_zona; ?>" selected><?php echo $asistente_zona; ?></option>
                    <option value="Urbuna">Urbuna</option>
                    <option value="Rural">Rural</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Zona</small><br><br>
            </div>

            <div class="form-group col-md-12" style="display: block;">
                <fieldset>
                <div class="col-sm-3">
                    <input type="checkbox" value="Primera infancia" name="primera_infancia" <?php if ($ficha_ciudadano->primera_infancia !='') echo "checked"; ?>>
                    <label>Primera infancia</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Infancia" name="infancia" <?php if ($ficha_ciudadano->infancia !='') echo "checked"; ?>>
                    <label>Infancia</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Adolescencia" name="adolescencia" <?php if ($ficha_ciudadano->adolescencia !='') echo "checked"; ?>>
                    <label>Adolescencia</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Jovenes" name="jovenes" <?php if ($ficha_ciudadano->jovenes !='') echo "checked"; ?>>
                    <label>Jovenes</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Adultos" name="adultos" <?php if ($ficha_ciudadano->adultos !='') echo "checked"; ?>>
                    <label>Adultos</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Adultos mayores" name="adultos_mayores" <?php if ($ficha_ciudadano->adultos_mayores !='') echo "checked"; ?>>
                    <label>Adultos mayores</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Madres comunitarias" name="madres_comunitarias" <?php if ($ficha_ciudadano->madres_comunitarias !='') echo "checked"; ?>>
                    <label>Madres comunitarias</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Afrodescendientes" name="afrodescendientes" <?php if ($ficha_ciudadano->afrodescendientes !='') echo "checked"; ?>>
                    <label>Afrodescendientes</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Mujer cabeza de hogar" name="mujer_cabeza_de_hogar" <?php if ($ficha_ciudadano->mujer_cabeza_de_hogar !='') echo "checked"; ?>>
                    <label>Mujer cabeza de hogar</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Estudiantes" name="estudiantes" <?php if ($ficha_ciudadano->estudiantes !='') echo "checked"; ?>>
                    <label>Estudiantes</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Empresarios" name="empresarios" <?php if ($ficha_ciudadano->empresarios !='') echo "checked"; ?>>
                    <label>Empresarios</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Docentes" name="docentes" <?php if ($ficha_ciudadano->docentes !='') echo "checked"; ?>>
                    <label>Docentes</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Persona con discapacidad" name="persona_con_discapacidad" <?php if ($ficha_ciudadano->persona_con_discapacidad !='') echo "checked"; ?>>
                    <label>Persona con discapacidad</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Victima de la violencia" name="victima_de_la_violencia" <?php if ($ficha_ciudadano->victima_de_la_violencia !='') echo "checked"; ?>>
                    <label>Victima de la violencia</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Indigenas" name="indigenas" <?php if ($ficha_ciudadano->indigenas !='') echo "checked"; ?>>
                    <label>Indigenas</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Migrados" name="migrados" <?php if ($ficha_ciudadano->migrados !='') echo "checked"; ?>>
                    <label>Migrados</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Campesinos" name="campesinos" <?php if ($ficha_ciudadano->campesinos !='') echo "checked"; ?>>
                    <label>Campesinos</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Habitante de calle" name="habitante_de_calle" <?php if ($ficha_ciudadano->habitante_de_calle !='') echo "checked"; ?>>
                    <label>Habitante de calle</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Lideres comunitarios" name="lideres_comunitarios" <?php if ($ficha_ciudadano->lideres_comunitarios !='') echo "checked"; ?>>
                    <label>Lideres comunitarios</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="LGTBI" name="lgtbi" <?php if ($ficha_ciudadano->lgtbi !='') echo "checked"; ?>>
                    <label>LGTBI</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Funcionarios" name="funcionarios" <?php if ($ficha_ciudadano->funcionarios !='') echo "checked"; ?>>
                    <label>Funcionarios</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Contratistas" name="contratistas" <?php if ($ficha_ciudadano->contratistas !='') echo "checked"; ?>>
                    <label>Contratistas</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" value="Comunidad organizada" name="comunidad_organizada" <?php if ($ficha_ciudadano->comunidad_organizada !='') echo "checked"; ?>>
                    <label>Comunidad organizada</label>
                </div>
                </fieldset>

                <small id="emailHelp" class="form-text text-muted">Caracterizacion del ciudadano</small><br><br>
            </div>

            <div class="form-group col-md-12" style="display: block;">
                <button type="submit" class="btn btn-info btn-xl btn-block" name="go" class="btn btn-lg btn-default btn-block">Agregar asistente >></button>
                <br>
            </div>
        </form>
    </div>

</div>

<hr>