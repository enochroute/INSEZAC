<?php
require_once 'model/programa.php';

class ProgramaController{

  private $model;
  //private $session;
  public $error;

  //Constructor
  public function __CONSTRUCT(){
    $this->model = new Programa();
  }


  //Index 
  public function Index(){

   $page="view/programa/index.php";
   require_once 'view/index.php';
 	} 


 	//Metodo Crud *** Mandara llamar a Metodo Crear select editar y eliminar
  public function Crud(){
  	$programa = new Programa();
    

    if(isset($_REQUEST['idPrograma'])){
            $programa = $this->model->Obtener($_REQUEST['idPrograma']);
        }
        $page= "view/programa/programa.php";
       require_once 'view/index.php';
  } 
 	public function Guardar(){
        $programa= new Programa();
        //echo "entre";
        //echo  $programa->idPrograma
        $programa->idPrograma = $_REQUEST['idPrograma'];
        $programa->programa = $_REQUEST['programa'];
        $programa->idPrograma > 0 
            ? $this->model->Actualizar($programa)
            : $this->model->Registrar($programa);
        $page="view/programa/index.php";
   			require_once 'view/index.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idPrograma']);
        echo $idPrograma;
   			$page="view/programa/index.php";
   			require_once 'view/index.php';
    }
}
