<?php
class Modelo_configuracion
{
    private $db;
    
    public function __construct(){
        $this->db= new database;
        
    }
    //metodos para la vista ciudad
    //1.
    //primer metodo para cargar la principal vista de datos
    public function CargarCiudades(){
        $sql="SELECT * FROM ciudad;";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //2.
    //segunda vista para insertar los datos y actualizar los datos 
    public function Insert_Update_Ciudades($funcion,$codigo,$nombre){
        switch ($funcion) {
            case '1':
                $sql="insert into ciudad(ciu_id,ciu_nombre) values('".$codigo."','".$nombre."');";
            break;
            case '2':
                   $sql="update ciudad set ciu_nombre='".$nombre."' where ciu_id='".$codigo."';";
            break; 
            case '3':
                $sql="delete from ciudad  where ciu_id='".$codigo."';";
                break;         
        }        
        $result=$this->db->query_execute($sql);
        if (isset($result) && !empty($result)) {
            return true;
        }else{
                return false;
             }
    }//fin de insert_update_ciudades

    //3.
    //tercer metodo para  cargar a la vista filtrado por un valor expecifico
    public function loaddatosupdate($id){
        $sql="SELECT * FROM ciudad where ciu_id='".$id."';";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //terminamos los metodos para el formulario ciudad

    
     //iniciamos los metodos para el formulario empresa
    //1.
        //primer metodo para cargar la principal vista de datos
        public function CargarEmpresa(){
            $sql="SELECT em.emp_id,
            (select td.tipdoc_descripcion from tipo_documento td where td.tipdoc_id=em.emp_tipo_documento) emp_tipo_documento,
            em.emp_razon_social, em.emp_direccion, em.emp_telefono, em.emp_celular, 
            em.emp_correo, em.emp_url, em.emp_logo, em.emp_nit
            FROM empresa em;";
                $result=$this->db->query_return($sql);
                if (isset($result) && !empty($result)) {
                    return $result;
                }else{
                        return $result=[];
                     }
        }
        //2.    
        //segunda vista para insertar los datos y actualizar los datos 
        public function Insert_Update_Empresas($funcion,$id_emp,$tipodoc,$razon,$direccion,$telefono,$celular,$correo,$url,$logo,$nit){
            switch ($funcion) {
                case '1':
    
                    $sql="insert into empresa(emp_tipo_documento,emp_razon_social,emp_direccion,emp_telefono,emp_celular,emp_correo,emp_url,emp_logo,emp_nit) values('".$tipodoc."','".$razon."','".$direccion."','".$telefono."','".$celular."','".$correo."','".$url."','".$logo."','".$nit."');"; 
                                  
                break;
                case '2':
                       $sql="UPDATE empresa SET emp_tipo_documento='".$tipodoc."', emp_razon_social='".$razon."', emp_direccion='".$direccion."', emp_telefono='".$telefono."', emp_celular='".$celular."', emp_correo='".$correo."', emp_url='".$url."', emp_logo='".$logo."',emp_nit='".$nit."' WHERE emp_id='".$id_emp."';";
                      
                break; 
                case '3':
                    $sql="DELETE FROM empresa WHERE emp_id='".$id_emp."';";
                    break;         
            }        
            $result=$this->db->query_execute($sql);
            if (isset($result) && !empty($result)) {
                return true;
            }else{
                    return false;
                 }
        }//fin de insert_update_ciudades
        //3.
        public function loaddatosupdate_empresa($id){
            $sql="SELECT * FROM empresa where emp_id='".$id."';";
                $result=$this->db->query_return($sql);
                if (isset($result) && !empty($result)) {
                    return $result;
                }else{
                        return $result=[];
                     }
        }
        //terinamos los metodos para el formulario empresa
    
        //metodos para la vista tipo de documento
        //1.
        //primer metodo para cargar la principal vista de datos
        public function CargarTipodoc(){
            $sql="SELECT * FROM tipo_documento;";
                $result=$this->db->query_return($sql);
                if (isset($result) && !empty($result)) {
                    return $result;
                }else{
                        return $result=[];
                     }
        }
    
        //2.
        //segunda vista para insertar los datos y actualizar los datos 
        public function Insert_Update_Tipodoc($funcion,$tipdoc,$descripcion){
            switch ($funcion) {
                case '1':
                    $sql="insert into tipo_documento(tipdoc_descripcion) values ('".$descripcion."');";
                break;
                case '2':
                       $sql="update tipo_documento set tipdoc_descripcion='".$descripcion."' where tipdoc_id='".$tipdoc."';";
                break; 
                case '3':
                    $sql="delete from tipo_documento where tipdoc_id='".$tipdoc."';";
                    break;         
            }        
            $result=$this->db->query_execute($sql);
            if (isset($result) && !empty($result)) {
                return true;
            }else{
                    return false;
                 }
        }//fin de insert_update_ciudades
    
        //3.
        //tercer metodo para  cargar a la vista filtrado por un valor expecifico
        public function loaddatosupdate_tipodoc($id){
            $sql="SELECT * FROM tipo_documento where tipdoc_id='".$id."';";
                $result=$this->db->query_return($sql);
                if (isset($result) && !empty($result)) {
                    return $result;
                }else{
                        return $result=[];
                     }
        }
    
        //terminamos los metodos para el formulario Tipodoc

        
         //metodos para la vista Pais
        //1.
    //primer metodo para cargar la principal vista de datos
    public function CargarPais(){
        $sql="SELECT * FROM pais;";
            $result=$this->db->query_return($sql);
            if (isset($result) && !empty($result)) {
                return $result;
            }else{
                    return $result=[];
                 }
    }

    //2.
    //segunda vista para insertar los datos y actualizar los datos 
    public function Insert_Update_Pais($funcion,$codigo,$nombre){
        switch ($funcion) {
            case '1':
                $sql="insert into pais(pa_id,pa_nombre) values('".$codigo."','".$nombre."');";
            break;
            case '2':
                   $sql="update pais set pa_nombre='".$nombre."' where pa_id='".$codigo."';";
                  
            break; 
            case '3':
                $sql="delete from pais  where pa_id='".$codigo."';";
                break;         
        }        
        $result=$this->db->query_execute($sql);
        if (isset($result) && !empty($result)) {
            return true;
        }else{
                return false;
             }
    }//fin de insert_update_pais

    //3.
    //tercer metodo para  cargar a la vista filtrado por un valor expecifico
    public function loaddatosupdate_pais($id){
        $sql="SELECT * FROM pais where pa_id='".$id."';";
            $result=$this->db->query_return($sql);
            if (isset($result) && !empty($result)) {
                return $result;
            }else{
                    return $result=[];
                 }
    }

    //terminamos los metodos para el formulario pais

   
}//fin clase

?>