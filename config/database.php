<?php
    require_once "config.php";
/**
* 
*/
ini_set("display_errors", 1);
//selecciono zona horaria
date_default_timezone_set('America/Bogota');

class database
{
    public $conn;
  public $currentDate;
  public $currentDateSimple;
  //Obtenemos las variables de conexión a la base de datos del archivo /Config/Configurar.php

    private $_host=BD_INSTANCIA;
    private $_db=BD_MOTOR_BASE;
    private $_user=BD_USER;
   private $_pass=BD_PASS;
      /*https://www.php.net/manual/es/pdo.connections.php*/
  
  public function __construct()
  {
      try {
            $this->conn = new PDO('mysql:host='.$this->_host.';dbname='.$this->_db, $this->_user, $this->_pass, 
                array(
                        PDO::ATTR_PERSISTENT => true
                      )
            );
            //echo "conexion exitosa";
           } catch (PDOException $e) {
              print "¡Error!: " . $e->getMessage() . "<br/>";
              die();
          }	
      
  }//Fin .Contructor	

  public function __destruct()
  {

  }

    public function query_return($sql)
  {

      $stmt = $this->conn->query($sql);
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $result[] = $row;
      }
      $stmt = null;
      if(isset($result) && !empty($result)){
          return $result;
      }
      else {
          return false;
      }
  }

  

  public function query_execute($sql)
  {

      if($execute = $this->conn->query($sql))
      {
          $result = [
              'query_result'	=> true,
              'last_id' 			=> $this->conn->lastInsertId(),
              'rows_afected' 	=> $execute->rowCount(),
          ];
          return $result;
      }
      else
      {
          return false;
      }
  }
//metodo para manejar transacciones con arrays
  public function query_trans($lista){
    try {
        $this->conn->beginTransaction();
            $this->conn->query($lista["Sql1"]);
            $this->conn->query($lista["Sql2"]);           
            $this->conn->query($lista["Sql3"]);           
        $this->conn->commit();

     
        echo '<script>alert("inserto todo");</script>';

    } catch (PDOException $th) {
        $this->conn->rollback();
        echo '<script>alert("Error");</script>';
        echo $th;
    }
  }
    
  
  

}//Fin .Base
?>

