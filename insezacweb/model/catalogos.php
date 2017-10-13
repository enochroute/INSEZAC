<?php
require_once 'model/database.php';
class Catalogos
{
	private $pdo;
	public $idIdentificacion;
	public $identificacion;
	public $idTipoVialidad;
	public $tipoVialidad;
	public $idEstadoCivil;
	public $estadoCivil;
	public $idOcupacion;
	public $ocupacion;
	public $idIngresoMensual;
	public $ingresoMensual;
	public $idVivienda;
	public $vivienda;
	public $idNivelEstudios;
	public $nivelEstudios;
	public $idSeguridadSocial;
	public $seguridadSocial;
	public $idDiscapacidad;
	public $discapacidad;
	public $idGrupoVulnerable;
	public $grupoVulnerable;
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ImportarIdentificacionOficial(Catalogos $data){
		try 
		{
			//$this->Limpiar('identificacionOficial');
			$sql= $this->pdo->prepare("INSERT INTO identificacionOficial VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idIdentificacion,
					$data->identificacion
					)
				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ImportarTipoVialidad(Catalogos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO tipoVialidad VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idTipoVialidad,
					$data->tipoVialidad
					)
				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarEstadoCivil(Catalogos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO estadoCivil VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idEstadoCivil,
					$data->estadoCivil
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarOcupacion(Catalogos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO ocupacion VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idOcupacion,
					$data->ocupacion
					)
				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarIngresoMensual(Catalogos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO ingresoMensual VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idIngresoMensual,
					$data->ingresoMensual
					)
				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarVivienda(Catalogos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO vivienda VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idVivienda,
					$data->vivienda
					)
				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarNivelEstudios(Catalogos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO nivelEstudio VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idNivelEstudios,
					$data->nivelEstudios
					)
				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarSeguridadSocial(Catalogos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO seguridadSocial VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idSeguridadSocial,
					$data->seguridadSocial
					)
				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarDiscapacidad(Catalogos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO discapacidad VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idDiscapacidad,
					$data->discapacidad
					)
				);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ImportarGrupoVulnerable(Catalogos $data){
		try 
		{
			$sql= $this->pdo->prepare("INSERT INTO grupoVulnerable VALUES(?,?)");
			$resultado=$sql->execute(
				array(
					$data->idGrupoVulnerable,
					$data->grupoVulnerable
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Limpiar($nomTabla)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("DELETE FROM $nomTabla");			          

			$stm->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Listar($nomTabla)
	{
		try
		{
			//$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM $nomTabla");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
}