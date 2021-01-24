<?php

class clientes
{
    private $mod_cli;
    private $usuario="Roland";
    public function __construct(){
            //invocamos el modelo que corresponde al producto
            require_once "models/Modelo_clientes.php";
            $this->mod_cli= new Modelo_clientes;
    }
    public function LoadContenedorClientes(){
        require_once "views/clientes/Frm_Contenedor_Clientes.php";
    }

    //en este metodo cargamos la vista principal con los datos en la tablas
    //1.cargamos el forumalrio de los datos en la tabla
    public function loadCliente(){        
        if(!empty($this->mod_cli->CargarCliente())){
			$datos=$this->mod_cli->CargarCliente();
			 //print_r($datos);
			require_once "views/Clientes/cliente/Frm_Clientes_Datos.php";
		}else{
				$datos=[];
				require_once "views/Clientes/cliente/Frm_Clientes_Datos.php";
			}
        //print_r($datos);       
    }//fin paso 1

//2.
//segundo metodo para manejar el mismo formulario para insert y update asi reutilizando la vista por medio de un dato
//unico

    public function CrudCliente($id){
        //validamos si este fue enviado por metodo post
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $n_documento=trim($_POST['TxtNdoc']);
            $tipodoc=trim($_POST['TxtTipodoc']);
            $razon=trim($_POST['TxtRazon']);
            $direccion=trim($_POST['TxtDireccion']);
            $telefono=trim($_POST['TxtTelefono']);
            $celular=trim($_POST['TxtCelular']);
            $correo=trim($_POST['TxtCorreo']);
            $ciudad=trim($_POST['TxtCiudad']);
            $pais=trim($_POST['TxtPais']);
            $estado=trim($_POST['TxtEstado']);
            $codlista=trim($_POST['TxtCodlista']);

            $usuario=$this->usuario;;            
            if ($id==1) {
                if ($this->mod_cli->Insert_Update_Cliente($id,$n_documento,$tipodoc,$razon,$direccion,$telefono,$celular,$correo,$ciudad,$pais,$codlista,$estado,$usuario)) {
                    echo '<script>alert("Se almaceno con exito.");</script>';
                    $this->loadCliente();
                }else{
                    echo '<script>alert("Error al insertar el cliente.");</script>';
                    $this->loadCliente();
                }                
            }else if($id==2){
                if ($this->mod_cli->Insert_Update_Cliente($id,$n_documento,$tipodoc,$razon,$direccion,$telefono,$celular,$correo,$ciudad,$pais,$codlista,$estado,$usuario)) {
                    echo '<script>alert("Se actualizo con exito.");</script>';
                    $this->loadCliente();
                }else{
                    echo '<script>alert("Error al actualizar el cliente.");</script>';
                    $this->loadCliente();
                }  
            }
        }else
        {
            $datos=[];//este es importante mandarlo para insertar como vacio para que asi no se active
            //la funcion de los datos para actualizar
            require_once "views/Clientes/cliente/Frm_Clientes_Crud.php";
        }
    }//fin paso2

//3.
//el tercer metodo es para cargar los datos a la vista de datos y tambien cargar el valor a eliminar por 
//medio de un vaor unico
    public function crud2Cliente($id){
        if(isset($_GET['Funcion'])){
            $funcion=$_GET['Funcion'];
        }else{
            $funcion=1;
        }
        if (!empty($id)) {
			if ($funcion==1) {
                //en esta linea validamos si existe el id y mandamos los datos a la vista para cargarlos por el formulario de ingreso
					if (!empty($this->mod_cli->loaddatosupdateCliente($id))) {
							$datos=$this->mod_cli->loaddatosupdateCliente($id);
							// print_r($datos);
                            require_once "views/Clientes/cliente/Frm_Clientes_Crud.php";
					}else{
							echo '<script>alert("Error cargando datos del id['.$id.']");</script>';
							$this->loadCliente();
						}
			}else if($funcion==2){
				if ($this->mod_cli->Insert_Update_Cliente(3,$id,'','','','','','','','','','','')) {
							echo '<script>alert("eleminado el id['.$id.'] con exito");</script>';
							$this->loadCliente();
					}else{
							echo '<script>alert("Error al eliminar el id['.$id.']");</script>';
							$this->loadCliente();
						}
			}
						
		}else{
			echo '<script>alert("No se enviaron datos");</script>';
			$this->loadCliente();
        }
    }//fin funcion 3


//----------------------------------------------------------------------------------------------------------------
}//fin clase productos

?>