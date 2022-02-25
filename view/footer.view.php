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

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/js/ini.js"></script>
<script src="assets/js/jquery.anexsoft-validator.js"></script>
</body>

</html>