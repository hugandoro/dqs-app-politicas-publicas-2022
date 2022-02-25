<?php
class Planilla
{
	private $pdo;

	// Inicializa variables para campos que conforman la planilla
	public $planilla_id = '';
	public $planilla_fecha = '';
	public $planilla_titulo = '';
	public $planilla_descripcion = '';
	public $planilla_lugar = '';
	public $planilla_equidad_de_genero = '';
	public $planilla_discapacidad = '';
	public $planilla_seguridad_y_convivencia = '';
	public $planilla_primera_infancia = '';
	public $planilla_juventudes = '';
	public $planilla_presupuesto_participativo = '';
	public $planilla_migraciones = '';
	public $planilla_adulto_mayor = '';
	public $planila_usuario_id = '';

	// Metodo para iniciar el constructor
	public function __CONSTRUCT()
	{
		try {
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	// Metodo para crear un nuevo registro
	public function Registrar(Planilla $data)
	{
		try {

			$sql = "INSERT INTO planillas (fecha, titulo, descripcion, lugar, equidad_de_genero, discapacidad, seguridad_y_convivencia, primera_infancia, juventudes, presupuesto_participativo, migraciones, adulto_mayor, usuario_id) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->planilla_fecha,
						$data->planilla_titulo,
						$data->planilla_descripcion,
						$data->planilla_lugar,
						$data->planilla_equidad_de_genero,
						$data->planilla_discapacidad,
						$data->planilla_seguridad_y_convivencia,
						$data->planilla_primera_infancia,
						$data->planilla_juventudes,
						$data->planilla_presupuesto_participativo,
						$data->planilla_migraciones,
						$data->planilla_adulto_mayor,
						$data->planilla_usuario_id
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}

		return $this->pdo->lastInsertId(); //Retorna el ID (Autoincremental) del registro que se acaba de crear
	}

	// Metodo para listar todas las planillas de determinado USUARIO
	public function Listar($usuario)
	{
		try {
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM planillas WHERE usuario_id = '$usuario' ORDER BY fecha DESC");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	// Metodo para obtener los datos puntuales de un registro
	public function Obtener($idPlanilla){
		try{
			$stm = $this->pdo
			            ->prepare("SELECT * FROM planillas WHERE id = ?");

			$stm->execute(array($idPlanilla));
			return $stm->fetch(PDO::FETCH_OBJ);
		} 
		catch (Exception $e){
			die($e->getMessage());
		}
	}

	// Metodo para actualizar un registro
	public function Actualizar($data){
		try{

			$sql = "UPDATE planillas SET 
						fecha						= ?,
						titulo						= ?,
						descripcion					= ?,
						lugar						= ?,
						equidad_de_genero			= ?,
						discapacidad				= ?,
						seguridad_y_convivencia		= ?,
						primera_infancia			= ?,
						juventudes					= ?,
						presupuesto_participativo	= ?,
						migraciones					= ?,
						adulto_mayor				= ?,
						usuario_id					= ?

				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->planilla_fecha,
						$data->planilla_titulo,
						$data->planilla_descripcion,
						$data->planilla_lugar,
						$data->planilla_equidad_de_genero,
						$data->planilla_discapacidad,
						$data->planilla_seguridad_y_convivencia,
						$data->planilla_primera_infancia,
						$data->planilla_juventudes,
						$data->planilla_presupuesto_participativo,
						$data->planilla_migraciones,
						$data->planilla_adulto_mayor,
						$data->planilla_usuario_id,
                        $data->planilla_id //No se debe sobreescribir, se usa para ubicar el registro a modificar
					)
				);
		} 
		catch (Exception $e){
			die($e->getMessage());
		}
	}

	// Metodo para CERRAR el modo edicion de una planilla
	public function Cerrar($data){
		try{

			$sql = "UPDATE planillas SET 
						estado_planilla	= ?

				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						"Cerrada",
                        $data->planilla_id //No se debe sobreescribir, se usa para ubicar el registro a modificar
					)
				);
		} 
		catch (Exception $e){
			die($e->getMessage());
		}
	}

	// Metodo para crear el vinculo Ciudadano - Planilla
	public function vincularCiudadano($idCiudadano,$idPlanilla){
		try{
			$sql = "INSERT INTO ciudadano_planilla (ciudadano_identificacion,planilla_id) VALUES (?, ?)";
			$this->pdo->prepare($sql)
				 ->execute(array($idCiudadano,$idPlanilla));
		}
		catch (Exception $e){
			die($e->getMessage());
			//break;
		}
	}

	public function desvincularCiudadano($idCiudadano,$idPlanilla){
		try{
			//Borrar relaciones Medico - Historias
			$stm = $this->pdo
						->prepare("DELETE FROM ciudadano_planilla WHERE (ciudadano_identificacion = ?) AND (planilla_id = ?) ");			          
			$stm->execute(array($idCiudadano,$idPlanilla));
		} 
		catch (Exception $e){
			//die($e->getMessage());
		}
	}

	// Metodo para listar CIUDADANOS vinculados a una PLANILLA
	public function listarAsistencia($idPlanilla){
		try{
			$result = array();

				$stm = $this->pdo->prepare("SELECT a.* FROM ciudadanos AS a INNER JOIN ciudadano_planilla AS b ON a.identificacion = b.ciudadano_identificacion WHERE b.planilla_id = '$idPlanilla'");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

}
