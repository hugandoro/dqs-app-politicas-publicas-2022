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

    <div class="col-md-12"><hr></div>

    <div class="col-md-12">
        <canvas id="porComuna"></canvas>
    </div>

    <div class="col-md-12"><hr></div>

    <div class="col-md-6">
        <canvas id="porZona"></canvas>
    </div>

    <div class="col-md-6">
        <canvas id="porGenero"></canvas>
    </div>

    <div class="col-md-12"><hr></div>

    <div class="col-md-12">
        <canvas id="porCaracterizacion"></canvas>
    </div>

    <div class="col-md-12"><hr></div>

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
                <?php foreach ($listadoAsistentes as $r) { ?>

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

<script src="../node_modules/chart.js/dist/chart.js"></script>

<!-- GRAFICA N° 1 - DISTRIBUCION POR COMUNAS -->
<script>
    const labelsComuna = [
        'Comuna 1',
        'Comuna 2',
        'Comuna 3',
        'Comuna 4',
        'Comuna 5',
        'Comuna 6',
        'Comuna 7',
        'Comuna 8',
        'Comuna 9',
        'Comuna 10',
        'Comuna 11',
        'Comuna 12',
        'Alto El Nudo',
        'Las Marcadas',
        'Otro municipio'
    ];

    const dataComuna = {
        labels: labelsComuna,
        datasets: [{
            label: 'Distribucion por Comunas',
            backgroundColor: 'rgb(108,70,117)',
            borderColor: 'rgb(108,70,117)',
            data: [ "<?php echo $contadorComuna[1]; ?>", 
                    "<?php echo $contadorComuna[2]; ?>", 
                    "<?php echo $contadorComuna[3]; ?>", 
                    "<?php echo $contadorComuna[4]; ?>", 
                    "<?php echo $contadorComuna[5]; ?>", 
                    "<?php echo $contadorComuna[6]; ?>", 
                    "<?php echo $contadorComuna[7]; ?>", 
                    "<?php echo $contadorComuna[8]; ?>", 
                    "<?php echo $contadorComuna[9]; ?>", 
                    "<?php echo $contadorComuna[10]; ?>", 
                    "<?php echo $contadorComuna[11]; ?>", 
                    "<?php echo $contadorComuna[12]; ?>", 
                    "<?php echo $contadorComuna[13]; ?>", 
                    "<?php echo $contadorComuna[14]; ?>", 
                    "<?php echo $contadorComuna[15]; ?>"]
        }]
    };

    const configComuna = {
        type: 'bar',
        data: dataComuna,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
</script>

<script>
    const myChartComuna = new Chart(
        document.getElementById('porComuna'),
        configComuna
    );
</script>
<!-- FIN GRAFICA N° 1 -->

<!-- GRAFICA N° 2 - DISTRIBUCION POR ZONA -->
<script>
    const labelsZona = [
        'Zona Urbana',
        'Zona Rural'
    ];

    const dataZona = {
        labels: labelsZona,
        datasets: [{
            label: 'Distribucion por tipo de Zona Geografica',
            backgroundColor: 'rgb(176,196,222)',
            borderColor: 'rgb(176,196,222)',
            data: [
                "<?php echo $contadorZona[0]; ?>", 
                "<?php echo $contadorZona[1]; ?>"
            ]
        }]
    };

    const configZona = {
        type: 'bar',
        data: dataZona,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
</script>

<script>
    const myChartZona = new Chart(
        document.getElementById('porZona'),
        configZona
    );
</script>
<!-- FIN GRAFICA N° 2 -->

<!-- GRAFICA N° 3 - DISTRIBUCION POR GENERO -->
<script>
    const labelsGenero = [
        'Masculino',
        'Femenino'
    ];

    const dataGenero = {
        labels: labelsGenero,
        datasets: [{
            label: 'Distribucion por Genero',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [
                "<?php echo $contadorGenero[0]; ?>", 
                "<?php echo $contadorGenero[1]; ?>"
            ]
        }]
    };

    const configGenero = {
        type: 'bar',
        data: dataGenero,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
</script>

<script>
    const myChartGenero = new Chart(
        document.getElementById('porGenero'),
        configGenero
    );
</script>
<!-- FIN GRAFICA N° 3 -->

<!-- GRAFICA N° 4 - DISTRIBUCION POR CARACTERIZACION USUARIOS -->
<script>
    const labelsCaracterizacion = [
        'Primera infancia',
        'Infancia',
        'Adolescencia',
        'Jovenes',
        'Adultos',
        'Adultos mayores',
        'Madres comunitarias',
        'Afrodescendientes',
        'Mujer cabeza de hogar',
        'Estudiantes',
        'Empresarios',
        'Docentes',
        'Persona con discapacidad',
        'Victima de la violencia',
        'Indigenas',
        'Migrados',
        'Campesinos',
        'Habitante de calle',
        'Lideres comunitarios',
        'LGTBI',
        'Funcionarios',
        'Contratistas',
        'Comunidad organizada'
    ];

    const dataCaracterizacion = {
        labels: labelsCaracterizacion,
        datasets: [{
            label: 'Distribucion por Caracterizacion',
            backgroundColor: 'rgb(212,93,72)',
            borderColor: 'rgb(212,93,72)',
            data: [ "<?php echo $contadorCaracterizacion[0]; ?>", 
                    "<?php echo $contadorCaracterizacion[1]; ?>",
                    "<?php echo $contadorCaracterizacion[2]; ?>", 
                    "<?php echo $contadorCaracterizacion[3]; ?>", 
                    "<?php echo $contadorCaracterizacion[4]; ?>", 
                    "<?php echo $contadorCaracterizacion[5]; ?>", 
                    "<?php echo $contadorCaracterizacion[6]; ?>", 
                    "<?php echo $contadorCaracterizacion[7]; ?>", 
                    "<?php echo $contadorCaracterizacion[8]; ?>", 
                    "<?php echo $contadorCaracterizacion[9]; ?>", 
                    "<?php echo $contadorCaracterizacion[10]; ?>", 
                    "<?php echo $contadorCaracterizacion[11]; ?>", 
                    "<?php echo $contadorCaracterizacion[12]; ?>", 
                    "<?php echo $contadorCaracterizacion[13]; ?>", 
                    "<?php echo $contadorCaracterizacion[14]; ?>", 
                    "<?php echo $contadorCaracterizacion[15]; ?>", 
                    "<?php echo $contadorCaracterizacion[16]; ?>", 
                    "<?php echo $contadorCaracterizacion[17]; ?>", 
                    "<?php echo $contadorCaracterizacion[18]; ?>", 
                    "<?php echo $contadorCaracterizacion[19]; ?>", 
                    "<?php echo $contadorCaracterizacion[20]; ?>", 
                    "<?php echo $contadorCaracterizacion[21]; ?>", 
                    "<?php echo $contadorCaracterizacion[22]; ?>"
                ]
        }]
    };

    const configCaracterizacion = {
        type: 'bar',
        data: dataCaracterizacion,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
</script>

<script>
    const myChartCaracterizacion = new Chart(
        document.getElementById('porCaracterizacion'),
        configCaracterizacion
    );
</script>
<!-- FIN GRAFICA N° 4 -->