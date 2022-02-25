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
        <h3 align="Center">Listado de asistentes registrados</h3>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Identificacion</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Comuna</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Zona</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Genero</th>
                </tr>
            </thead>
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
                </tr>

                <?php } ?>


            </tbody>
        </table>
    </div>

</div>

<hr>