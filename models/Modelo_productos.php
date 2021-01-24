<?php
    class Modelo_productos
    {
        private $db;
        public function __construct(){
            $this->db= new database;
        }
    
        //metodos para la vista productos
    //1.
    //primer metodo para cargar la principal vista de datos
    public function CargarProducto(){
        $sql="SELECT pro_codigo, pro_codbarras, pro_descripcion, pro_descrip2,case when pro_estado='1' then ('Habilitado') else ('Inhabilitado') end as pro_estado, pro_categoria,
         pro_margen_precio, pro_unidadmed, pro_fecha_ing, pro_fecha_mod, pro_usuario_ing, pro_usuario_mod
        FROM productos;";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //2.
    //segunda vista para insertar los datos y actualizar los datos 
    public function Insert_Update_Producto($funcion,$codigo,$codbarras,$descrip1,$descrip2,$estado,$categoria,$precio,$undmed,$usuario){
        switch ($funcion) {
            case '1':
                $sql="INSERT INTO productos
                (pro_codigo, pro_codbarras, pro_descripcion, pro_descrip2, pro_estado, pro_categoria, pro_margen_precio, 
                pro_unidadmed, pro_fecha_ing, pro_fecha_mod, pro_usuario_ing, pro_usuario_mod)
                VALUES('".$codigo."', '".$codbarras."', '".$descrip1."', '".$descrip2."', '".$estado."', '".$categoria."', $precio,
                 '".$undmed."', sysdate(), NULL, '".$usuario."', NULL);";
            break;
            case '2':
                   $sql="UPDATE productos
                   SET  pro_descripcion='".$descrip1."', pro_descrip2='".$descrip2."', pro_estado='".$estado."', pro_categoria='".$categoria."', 
                   pro_margen_precio=".$precio.", pro_unidadmed='".$undmed."', pro_fecha_mod=sysdate(),  pro_usuario_mod='".$usuario."'
                   WHERE pro_codigo='".$codigo."';";
                   
            break; 
            case '3':
                $sql="delete from productos where pro_codigo='".$codigo."';";
                break;         
        } 
        //echo '<script>alert("'.$sql.'");</script>';       
        $result=$this->db->query_execute($sql);
        if (isset($result) && !empty($result)) {
            return true;
        }else{
                return false;
             }
    }//fin de insert_update

    //3.
    //tercer metodo para  cargar a la vista filtrado por un valor expecifico
    public function loaddatosupdateProducto($id){
        $sql="SELECT * FROM productos where pro_codigo='".$id."';";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //terminamos los metodos para el formulario producto

          //metodos para la vista categoria
    //1.
    //primer metodo para cargar la principal vista de datos
    public function CargarCategoria(){
        $sql="SELECT nombre, descripcion
        FROM categoria;";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //2.
    //segunda vista para insertar los datos y actualizar los datos 
    public function Insert_Update_Categoria($funcion,$codigo,$descrip){
        switch ($funcion) {
            case '1':
                $sql="INSERT INTO categoria
                (nombre, descripcion)
                VALUES('".$codigo."', '".$descrip."');";
            break;
            case '2':
                   $sql="UPDATE categoria
                   SET descripcion='".$descrip."'
                   WHERE nombre='".$codigo."';";
                   
            break; 
            case '3':
                $sql="DELETE FROM categoria
                WHERE nombre='".$codigo."';";
                break;         
        } 
        //echo '<script>alert("'.$sql.'");</script>';       
        $result=$this->db->query_execute($sql);
        if (isset($result) && !empty($result)) {
            return true;
        }else{
                return false;
             }
    }//fin de insert_update

    //3.
    //tercer metodo para  cargar a la vista filtrado por un valor expecifico
    public function loaddatosupdateCategoria($id){
        $sql="SELECT nombre, descripcion
        FROM categoria where nombre='".$id."';";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //terminamos los metodos para el formulario de encabezado de  lista de precios

      //metodos para la vista encabezado precios
    //1.
    //primer metodo para cargar la principal vista de datos
    public function CargarEncPrecios(){
        $sql="SELECT encpre_codprecio, encpre_descripcion, encpre_porcentaje, encpre_lista_principal, encpre_fecha_ing, encpre_fecha_mod,
             encpre_usuario_ing, encpre_usuario_mod
        FROM enc_precios;";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //2.
    //segunda vista para insertar los datos y actualizar los datos 
    public function Insert_Update_CargarEncPrecios($funcion,$codigo,$descrip,$usuario){
        switch ($funcion) {
            case '1':
                $sql="INSERT INTO enc_precios
                (encpre_codprecio, encpre_descripcion, encpre_porcentaje, encpre_lista_principal, encpre_fecha_ing, encpre_fecha_mod, encpre_usuario_ing, encpre_usuario_mod)
                VALUES('".$codigo."', '".$descrip."', 0, '0', sysdate(), '','".$usuario."', '');";
            break;
            case '2':
                   $sql="UPDATE enc_precios
                   SET encpre_descripcion='".$descrip."', encpre_fecha_mod=sysdate(),  encpre_usuario_mod='".$usuario."'
                   WHERE encpre_codprecio='".$codigo."';";
                   
            break; 
            case '3':
                $sql="DELETE FROM enc_precios
                WHERE encpre_codprecio='".$codigo."';";
                break;         
        } 
        //echo '<script>alert("'.$sql.'");</script>';       
        $result=$this->db->query_execute($sql);
        if (isset($result) && !empty($result)) {
            return true;
        }else{
                return false;
             }
    }//fin de insert_update

    //3.
    //tercer metodo para  cargar a la vista filtrado por un valor expecifico
    public function loaddatosupdateCargarEncPrecios($id){
        $sql="SELECT encpre_codprecio, encpre_descripcion, encpre_porcentaje, encpre_lista_principal, encpre_fecha_ing, encpre_fecha_mod,
                encpre_usuario_ing, encpre_usuario_mod
                FROM enc_precios
                WHERE encpre_codprecio='".$id."';";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //terminamos los metodos para el formulario encabezado precios

    //inicamos los metodos para el movimiento de la lista de precios
    //1.Insertamos los datos del detalle de las listas de precios
    public function Insert_DetallePrecio($funcion,$codigoPrecio,$valor,$undmed,$CodigoPro,$Usuario){
        switch ($funcion) {
            case '1':
                $sql="INSERT INTO det_precios
                (detpre_codprecio, detpre_valor, detpre_unidadmed, detpre_fecha, detpre_pro_codigo, detpre_usuario)
                VALUES('".$codigoPrecio."', ".$valor.", '".$undmed."', sysdate(), '".$CodigoPro."', '".$Usuario."');";
            break;
            case '2':
                $sql="DELETE FROM det_precios
                WHERE detpre_id=".$codigoPrecio.";
                ";
            break;                   
        } 
        //echo '<script>alert("'.$sql.'");</script>';       
        $result=$this->db->query_execute($sql);
        if (isset($result) && !empty($result)) {
            return true;
        }else{
                return false;
             }
    }//fin de insert_update
    //terminamos los metodos para el movimiento de precios


        
//------------------------------------------------------------------------------------------        
    }//fin del modelo
    

?>