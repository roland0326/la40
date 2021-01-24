<?php

class productos
{
    private $mod_pro;
    private $usuario="Roland";
    public function __construct(){
            //invocamos el modelo que corresponde al producto
            require_once "models/Modelo_productos.php";
            $this->mod_pro= new Modelo_productos;
    }
    public function LoadContenedorProductos(){
        require_once "views/productos/Frm_Contenedor_Productos.php";
    }

    //en este metodo cargamos la vista principal con los datos en la tablas
    //1.cargamos el forumalrio de los datos en la tabla
    public function loadProducto(){        
        if(!empty($this->mod_pro->CargarProducto())){
			$datos=$this->mod_pro->CargarProducto();
			// print_r($datos);
			require_once "views/Productos/producto/Frm_Productos_Datos.php";
		}else{
				$datos=[];
				require_once "views/Productos/producto/Frm_Productos_Datos.php";
			}
        //print_r($datos);       
    }//fin paso 1

//2.
//segundo metodo para manejar el mismo formulario para insert y update asi reutilizando la vista por medio de un dato
//unico

    public function CrudProducto($id){
        //validamos si este fue enviado por metodo post
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $codigo=trim($_POST['TxtCodigo']);
            $codbarras="";
            $descrip1=trim($_POST['TxtDescrip']);
            $descrip2=trim($_POST['TxtDescrip2']);
            $estado=trim($_POST['TxtEstado']);
            $categoria=trim($_POST['TxtCategoria']);
            $precio=trim($_POST['TxtCodLisPrecio']);
            $undmed=trim($_POST['TxtUndMed']);
            $usuario=$this->usuario;;            
            if ($id==1) {
                if ($this->mod_pro->Insert_Update_Producto($id,$codigo,$codbarras,$descrip1,$descrip2,$estado,$categoria,$precio,$undmed,$usuario)) {
                    echo '<script>alert("Se almaceno con exito.");</script>';
                    $this->loadProducto();
                }else{
                    echo '<script>alert("Error al insertar el producto.");</script>';
                    $this->loadProducto();
                }                
            }else if($id==2){
                if ($this->mod_pro->Insert_Update_Producto($id,$codigo,$codbarras,$descrip1,$descrip2,$estado,$categoria,$precio,$undmed,$usuario)) {
                    echo '<script>alert("Se actualizo con exito.");</script>';
                    $this->loadProducto();
                }else{
                    echo '<script>alert("Error al actualizar el producto.");</script>';
                    $this->loadProducto();
                }  
            }
        }else
        {
            $datos=[];//este es importante mandarlo para insertar como vacio para que asi no se active
            //la funcion de los datos para actualizar
            require_once "views/Productos/producto/Frm_Productos_Crud.php";
        }
    }//fin paso2

//3.
//el tercer metodo es para cargar los datos a la vista de datos y tambien cargar el valor a eliminar por 
//medio de un vaor unico
    public function crud2Producto($id){
        if(isset($_GET['Funcion'])){
            $funcion=$_GET['Funcion'];
        }else{
            $funcion=1;
        }
        if (!empty($id)) {
			if ($funcion==1) {
                //en esta linea validamos si existe eel id y mandamos los datos a la vista para cargarlos por el formulario de ingreso
					if (!empty($this->mod_pro->loaddatosupdateProducto($id))) {
							$datos=$this->mod_pro->loaddatosupdateProducto($id);
							// print_r($datos);
                            require_once "views/Productos/producto/Frm_Productos_Crud.php";
					}else{
							echo '<script>alert("Error cargando datos del id['.$id.']");</script>';
							$this->loadProducto();
						}
			}else if($funcion==2){
				if ($this->mod_pro->Insert_Update_Producto(3,$id,'','','','','','','','')) {
							echo '<script>alert("eleminado el id['.$id.'] con exito");</script>';
							$this->loadProducto();
					}else{
							echo '<script>alert("Error al eliminar el id['.$id.']");</script>';
							$this->loadProducto();
						}
			}
						
		}else{
			echo '<script>alert("No se enviaron datos");</script>';
			$this->loadProducto();
        }
    }//fin funcion 3


//en este metodo cargamos la vista principal con los datos en la tablas
    //1.cargamos el forumalrio de los datos en la tabla
    public function loadCategoria(){        
        if(!empty($this->mod_pro->CargarCategoria())){
			$datos=$this->mod_pro->CargarCategoria();
			// print_r($datos);
			require_once "views/Productos/categoria/Frm_Categoria_Datos.php";
		}else{
				$datos=[];
				require_once "views/Productos/categoria/Frm_Categoria_Datos.php";
			}
        //print_r($datos);       
    }//fin paso 1

//2.
//segundo metodo para manejar el mismo formulario para insert y update asi reutilizando la vista por medio de un dato
//unico

    public function CrudCategoria($id){
        //validamos si este fue enviado por metodo post
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $codigo=trim($_POST['TxtNombre']);
            $nombre=trim($_POST['TxtDescrip']);          
            $usuario=$this->usuario;;            
            if ($id==1) {
                if ($this->mod_pro->Insert_Update_Categoria($id,$codigo,$nombre)) {
                    echo '<script>alert("Se almaceno con exito.");</script>';
                    $this->loadCategoria();
                }else{
                    echo '<script>alert("Error al insertar el producto.");</script>';
                    $this->loadCategoria();
                }                
            }else if($id==2){
                if ($this->mod_pro->Insert_Update_Categoria($id,$codigo,$nombre)) {
                    echo '<script>alert("Se actualizo con exito.");</script>';
                    $this->loadCategoria();
                }else{
                    echo '<script>alert("Error al actualizar el producto.");</script>';
                    $this->loadCategoria();
                }  
            }
        }else
        {
            $datos=[];//este es importante mandarlo para insertar como vacio para que asi no se active
            //la funcion de los datos para actualizar
            require_once "views/Productos/categoria/Frm_Categoria_Crud.php";
        }
    }//fin paso2

//3.
//el tercer metodo es para cargar los datos a la vista de datos y tambien cargar el valor a eliminar por 
//medio de un vaor unico
    public function crud2Categoria($id){
        if(isset($_GET['Funcion'])){
            $funcion=$_GET['Funcion'];
        }else{
            $funcion=1;
        }
        if (!empty($id)) {
			if ($funcion==1) {
                //en esta linea validamos si existe eel id y mandamos los datos a la vista para cargarlos por el formulario de ingreso
					if (!empty($this->mod_pro->loaddatosupdateCategoria($id))) {
							$datos=$this->mod_pro->loaddatosupdateCategoria($id);
							// print_r($datos);
                            require_once "views/Productos/categoria/Frm_Categoria_Crud.php";
					}else{
							echo '<script>alert("Error cargando datos del id['.$id.']");</script>';
							$this->loadCategoria();
						}
			}else if($funcion==2){
				if ($this->mod_pro->Insert_Update_Categoria(3,$id,'')) {
							echo '<script>alert("eleminado el id['.$id.'] con exito");</script>';
							$this->loadCategoria();
					}else{
							echo '<script>alert("Error al eliminar el id['.$id.']");</script>';
							$this->loadCategoria();
						}
			}
						
		}else{
			echo '<script>alert("No se enviaron datos");</script>';
			$this->loadCategoria();
        }
    }//fin funcion 3

//metodos para encabezado de listas de precios

  //en este metodo cargamos la vista principal con los datos en la tablas
    //1.cargamos el forumalrio de los datos en la tabla
    public function loadEncPrecios(){        
        if(!empty($this->mod_pro->CargarEncPrecios())){
			$datos=$this->mod_pro->CargarEncPrecios();
			// print_r($datos);
			require_once "views/Productos/Maestros/Frm_Enca_Precios_Datos.php";
		}else{
				$datos=[];
				require_once "views/Productos/Maestros/Frm_Enca_Precios_Datos.php";
			}
        //print_r($datos);       
    }//fin paso 1

//2.
//segundo metodo para manejar el mismo formulario para insert y update asi reutilizando la vista por medio de un dato
//unico

    public function CrudEncPrecios($id){
        //validamos si este fue enviado por metodo post
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $codigo=trim($_POST['TxtCodigo']);  
            $descrip=trim($_POST['TxtDescrip']);      
            $usuario=$this->usuario;            
            if ($id==1) {
                if ($this->mod_pro->Insert_Update_CargarEncPrecios($id,$codigo,$descrip,$usuario)) {
                    echo '<script>alert("Se almaceno con exito.");</script>';
                    $this->loadEncPrecios();
                }else{
                    echo '<script>alert("Error al insertar el producto.");</script>';
                    $this->loadEncPrecios();
                }                
            }else if($id==2){
                if ($this->mod_pro->Insert_Update_CargarEncPrecios($id,$codigo,$descrip,$usuario)) {
                    echo '<script>alert("Se actualizo con exito.");</script>';
                    $this->loadEncPrecios();
                }else{
                    echo '<script>alert("Error al actualizar el producto.");</script>';
                    $this->loadEncPrecios();
                }  
            }
        }else
        {
            $datos=[];//este es importante mandarlo para insertar como vacio para que asi no se active
            //la funcion de los datos para actualizar
            require_once "views/Productos/Maestros/Frm_Enca_Precios_Crud.php";
        }
    }//fin paso2

//3.
//el tercer metodo es para cargar los datos a la vista de datos y tambien cargar el valor a eliminar por 
//medio de un vaor unico
    public function crud2EncPrecios($id){
        if(isset($_GET['Funcion'])){
            $funcion=$_GET['Funcion'];
        }else{
            $funcion=1;
        }
        if (!empty($id)) {
			if ($funcion==1) {
                //en esta linea validamos si existe eel id y mandamos los datos a la vista para cargarlos por el formulario de ingreso
					if (!empty($this->mod_pro->loaddatosupdateCargarEncPrecios($id))) {
							$datos=$this->mod_pro->loaddatosupdateCargarEncPrecios($id);
							print_r($datos);
                            require_once "views/Productos/Maestros/Frm_Enca_Precios_Crud.php";
					}else{
							echo '<script>alert("Error cargando datos del id['.$id.']");</script>';
							$this->loadEncPrecios();
						}
			}else if($funcion==2){
				if ($this->mod_pro->Insert_Update_CargarEncPrecios(3,$id,'','')) {
							echo '<script>alert("eleminado el id['.$id.'] con exito");</script>';
							$this->loadEncPrecios();
					}else{
							echo '<script>alert("Error al eliminar el id['.$id.']");</script>';
							$this->loadEncPrecios();
						}
			}
						
		}else{
			echo '<script>alert("No se enviaron datos");</script>';
			$this->loadEncPrecios();
        }
    }//fin funcion 3

    //inciamos los metodos para asiganr precios

    public function loadMovPrecios(){        
        if(!empty($this->mod_pro->CargarProducto())){
			$datos=$this->mod_pro->CargarProducto();
			// print_r($datos);
			require_once "views/Productos/Procesos/Frm_Mov_ListaPrecios.php";
		}else{
				$datos=[];
				require_once "views/Productos/Procesos/Frm_Mov_ListaPrecios.php";
			}
        //print_r($datos);       
    }//fin paso 1

    public function loadDetallePrecios($id){        
        if(!empty($this->mod_pro->loaddatosupdateProducto($id))){
			$datos=$this->mod_pro->loaddatosupdateProducto($id);
			// print_r($datos);
			require_once "views/Productos/Procesos/Frm_Mov_ListarPrecios_Crud.php";
		}else{
                echo '<script>alert("Verifique el codigo del producto");</script>';
                $this->loadMovPrecios();
			}
        //print_r($datos);       
    }//fin paso 2

    public function InsertDetallePrecios(){
        //validamos si este fue enviado por metodo post
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $codigoPrecio=$_POST['TxtMaePrec'];
            $valor=$_POST['TxtCantidad'];
            $undmed=$_POST['TxtUnidadMed'];
            $CodigoPro=$_POST['TxtCodigo'];    
            $usuario=$this->usuario;          
            
                if ($this->mod_pro->Insert_DetallePrecio(1,$codigoPrecio,$valor,$undmed,$CodigoPro,$usuario)) {
                    $this->loadDetallePrecios($CodigoPro);
                }else{
                    echo '<script>alert("Error al insertar el precio.");</script>';
                    $this->loadDetallePrecios($CodigoPro);
                }                
            
        }else
        {
            echo '<script>alert("No se mandaron datos a insertar.");</script>';
                    $this->loadMovPrecios();
        }
    }//fin paso2

    public function DeleteDetallePrecios($id){                
        if(isset($_GET['codigo'])){
            $codigo=$_GET['codigo'];
        }else{
            $codigo=1;
        }
                if ($this->mod_pro->Insert_DetallePrecio(2,$id,'','','','')) {
                    $this->loadDetallePrecios($codigo);
                }else{
                    echo '<script>alert("Error al insertar el precio.");</script>';
                    $this->loadDetallePrecios($codigo);
                }                
            
        
    }//fin paso2


//----------------------------------------------------------------------------------------------------------------
}//fin clase productos

?>