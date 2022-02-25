<?php
require_once 'model/usuario.model.php';
require_once 'model/planilla.model.php';
require_once 'model/ciudadano.model.php';
require_once 'model/sisben.model.php';
require_once 'model/barrio.model.php';

error_reporting(E_ALL ^ E_NOTICE);

class PlanillasController{
    private $auth, $modelUsuario, $modelPlanilla;

    // Metodo constructor
    public function __CONSTRUCT()
    {
        $this->modelUsuario = new Usuario();
        $this->modelPlanilla = new Planilla();
        $this->modelCiudadano = new Ciudadano();
        $this->modelSisben = new Sisben();
        $this->modelBarrio = new Barrio();

        $this->auth  = FactoryAuth::getInstance();

        // Hace un llamado al metodo estaAutenticado para validar si es una sesion registrada
        try {
            $this->auth->estaAutenticado();
        } catch (Exception $e) {
            //header('Location: index.php');
        }
    }    

    // Metodo que estructura la pagina por defecto
    public function Index(){
        //Carga las vistas para presentar al usuario
        require_once 'view/header.view.php';
        require_once 'view/planillas/navbar.view.php';
        require_once 'view/planillas/listar.view.php';
        require_once 'view/footer.view.php';
    }

    // Metodo para cargar formulario de in greso nueva planilla
    public function nuevaPlanilla()
    {
        require_once 'view/header.view.php';
        require_once 'view/planillas/navbar.view.php';
        require_once 'view/planillas/nueva.view.php';
        require_once 'view/footer.view.php';
    }

    // Metodo para guardar una planilla
    public function guardarPlanilla()
    {
        $planilla = new Planilla();

        $planilla->planilla_fecha = $_REQUEST['fechaReunion'];
        $planilla->planilla_titulo = $_REQUEST['tituloReunion'];
        $planilla->planilla_descripcion = $_REQUEST['descripcionReunion'];
        $planilla->planilla_lugar = $_REQUEST['lugarReunion'];

        $planilla->planilla_equidad_de_genero = $_REQUEST['equidad_de_genero'];
        $planilla->planilla_discapacidad = $_REQUEST['discapacidad'];
        $planilla->planilla_seguridad_y_convivencia = $_REQUEST['seguridad_y_convivencia'];
        $planilla->planilla_primera_infancia = $_REQUEST['primera_infancia'];
        $planilla->planilla_juventudes = $_REQUEST['juventudes'];
        $planilla->planilla_presupuesto_participativo = $_REQUEST['presupuesto_participativo'];
        $planilla->planilla_migraciones = $_REQUEST['migraciones'];
        $planilla->planilla_adulto_mayor = $_REQUEST['adulto_mayor'];

        if(is_null($planilla->planilla_equidad_de_genero)) $planilla->planilla_equidad_de_genero = '';
        if(is_null($planilla->planilla_discapacidad)) $planilla->planilla_discapacidad = '';
        if(is_null($planilla->planilla_seguridad_y_convivencia)) $planilla->planilla_seguridad_y_convivencia = '';
        if(is_null($planilla->planilla_primera_infancia)) $planilla->planilla_primera_infancia = '';
        if(is_null($planilla->planilla_juventudes)) $planilla->planilla_juventudes = '';
        if(is_null($planilla->planilla_presupuesto_participativo)) $planilla->planilla_presupuesto_participativo = '';
        if(is_null($planilla->planilla_migraciones)) $planilla->planilla_migraciones = '';
        if(is_null($planilla->planilla_adulto_mayor)) $planilla->planilla_adulto_mayor = '';

        $planilla->planilla_usuario_id = '10031210';

        $planilla->planilla_id = $this->modelPlanilla->Registrar($planilla); //Registra y recibe el ID del nuevo registro

        header('Location: index.php?c=Planillas&a=Index&token=' . @$_GET['token']);



    }

    // Metodo que permite hacer CRUD con la base de datos
    public function Crud(){
        $planilla = new Planilla();
       
        // Valida si se recibe un ID - si existe es modo edicion y hace un llamado a obtener los datos del modelo
        if(isset($_REQUEST['id'])){
            $planilla = $this->modelPlanilla->Obtener($_REQUEST['id']); 
        }
        
        //Carga las vistas para presentar al usuario
        require_once 'view/header.view.php';
        require_once 'view/planillas/navbar.view.php';
        require_once 'view/planillas/nueva_editar.view.php';
        require_once 'view/footer.view.php';
    }

    // Metodo para guardar una planilla (ACTUALIZARLA)
    public function crudGuardarPlanilla()
    {
        $planilla = new Planilla();

        $planilla->planilla_id = $_REQUEST['id'];
        $planilla->planilla_fecha = $_REQUEST['fechaReunion'];
        $planilla->planilla_titulo = $_REQUEST['tituloReunion'];
        $planilla->planilla_descripcion = $_REQUEST['descripcionReunion'];
        $planilla->planilla_lugar = $_REQUEST['lugarReunion'];

        $planilla->planilla_equidad_de_genero = $_REQUEST['equidad_de_genero'];
        $planilla->planilla_discapacidad = $_REQUEST['discapacidad'];
        $planilla->planilla_seguridad_y_convivencia = $_REQUEST['seguridad_y_convivencia'];
        $planilla->planilla_primera_infancia = $_REQUEST['primera_infancia'];
        $planilla->planilla_juventudes = $_REQUEST['juventudes'];
        $planilla->planilla_presupuesto_participativo = $_REQUEST['presupuesto_participativo'];
        $planilla->planilla_migraciones = $_REQUEST['migraciones'];
        $planilla->planilla_adulto_mayor = $_REQUEST['adulto_mayor'];

        if(is_null($planilla->planilla_equidad_de_genero)) $planilla->planilla_equidad_de_genero = '';
        if(is_null($planilla->planilla_discapacidad)) $planilla->planilla_discapacidad = '';
        if(is_null($planilla->planilla_seguridad_y_convivencia)) $planilla->planilla_seguridad_y_convivencia = '';
        if(is_null($planilla->planilla_primera_infancia)) $planilla->planilla_primera_infancia = '';
        if(is_null($planilla->planilla_juventudes)) $planilla->planilla_juventudes = '';
        if(is_null($planilla->planilla_presupuesto_participativo)) $planilla->planilla_presupuesto_participativo = '';
        if(is_null($planilla->planilla_migraciones)) $planilla->planilla_migraciones = '';
        if(is_null($planilla->planilla_adulto_mayor)) $planilla->planilla_adulto_mayor = '';

        $planilla->planilla_usuario_id = '10031210';

        $this->modelPlanilla->Actualizar($planilla);

        header('Location: index.php?c=Planillas&a=Index&token=' . @$_GET['token']);



    }

    // Metodo para cerrar una planilla de su modo edicion (CERRAR PLANILLA)
    public function cerrarPlanilla()
    {
        $planilla = new Planilla();

        $planilla->planilla_id = $_REQUEST['id'];
        $this->modelPlanilla->Cerrar($planilla);

        header('Location: index.php?c=Planillas&a=Index&token=' . @$_GET['token']);
    }

    //Metodo para LISTAR los asistentes
    public function listarAsistencia()
    {
        $planilla = new Planilla();
       
        // Carga la planilla de la cual se listaran los asistentes
        $planilla = $this->modelPlanilla->Obtener($_REQUEST['id']); 

        // Obtiene los datos de los ciudadanos (Asistentes) - Planilla
        $listadoAsistentes = $this->modelPlanilla->listarAsistencia($_REQUEST['id']);
        
        //Carga las vistas para presentar al usuario
        require_once 'view/header.view.php';
        require_once 'view/planillas/navbar.view.php';
        require_once 'view/planillas/listar_asistentes.view.php';
        require_once 'view/footer.view.php';
    }

    // PASO 1 - Metodo para AGREGAR asistentes
    public function agregarAsistente()
    {
        $planilla = new Planilla();
       
        // Carga la planilla a la cual se vincularan los asistentes
        $planilla = $this->modelPlanilla->Obtener($_REQUEST['id']); 

        // Obtiene los datos de los ciudadanos (Asistentes) - Planilla
        $listadoAsistentes = $this->modelPlanilla->listarAsistencia($_REQUEST['id']);
        
        //Carga las vistas para presentar al usuario
        require_once 'view/header.view.php';
        require_once 'view/planillas/navbar.view.php';
        require_once 'view/planillas/agregar_asistentes.view.php';
        require_once 'view/footer.view.php';
    }

    // PASO 2 - Metodo para validar cedula digitada confrontando con BD Sisben y Ciudadanos propia, antes de AGREGAR un nuevo asistente
    public function validarDocumento()
    {
        $planilla = new Planilla();
        $ficha_sisben = new Sisben();
        $ficha_ciudadano = new Ciudadano();
        $barrio = new Barrio();

        // Carga la planilla a la cual se vincularan los asistentes
        $planilla = $this->modelPlanilla->Obtener($_REQUEST['id']); 

        //Valida que se este recibiendo un numero de documento para validar
        if (isset($_REQUEST['identificacion'])) {
            // Copia en variables locales el ID de la planilla y el N° de identificacion del ciudadano, para pasar por hidden en el Form
            $planilla_id = $_REQUEST['id'];
            $identificacion = $_REQUEST['identificacion'];

            // Consulta a las bases respectivas, la prioridad la tienen los registros de la base local Ciudadanos, luego Sisben
            $ficha_ciudadano = $this->modelCiudadano->consultar($_REQUEST['identificacion']);
            $ficha_sisben = $this->modelSisben->consultar($_REQUEST['identificacion']);

            // Listado de barrios
            $listadoBarrios = $this->modelBarrio->listar();

            require_once 'view/header.view.php';
            require_once 'view/planillas/navbar.view.php';
            require_once 'view/planillas/validacion_documento.view.php';
            require_once 'view/footer.view.php';
        }
    }

    // PASO 3 - Metodo para VINCULAR un asistente y de ser necesario INGRESARLO o ACTUALIZARLO a la base de Ciudadanos
    public function guardarAsistente()
    {
        $planilla = new Planilla();
        $ciudadano = new Ciudadano();
        $existeCiudadano = new Ciudadano();


        // Carga la planilla a la cual se vincularan los asistentes
        $planilla = $this->modelPlanilla->Obtener($_REQUEST['id']); 

        $ciudadano->ciudadano_identificacion = $_REQUEST['identificacion'];
        $ciudadano->ciudadano_nombre1 = $_REQUEST['nombre1'];
        $ciudadano->ciudadano_nombre2 = $_REQUEST['nombre2'];
        $ciudadano->ciudadano_apellido1 = $_REQUEST['apellido1'];
        $ciudadano->ciudadano_apellido2 = $_REQUEST['apellido2'];
        $ciudadano->ciudadano_direccion = $_REQUEST['direccion'];
        $ciudadano->ciudadano_comuna = $_REQUEST['comuna'];
        $ciudadano->ciudadano_telefono = $_REQUEST['telefono'];
        $ciudadano->ciudadano_edad = $_REQUEST['edad'];
        $ciudadano->ciudadano_correo = $_REQUEST['correo'];
        $ciudadano->ciudadano_genero = $_REQUEST['genero'];
        $ciudadano->ciudadano_barrio = $_REQUEST['barrio'];
        $ciudadano->ciudadano_zona = $_REQUEST['zona'];

        $ciudadano->ciudadano_primera_infancia = $_REQUEST['primera_infancia'];
        $ciudadano->ciudadano_infancia = $_REQUEST['infancia'];
        $ciudadano->ciudadano_adolescencia = $_REQUEST['adolescencia'];
        $ciudadano->ciudadano_jovenes = $_REQUEST['jovenes'];
        $ciudadano->ciudadano_adultos = $_REQUEST['adultos'];
        $ciudadano->ciudadano_adultos_mayores = $_REQUEST['adultos_mayores'];
        $ciudadano->ciudadano_madres_comunitarias = $_REQUEST['madres_comunitaria'];
        $ciudadano->ciudadano_afrodescendientes = $_REQUEST['afrodescendientes'];
        $ciudadano->ciudadano_mujer_cabeza_de_hogar = $_REQUEST['mujer_cabeza_de_hogar'];
        $ciudadano->ciudadano_estudiantes = $_REQUEST['estudiantes'];
        $ciudadano->ciudadano_empresarios = $_REQUEST['empresarios'];
        $ciudadano->ciudadano_docentes = $_REQUEST['docentes'];
        $ciudadano->ciudadano_persona_con_discapacidad = $_REQUEST['persona_con_discapacidad'];
        $ciudadano->ciudadano_victima_de_la_violencia = $_REQUEST['victima_de_la_violencia'];
        $ciudadano->ciudadano_indigenas = $_REQUEST['indigenas'];
        $ciudadano->ciudadano_migrados = $_REQUEST['migrados'];
        $ciudadano->ciudadano_campesinos = $_REQUEST['campesinos'];
        $ciudadano->ciudadano_habitante_de_calle = $_REQUEST['habitante_de_calle'];
        $ciudadano->ciudadano_lideres_comunitarios = $_REQUEST['lideres_comunitarios'];
        $ciudadano->ciudadano_lgtbi = $_REQUEST['lgtbi'];
        $ciudadano->ciudadano_funcionarios = $_REQUEST['funcionarios'];
        $ciudadano->ciudadano_contratistas = $_REQUEST['contratistas'];
        $ciudadano->ciudadano_comunidad_organizada = $_REQUEST['comunidad_organizada'];

        if(is_null($ciudadano->ciudadano_primera_infancia)) $ciudadano->ciudadano_primera_infancia = '';
        if(is_null($ciudadano->ciudadano_infancia)) $ciudadano->ciudadano_infancia = '';
        if(is_null($ciudadano->ciudadano_adolescencia)) $ciudadano->ciudadano_adolescencia = '';
        if(is_null($ciudadano->ciudadano_jovenes)) $ciudadano->ciudadano_jovenes = '';
        if(is_null($ciudadano->ciudadano_adultos)) $ciudadano->ciudadano_adultos = '';
        if(is_null($ciudadano->ciudadano_adultos_mayores)) $ciudadano->ciudadano_adultos_mayores = '';
        if(is_null($ciudadano->ciudadano_madres_comunitarias)) $ciudadano->ciudadano_madres_comunitarias = '';
        if(is_null($ciudadano->ciudadano_afrodescendientes)) $ciudadano->ciudadano_afrodescendientes = '';
        if(is_null($ciudadano->ciudadano_mujer_cabeza_de_hogar)) $ciudadano->ciudadano_mujer_cabeza_de_hogar = '';
        if(is_null($ciudadano->ciudadano_estudiantes)) $ciudadano->ciudadano_estudiantes = '';
        if(is_null($ciudadano->ciudadano_empresarios)) $ciudadano->ciudadano_empresarios = '';
        if(is_null($ciudadano->ciudadano_docentes)) $ciudadano->ciudadano_docentes = '';
        if(is_null($ciudadano->ciudadano_persona_con_discapacidad)) $ciudadano->ciudadano_persona_con_discapacidad = '';
        if(is_null($ciudadano->ciudadano_victima_de_la_violencia)) $ciudadano->ciudadano_victima_de_la_violencia = '';
        if(is_null($ciudadano->ciudadano_indigenas)) $ciudadano->ciudadano_indigenas = '';
        if(is_null($ciudadano->ciudadano_migrados)) $ciudadano->ciudadano_migrados = '';
        if(is_null($ciudadano->ciudadano_campesinos)) $ciudadano->ciudadano_campesinos = '';
        if(is_null($ciudadano->ciudadano_habitante_de_calle)) $ciudadano->ciudadano_habitante_de_calle = '';
        if(is_null($ciudadano->ciudadano_lideres_comunitarios)) $ciudadano->ciudadano_lideres_comunitarios = '';
        if(is_null($ciudadano->ciudadano_lgtbi)) $ciudadano->ciudadano_lgtbi = '';
        if(is_null($ciudadano->ciudadano_funcionarios)) $ciudadano->ciudadano_funcionarios = '';
        if(is_null($ciudadano->ciudadano_contratistas)) $ciudadano->ciudadano_contratistas = '';
        if(is_null($ciudadano->ciudadano_comunidad_organizada)) $ciudadano->ciudadano_comunidad_organizada = '';


        // Consulta de existe previamente un ciudadano con ese N° de identificacion
        $existeCiudadano = $this->modelCiudadano->consultar($_REQUEST['identificacion']);

        // Si no existe lo ingresa como nuevo a la BD Ciudadano
        if (empty($existeCiudadano)) 
            $this->modelCiudadano->Ingresar($ciudadano);
        // Si existe entonces procede a actualizar los datos en la BD Ciudadano
        else
            $this->modelCiudadano->Actualizar($ciudadano);

        // Crea la relacion de vinculacion Ciudadano - Planilla
        $this->modelPlanilla->vincularCiudadano($_REQUEST['identificacion'],$_REQUEST['id']);

        // Obtiene los datos de los ciudadanos (Asistentes) - Planilla
        $listadoAsistentes = $this->modelPlanilla->listarAsistencia($_REQUEST['id']);

        //header('Location: index.php?c=Planillas&a=Index&token=' . @$_GET['token']);
        header('Location: ?c=Planillas&a=agregarAsistente&id=' . $_REQUEST['id'] . '&token=' . @$_GET['token']);
    }

    // Desvincular un asistente de la planilla IDENTIFICACION (PERSONA) - ID (PLANILLA)
    public function desvincularAsistente()
    {
        $this->modelPlanilla->desvincularCiudadano($_REQUEST['identificacion'],$_REQUEST['id']);

        header('Location: ?c=Planillas&a=agregarAsistente&id=' . $_REQUEST['id'] . '&token=' . @$_GET['token']);
    }

    
}