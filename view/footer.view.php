<!-- Leemos el contador de visitas -->
<?php
    $archivo = "contador.txt"; //el archivo que contiene en numero
    $f = fopen($archivo, "r"); //abrimos el archivo en modo de lectura
    if ($f) {
        $contador = fread($f, filesize($archivo)); //leemos el archivo
        fclose($f);
    }
?>
<!-- Fin lectura contador visitas-->


<!-- Pie de pagina -->
<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
        <div class="col-12 col-md">
            <center>
                <img class="mb-2" src="assets/img/escudo_dosquebradas.png" alt="" height="60">
                <img class="mb-2" src="assets/img/logo.png" alt="" height="70">
                <br><br>
                <small class="d-block mb-3 text-muted">Aplicativo de apoyo Observatorio Politicas Públicas Municipales (OPP Ver 1.0 beta)</small><br>
                <small class="d-block mb-3 text-muted">Alcaldia de Dosquebradas | Secretaria Municipal de Planeación</small><br>
                <small class="d-block mb-3 text-muted">&copy; 2020-2023</small><br>
            </center>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12" align="center">
                <div><br>Eres nuestra visita N° <b><?php echo $contador; ?></b><br><br></div>
            </div>
        </div>

    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="assets/js/jquery.anexsoft-validator.js"></script>
</body>

</html>