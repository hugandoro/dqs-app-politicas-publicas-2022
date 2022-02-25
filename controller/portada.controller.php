<?php
require_once 'model/usuario.model.php';
error_reporting(E_ALL ^ E_NOTICE);

class PortadaController
{
    private $auth, $modelUsuario;

    // Metodo constructor
    public function __CONSTRUCT()
    {
        $this->modelUsuario = new Usuario();
        $this->auth  = FactoryAuth::getInstance();

        // Hace un llamado al metodo estaAutenticado para validar si es una sesion registrada
        try {
            $this->auth->estaAutenticado();
        } catch (Exception $e) {
            //header('Location: index.php');
        }
    }

    // Metodo que estructura la pagina por defecto de la pantalla de logueo
    public function Index()
    {
        require_once 'view/header.view.php';
        require_once 'view/navbar.view.php';
        require_once 'view/portada/home.view.php';
        require_once 'view/footer.view.php';
    }

}
