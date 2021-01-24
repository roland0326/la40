<?php
class configuracion 
{
    private $mod_con;
   
    public function __construct(){
        //invocamos el modelo encargado del controlador
        require_once "models/Modelo_configuracion.php";
        $this->mod_con= new Modelo_configuracion();
    }
    public function loadconfiguracion(){
        require_once "views/Configuracion/Frm_Contenedor_Config.php";
    }
//en este metodo cargamos la vista principal con los datos en la tablas
    public function loadCiudad(){        
        if(!empty($this->mod_con->CargarCiudades())){
			$datos=$this->mod_con->CargarCiudades();
			// print_r($datos);
			require_once "views/Configuracion/Maestros/Ciudad/Frm_Ciudad_Datos.php";
		}else{
				$datos=[];
				require_once "views/Configuracion/Maestros/Ciudad/Frm_Ciudad_Datos.php";
			}
        //print_r($datos);       
    }//fin de loadciudad 

//segundo metodo para manejar el mismo formulario para insert y update asi reutilizando la vista por medio de un dato
//unico
    public function CrudCiudad($id){
        //validamos si este fue enviado por metodo post
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $codciudad=trim($_POST['TxtCodigo']);
            $nombre=trim($_POST['TxtNombre']);
            if ($id==1) {
                if ($this->mod_con->Insert_Update_Ciudades($id,$codciudad,$nombre)) {
                    echo '<script>alert("Se almaceno con exito.");</script>';
                    $this->loadCiudad();
                }else{
                    echo '<script>alert("Error al insertar la ciudad.");</script>';
                    $this->loadCiudad();
                }                
            }else if($id==2){
                if ($this->mod_con->Insert_Update_Ciudades($id,$codciudad,$nombre)) {
                    echo '<script>alert("Se actualizo con exito.");</script>';
                    $this->loadCiudad();
                }else{
                    echo '<script>alert("Error al actualizar la ciudad.");</script>';
                    $this->loadCiudad();
                }  
            }
        }else
        {
            $datos=[];//este es importante mandarlo para insertar como vacio para que asi no se active
            //la funcion de los datos para actualizar
            require_once "views/Configuracion/Maestros/Ciudad/Frm_Ciudad_Crud.php";
        }
    }//fin crudciudad
//el tercer metodo es para cargar los datos a la vista de datos y tambien cargar el valor a eliminar por 
//medio de un vaor unico
    public function crud2Ciudad($id){
        if(isset($_GET['Funcion'])){
            $funcion=$_GET['Funcion'];
        }else{
            $funcion=1;
        }
        if (!empty($id)) {
			if ($funcion==1) {
                //en esta linea validamos si existe eel id y mandamos los datos a la vista para cargarlos por el formulario de ingreso
					if (!empty($this->mod_con->loaddatosupdate($id))) {
							$datos=$this->mod_con->loaddatosupdate($id);
							// print_r($datos);
                            require_once "views/Configuracion/Maestros/Ciudad/Frm_Ciudad_Crud.php";
					}else{
							echo '<script>alert("Error cargando datos del id['.$id.']");</script>';
							$this->loadCiudad();
						}
			}else if($funcion==2){
				if ($this->mod_con->Insert_Update_Ciudades(3,$id,'')) {
							echo '<script>alert("eleminado el id['.$id.'] con exito");</script>';
							$this->loadCiudad();
					}else{
							echo '<script>alert("Error al eliminar el id['.$id.']");</script>';
							$this->loadCiudad();
						}
			}
						
		}else{
			echo '<script>alert("No se enviaron datos");</script>';
			$this->loadCiudad();
        }
    }//fin metodo crud2

    //iniciamos los 3 metodo para el formulario empresa
    //1.
    public function loadEmpresa(){        
        if(!empty($this->mod_con->CargarEmpresa())){
			$datos=$this->mod_con->CargarEmpresa();
			// print_r($datos);
			require_once "views/Configuracion/Maestros/Empresa/Frm_Empresa_datos.php";
		}else{
				$datos=[];
                require_once "views/Configuracion/Maestros/Empresa/Frm_Empresa_datos.php";
			}
        //print_r($datos);       
    }//fin primer metodo 
    //2.
    //segundo metodo para manejar el mismo formulario para insert y update asi reutilizando la vista por medio de un dato
//unico
public function CrudEmpresa($id){
    //validamos si este fue enviado por metodo post
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $id_emp=trim($_POST['ID']);
        $tipodoc=trim($_POST['TxtTipodoc']);
        $nit=trim($_POST['TxtNit']);
        $razon=trim($_POST['TxtRazon']);
        $direccion=trim($_POST['TxtDirecc']);
        $telefono=trim($_POST['TxtTelefono']);
        $celular=trim($_POST['TxtCelular']);
        $correo=trim($_POST['TxtCorreo']);
        $url=trim($_POST['TxtPagina']);
        $logo=trim($_POST['TxtLogo']);
        if ($id==1) {
            if ($this->mod_con->Insert_Update_Empresas($id,$id_emp,$tipodoc,$razon,$direccion,$telefono,$celular,$correo,$url,$logo,$nit)) {
                echo '<script>alert("Se almaceno con exito.");</script>';
                $this->loadEmpresa();
            }else{
                echo '<script>alert("Error al insertar la empresa.");</script>';
                $this->loadEmpresa();
            }                
        }else if($id==2){
            if ($this->mod_con->Insert_Update_Empresas($id,$id_emp,$tipodoc,$razon,$direccion,$telefono,$celular,$correo,$url,$logo,$nit)) {
                echo '<script>alert("Se actualizo con exito.");</script>';
                $this->loadEmpresa();
            }else{
                echo '<script>alert("Error al actualizar la empresa.");</script>';
                $this->loadEmpresa();
            }  
        }
    }else
    {
        $datos=[];//este es importante mandarlo para insertar como vacio para que asi no se active
        //la funcion de los datos para actualizar
        require_once "views/Configuracion/Maestros/Empresa/Frm_Empresa_Crud.php";
    }
}//fin segundo metodo
    //3.
public function crud2Empresa($id){
        if(isset($_GET['Funcion'])){
            $funcion=$_GET['Funcion'];
        }else{
            $funcion=1;
        }
        if (!empty($id)) {
            if ($funcion==1) {
                //en esta linea validamos si existe el id y mandamos los datos a la vista para cargarlos por el formulario de ingreso
                    if (!empty($this->mod_con->loaddatosupdate_empresa($id))) {
                            $datos=$this->mod_con->loaddatosupdate_empresa($id);
                            // print_r($datos);
                            require_once "views/Configuracion/Maestros/Empresa/Frm_Empresa_Crud.php";
                    }else{
                            echo '<script>alert("Error cargando datos del id['.$id.']");</script>';
                            $this->loadEmpresa();
                        }
            }else if($funcion==2){
                if ($this->mod_con->Insert_Update_Empresas(3,$id,'','','','','','','','','')) {
                            echo '<script>alert("eleminado el id['.$id.'] con exito");</script>';
                            $this->loadEmpresa();
                    }else{
                            echo '<script>alert("Error al eliminar el id['.$id.']");</script>';
                            $this->loadEmpresa();
                        }
            }
                        
        }else{
            echo '<script>alert("No se enviaron datos");</script>';
            $this->loadEmpresa();
        }
    }//fin metodo crud2


//en este metodo cargamos la vista principal con los datos en la tablas
    public function loadTipodoc(){        
        if(!empty($this->mod_con->CargarTipodoc())){
            $datos=$this->mod_con->CargarTipodoc();
            // print_r($datos);
            require_once "views/Configuracion/Maestros/Tipodcto/Frm_Tipodoc_Datos.php";
        }else{
                $datos=[];
                require_once "views/Configuracion/Maestros/Tipodcto/Frm_Tipodoc_Datos.php";
            }
        //print_r($datos);       
    }//fin de loadTipodoc

//segundo metodo para manejar el mismo formulario para insert y update asi reutilizando la vista por medio de un dato
//unico
    public function CrudTipodoc($id){
        //validamos si este fue enviado por metodo post
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $id_form=trim($_POST['ID']);
            $descripcion=trim($_POST['TxtDescrip']);
            if ($id==1) {
                if ($this->mod_con->Insert_Update_Tipodoc($id,$id_form,$descripcion)) {
                    echo '<script>alert("Se almaceno con exito.");</script>';
                    $this->loadTipodoc();
                }else{
                    echo '<script>alert("Error al insertar tipo de documento.");</script>';
                    $this->loadTipodoc();
                }                
            }else if($id==2){
                if ($this->mod_con->Insert_Update_Tipodoc($id,$id_form,$descripcion)) {
                    echo '<script>alert("Se actulizo con exito.");</script>';
                    $this->loadTipodoc();
                }else{
                    echo '<script>alert("Error al actualizar el tipo de documento.");</script>';
                    $this->loadTipodoc();
                }  
            }
        }else
        {
            $datos=[];//este es importante mandarlo para insertar como vacio para que asi no se active
            //la funcion de los datos para actualizar
            require_once "views/Configuracion/Maestros/Tipodcto/Frm_Tipodoc_Crud.php";
        }
    }//fin crudciudad
//el tercer metodo es para cargar los datos a la vista de datos y tambien cargar el valor a eliminar por 
//medio de un valor unico
    public function crud2Tipodoc($id){
        if(isset($_GET['Funcion'])){
            $funcion=$_GET['Funcion'];
        }else{
            $funcion=1;
        }
        if (!empty($id)) {
            if ($funcion==1) {
                //en esta linea validamos si existe el id y mandamos los datos a la vista para cargarlos por el formulario de ingreso
                    if (!empty($this->mod_con->loaddatosupdate_tipodoc($id))) {
                            $datos=$this->mod_con->loaddatosupdate_tipodoc($id);
                            // print_r($datos);
                            require_once "views/Configuracion/Maestros/Tipodcto/Frm_Tipodoc_Crud.php";
                    }else{
                            echo '<script>alert("Error cargando datos del id['.$id.']");</script>';
                            $this->loadTipodoc();
                        }
            }else if($funcion==2){
                if ($this->mod_con->Insert_Update_Tipodoc(3,$id,'')) {
                            echo '<script>alert("eleminado el id['.$id.'] con exito");</script>';
                            $this->loadTipodoc();
                    }else{
                            echo '<script>alert("Error al eliminar el id['.$id.']");</script>';
                            $this->loadTipodoc();
                        }
            }
                        
        }else{
            echo '<script>alert("No se enviaron datos");</script>';
            $this->loadTipodoc();
        }
    }//fin metodo crud2
         //Inicio de los metodos de pais
     //en este metodo cargamos la vista principal con los datos en la tablas
    public function loadPais(){        
        if(!empty($this->mod_con->CargarPais())){
            $datos=$this->mod_con->CargarPais();
            // print_r($datos);
            require_once "views/Configuracion/Maestros/Pais/Frm_Pais_Datos.php";
        }else{
                $datos=[];
                require_once "views/Configuracion/Maestros/Pais/Frm_Pais_Datos.php";
            }
        //print_r($datos);       
    }//fin de loadciudad 

//segundo metodo para manejar el mismo formulario para insert y update asi reutilizando la vista por medio de un dato
//unico
    public function CrudPais($id){
        //validamos si este fue enviado por metodo post
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $codpais=trim($_POST['TxtCodigo']);
            $nombre=trim($_POST['TxtNombre']);
            if ($id==1) {
                if ($this->mod_con->Insert_Update_Pais($id,$codpais,$nombre)) {
                    echo '<script>alert("Se almaceno con exito.");</script>';
                    $this->loadPais();
                }else{
                    echo '<script>alert("Error al insertar el Pais.");</script>';
                    $this->loadPais();
                }                
            }else if($id==2){
                if ($this->mod_con->Insert_Update_Pais($id,$codpais,$nombre)) {
                    echo '<script>alert("Se actualizo con exito.");</script>';
                    $this->loadPais();
                }else{
                    echo '<script>alert("Error al actualizar el Pais.");</script>';
                    $this->loadPais();
                }  
            }
        }else
        {
            $datos=[];//este es importante mandarlo para insertar como vacio para que asi no se active
            //la funcion de los datos para actualizar
            require_once "views/Configuracion/Maestros/Pais/Frm_Pais_Crud.php";
        }
    }//fin crudciudad
//el tercer metodo es para cargar los datos a la vista de datos y tambien cargar el valor a eliminar por 
//medio de un vaor unico
    public function crud2Pais($id){
        if(isset($_GET['Funcion'])){
            $funcion=$_GET['Funcion'];
        }else{
            $funcion=1;
        }
        if (!empty($id)) {
            if ($funcion==1) {
                //en esta linea validamos si existe eel id y mandamos los datos a la vista para cargarlos por el formulario de ingreso
                    if (!empty($this->mod_con->loaddatosupdate_pais($id))) {
                            $datos=$this->mod_con->loaddatosupdate_pais($id);
                            // print_r($datos);
                            require_once "views/Configuracion/Maestros/Pais/Frm_Pais_Crud.php";
                    }else{
                            echo '<script>alert("Error cargando datos del id['.$id.']");</script>';
                            $this->loadPais();
                        }
            }else if($funcion==2){
                if ($this->mod_con->Insert_Update_Pais(3,$id,'')) {
                            echo '<script>alert("eleminado el id['.$id.'] con exito");</script>';
                            $this->loadPais();
                    }else{
                            echo '<script>alert("Error al eliminar el id['.$id.']");</script>';
                            $this->loadPais();
                        }
            }
                        
        }else{
            echo '<script>alert("No se enviaron datos");</script>';
            $this->loadPais();
        }
    }//fin metodo crud2
       
}//fin clase

?>