<?php
require_once 'model/usuario.model.php';
require_once 'model/planilla.model.php';
require_once 'model/ciudadano.model.php';

error_reporting(E_ALL ^ E_NOTICE);

class CiudadanosController{
    private $auth, $modelUsuario, $modelPlanilla, $modelCiudadano;

    // Metodo constructor
    public function __CONSTRUCT()
    {
        $this->modelUsuario = new Usuario();
        $this->modelPlanilla = new Planilla();
        $this->modelCiudadano = new Ciudadano();
        $this->auth  = FactoryAuth::getInstance();

        // Hace un llamado al metodo estaAutenticado para validar si es una sesion registrada
        try {
            $this->auth->estaAutenticado();
        } catch (Exception $e) {
            //header('Location: index.php');
        }
    }    
    
}