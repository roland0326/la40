<?php
    class Modelo_clientes
    {
        private $db;
        public function __construct(){
            $this->db= new database;
        }
    
        //metodos para la vista ciudad
    //1.
    //primer metodo para cargar la principal vista de datos
    public function CargarCliente(){
        $sql="SELECT cli.cli_documento,
(select tipdoc_descripcion from tipo_documento where tipdoc_id =cli.cli_tipodocumento ) as cli_tipodocumento,
cli.cli_razonsocial,
cli.cli_telefono,
cli.cli_celular,
cli.cli_correo,
(select ciu_nombre from ciudad where ciu_id =cli.cli_ciudad ) as cli_ciudad,
(select pa_nombre from pais where pa_id = cli.cli_pais ) as cli_pais,
case when cli.cli_estado='1' then ('Activo') else ('Inactivo') end as cli_estado,
cli.cli_codlista,
cli.cli_direccion, 
cli.cli_fecha_ing, 
cli.cli_fecha_mod,
cli.cli_usuario_ing,
cli.cli_usuario_mod 
FROM clientes cli;";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    public function CargarClienteActivos(){
        $sql="SELECT cli.cli_documento,
(select tipdoc_descripcion from tipo_documento where tipdoc_id =cli.cli_tipodocumento ) as cli_tipodocumento,
cli.cli_razonsocial,
cli.cli_telefono,
cli.cli_celular,
cli.cli_correo,
(select ciu_nombre from ciudad where ciu_id =cli.cli_ciudad ) as cli_ciudad,
(select pa_nombre from pais where pa_id = cli.cli_pais ) as cli_pais,
case when cli.cli_estado='1' then ('Activo') else ('Inactivo') end as cli_estado,
cli.cli_codlista,
cli.cli_direccion, 
cli.cli_fecha_ing, 
cli.cli_fecha_mod,
cli.cli_usuario_ing,
cli.cli_usuario_mod 
FROM clientes cli
where cli.cli_estado='1';";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //2.
    //segunda vista para insertar los datos y actualizar los datos 
    public function Insert_Update_Cliente($funcion,$n_documento,$tipodoc,$razon,$direccion,$telefono,$celular,$correo,$ciudad,$pais,$codlista,$estado,$usuario){
        switch ($funcion) {
            case '1':
                $sql="INSERT INTO clientes (cli_documento, cli_tipodocumento, cli_razonsocial, cli_telefono, cli_celular, cli_correo,
                 cli_ciudad, cli_pais, cli_codlista, cli_estado, cli_direccion, cli_fecha_ing, cli_fecha_mod, cli_usuario_ing, cli_usuario_mod)
                  VALUES('".$n_documento."', '".$tipodoc."', '".$razon."', '".$telefono."', '".$celular."', '".$correo."', '".$ciudad."', '".$pais."',
                  '".$codlista."', '".$estado."','".$direccion."', sysdate(), NULL, '".$usuario."', 'NULL');";
                
            break;
            case '2':
                   $sql="UPDATE clientes SET cli_tipodocumento='".$tipodoc."', cli_razonsocial='".$razon."', cli_telefono='".$telefono."',
                    cli_celular='".$celular."', cli_correo='".$correo."', cli_ciudad='".$ciudad."', cli_pais='".$pais."', cli_estado='".$estado."',
                     cli_codlista='".$codlista."', cli_direccion='".$direccion."',cli_fecha_mod=sysdate(), cli_usuario_mod='".$usuario."' 
                     WHERE cli_documento='".$n_documento."';";
                   //echo $sql;
                    
                   
            break; 
            case '3':
                $sql="delete from clientes where cli_documento='".$n_documento."';";
                break;         
        } 
        //echo '<script>alert("'.$sql.'");</script>';       
        $result=$this->db->query_execute($sql);
        if (isset($result) && !empty($result)) {
            return true;
        }else{
                return false;
             }
    }//fin de insert_update_ciudades

    //3.
    //tercer metodo para  cargar a la vista filtrado por un valor expecifico
    public function loaddatosupdateCliente($n_documento){
        $sql="SELECT * FROM clientes where cli_documento='".$n_documento."';";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }

    //terminamos los metodos para el formulario ciudad
       
    //metodo para cargar los datos filtrados para las facturas de compra
    public function CargarClienteActivosCompra($Nit){
        $sql="SELECT cli.cli_documento,
(select tipdoc_descripcion from tipo_documento where tipdoc_id =cli.cli_tipodocumento ) as cli_tipodocumento,
cli.cli_razonsocial,
cli.cli_telefono,
cli.cli_celular,
cli.cli_correo,
(select ciu_nombre from ciudad where ciu_id =cli.cli_ciudad ) as cli_ciudad,
(select pa_nombre from pais where pa_id = cli.cli_pais ) as cli_pais,
case when cli.cli_estado='1' then ('Activo') else ('Inactivo') end as cli_estado,
cli.cli_codlista,
cli.cli_direccion, 
cli.cli_fecha_ing, 
cli.cli_fecha_mod,
cli.cli_usuario_ing,
cli.cli_usuario_mod 
FROM clientes cli
where cli.cli_estado='1' and cli.cli_documento='".$Nit."';";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
    }
//------------------------------------------------------------------------------------------        
    }//fin del modelo
    

?>