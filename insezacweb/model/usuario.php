<?php
class Usuario
{

	public $idUsuario;
	public $usuario;
	public $password;
	public $direccion;
	public $tipoUsuario;
	private $pdo;

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

			$stm = $this->pdo->prepare("SELECT * FROM usuarios");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("SELECT * FROM usuarios WHERE idUsuario = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			->prepare("DELETE FROM usuarios WHERE idUsuario = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuarios SET
			usuario = ?, password = ?, direccion =?, tipoUsuario = ? 
			WHERE idUsuario = ?";
			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->usuario, 
					$data->password,
					$data->direccion,
					$data->tipoUsuario
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Registrar(Usuario $data)
	{
		try 
		{
			$sql = "INSERT INTO usuario
			VALUES (?,?,?,?,?)";

			$this->pdo->prepare($sql)
			->execute(
				array(
					null,
					$data->usuario, 
					$data->password,
					$data->direccion,
					$data->tipoUsuario
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}