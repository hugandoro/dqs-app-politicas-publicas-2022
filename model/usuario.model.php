<?php
class Usuario
{
	private $pdo;

	//RANGO DE PERMISOS
	//usuario_nivel = 1 - ADMINISTRADOR
	//usuario_nivel = 2 - USUARIO
	//****************/

	public function __CONSTRUCT(){
		try{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Acceder($usuario, $password){
		try 
		{
			$stm = $this->pdo->prepare(
                "SELECT * FROM usuarios WHERE usuario = ? AND password = ?"
            );

			$stm->execute(array($usuario,sha1($password)));
            
			$result = $stm->fetch(PDO::FETCH_OBJ);

            if(!is_object($result)){
                return new Usuario;
			} 
			else{
				return $result;
            }
		} 
		catch(Exception $e){
			die($e->getMessage());
		}
	}

}