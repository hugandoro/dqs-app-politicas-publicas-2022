<?php
class Sisben
{
	private $pdo;

	// Inicializa variables para campos que conforman la ficha del sisben
	public $sisben_documento;
	public $sisben_nombre_1;
	public $sisben_nombre_2;
	public $sisben_apellido_1;
	public $sisben_apellido_2;
	public $sisben_edad;
	public $sisben_comuna;
	public $sisben_barrio;
	public $sisben_direccion;
	public $sisben_telefono;

	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	// Metodo para validar en BD SISBEN si una cedula especifica existe
	public function consultar($cedula)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM sisben WHERE documento = ?");

			$stm->execute(array($cedula));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
