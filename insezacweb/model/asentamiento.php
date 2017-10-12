<?php
require_once 'model/database.php';
class Asentamiento
{
	private $pdo;
	public $idAsentamientos;
	public $municipio;
	public $localidad;
	public $nombreAsentamiento;
	public $tipoAsentamiento;

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
	public function Listar()
	{
		try
		{
			//$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM asentamientos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ImportarAsentamientos(Asentamiento $data){
		try 
		{

		//$this->Limpiar("asentamientos");
			$sql= $this->pdo->prepare("INSERT INTO asentamientos VALUES (?,?,?,?,?)");
			$resultado=$sql->execute(
				array(
					$data->idAsentamientos,
					$data->municipio,
					$data->localidad,
					$data->nombreAsentamiento,
					$data->tipoAsentamiento
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
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM asentamientos WHERE idAsentamientos = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}