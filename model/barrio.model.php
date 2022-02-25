<?php
class Barrio
{
	private $pdo;

	// Inicializa variables para campos que conforman la ficha del ciudadano
	public $barrio_codigo = '';
	public $barrio_nombre = '';

	// Metodo para iniciar el constructor
	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function consultar($codigo)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM barrios WHERE codigo = ?");

			$stm->execute(array($codigo));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function consultarPorNombre($nombre)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM barrios WHERE nombre = ?");

			$stm->execute(array($nombre));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function listar()
	{
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM barrios");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
