<?php
class Ciudadano
{
	private $pdo;

	// Inicializa variables para campos que conforman la ficha del ciudadano
	public $ciudadano_identificacion = '';
	public $ciudadano_nombre1 = '';
	public $ciudadano_nombre2 = '';
	public $ciudadano_apellido1 = '';
	public $ciudadano_apellido2 = '';
	public $ciudadano_direccion = '';
	public $ciudadano_comuna = '';
	public $ciudadano_telefono = '';
	public $ciudadano_edad = '';
	public $ciudadano_correo = '';

	public $ciudadano_genero = '';
	public $ciudadano_barrio = '';
	public $ciudadano_zona = '';

	public $ciudadano_primera_infancia = '';
	public $ciudadano_infancia = '';
	public $ciudadano_adolescencia = '';
	public $ciudadano_jovenes = '';
	public $ciudadano_adultos = '';
	public $ciudadano_adultos_mayores = '';
	public $ciudadano_madres_comunitarias = '';
	public $ciudadano_afrodescendientes;
	public $ciudadano_mujer_cabeza_de_hogar = '';
	public $ciudadano_estudiantes = '';
	public $ciudadano_empresarios = '';
	public $ciudadano_docentes = '';
	public $ciudadano_persona_con_discapacidad = '';
	public $ciudadano_victima_de_la_violencia = '';
	public $ciudadano_indigenas = '';
	public $ciudadano_migrados = '';
	public $ciudadano_campesinos = '';
	public $ciudadano_habitante_de_calle = '';
	public $ciudadano_lideres_comunitarios = '';
	public $ciudadano_lgtbi = '';
	public $ciudadano_funcionarios = '';
	public $ciudadano_contratistas = '';
	public $ciudadano_comunidad_organizada = '';


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
	public function Ingresar(Ciudadano $data)
	{
		try {

			$sql = "INSERT INTO ciudadanos (identificacion, nombre1, nombre2, apellido1, apellido2, direccion, comuna, telefono, edad, correo, genero, barrio, zona,
											primera_infancia, infancia, adolescencia, jovenes, adultos, adultos_mayores, madres_comunitarias, afrodescendientes,
											mujer_cabeza_de_hogar, estudiantes, empresarios, docentes, persona_con_discapacidad, victima_de_la_violencia, indigenas,
											migrados, campesinos, habitante_de_calle, lideres_comunitarios, lgtbi, funcionarios, contratistas, comunidad_organizada) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->ciudadano_identificacion,
						$data->ciudadano_nombre1,
						$data->ciudadano_nombre2,
						$data->ciudadano_apellido1,
						$data->ciudadano_apellido2,
						$data->ciudadano_direccion,
						$data->ciudadano_comuna,
						$data->ciudadano_telefono,
						$data->ciudadano_edad,
						$data->ciudadano_correo,
						$data->ciudadano_genero,
						$data->ciudadano_barrio,
						$data->ciudadano_zona,

						$data->ciudadano_primera_infancia,
						$data->ciudadano_infancia,
						$data->ciudadano_adolescencia,
						$data->ciudadano_jovenes,
						$data->ciudadano_adultos,
						$data->ciudadano_adultos_mayores,
						$data->ciudadano_madres_comunitarias,
						$data->ciudadano_afrodescendientes,
						$data->ciudadano_mujer_cabeza_de_hogar,
						$data->ciudadano_estudiantes,
						$data->ciudadano_empresarios,
						$data->ciudadano_docentes,
						$data->ciudadano_persona_con_discapacidad,
						$data->ciudadano_victima_de_la_violencia,
						$data->ciudadano_indigenas,
						$data->ciudadano_migrados,
						$data->ciudadano_campesinos,
						$data->ciudadano_habitante_de_calle,
						$data->ciudadano_lideres_comunitarios,
						$data->ciudadano_lgtbi,
						$data->ciudadano_funcionarios,
						$data->ciudadano_contratistas,
						$data->ciudadano_comunidad_organizada
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}

		return $this->pdo->lastInsertId(); //Retorna el ID (Autoincremental) del registro que se acaba de crear
	}


	// Metodo para actualizar un  registro
	public function Actualizar(Ciudadano $data)
	{
		try {

			$sql = "UPDATE ciudadanos SET 
							nombre1 		= ?, 
							nombre2 		= ?,
							apellido1 		= ?,
							apellido2		= ?, 
							direccion		= ?, 
							comuna			= ?, 
							telefono		= ?, 
							edad			= ?, 
							correo			= ?, 
							genero			= ?, 
							barrio			= ?, 
							zona			= ?,
							primera_infancia			= ?,
							infancia					= ?,
							adolescencia				= ?,
							jovenes						= ?,
							adultos						= ?,
							adultos_mayores				= ?,
							madres_comunitarias			= ?,
							afrodescendientes			= ?,
							mujer_cabeza_de_hogar		= ?,
							estudiantes					= ?,
							empresarios					= ?,
							docentes					= ?,
							persona_con_discapacidad	= ?,
							victima_de_la_violencia		= ?,
							indigenas					= ?,
							migrados					= ?,
							campesinos					= ?,
							habitante_de_calle			= ?,
							lideres_comunitarios		= ?,
							lgtbi						= ?,
							funcionarios				= ?,
							contratistas				= ?,
							comunidad_organizada 		= ?

					WHERE identificacion = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->ciudadano_nombre1,
						$data->ciudadano_nombre2,
						$data->ciudadano_apellido1,
						$data->ciudadano_apellido2,
						$data->ciudadano_direccion,
						$data->ciudadano_comuna,
						$data->ciudadano_telefono,
						$data->ciudadano_edad,
						$data->ciudadano_correo,
						$data->ciudadano_genero,
						$data->ciudadano_barrio,
						$data->ciudadano_zona,

						$data->ciudadano_primera_infancia,
						$data->ciudadano_infancia,
						$data->ciudadano_adolescencia,
						$data->ciudadano_jovenes,
						$data->ciudadano_adultos,
						$data->ciudadano_adultos_mayores,
						$data->ciudadano_madres_comunitarias,
						$data->ciudadano_afrodescendientes,
						$data->ciudadano_mujer_cabeza_de_hogar,
						$data->ciudadano_estudiantes,
						$data->ciudadano_empresarios,
						$data->ciudadano_docentes,
						$data->ciudadano_persona_con_discapacidad,
						$data->ciudadano_victima_de_la_violencia,
						$data->ciudadano_indigenas,
						$data->ciudadano_migrados,
						$data->ciudadano_campesinos,
						$data->ciudadano_habitante_de_calle,
						$data->ciudadano_lideres_comunitarios,
						$data->ciudadano_lgtbi,
						$data->ciudadano_funcionarios,
						$data->ciudadano_contratistas,
						$data->ciudadano_comunidad_organizada,

						$data->ciudadano_identificacion
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}

		return $this->pdo->lastInsertId(); //Retorna el ID (Autoincremental) del registro que se acaba de crear
	}


	// Metodo para validar en BD CIUDADANO si una cedula especifica existe
	public function consultar($cedula)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM ciudadanos WHERE identificacion = ?");

			$stm->execute(array($cedula));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}
