<?php
    class Funciones_globales
    {
        private $db;
        private $usuario="Roland";
        public function __construct(){
            $this->db= new database;
        }

        public function LoadComboUndMed(){
            $sql="SELECT * FROM unidad_medida;";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
        }
        public function LoadComboCategoria(){
            $sql="SELECT * FROM categoria;";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
        }

        public function LoadComboMaePrecios(){
            $sql="SELECT * FROM enc_precios;";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
        }

        public function LoadTablePrecios($codigo,$undmed){
            $sql="SELECT detpre_id, detpre_codprecio, detpre_valor, detpre_unidadmed, detpre_fecha, detpre_pro_codigo, detpre_usuario
            FROM det_precios
            where detpre_pro_codigo='".$codigo."' and detpre_unidadmed='".$undmed."';";
			$result=$this->db->query_return($sql);
			if (isset($result) && !empty($result)) {
				return $result;
			}else{
					return $result=[];
				 }
		}
		
		public function LoadComboTipodcto(){
            $sql="SELECT * FROM tipo_documento;";
            $result=$this->db->query_return($sql);
            if (isset($result) && !empty($result)) {
                return $result;
            }else{
                    return $result=[];
                 }
        }

    //fin de clase

    //combo ciudad
    public function LoadComboCiudad(){
            $sql="SELECT * FROM ciudad;";
            $result=$this->db->query_return($sql);
            if (isset($result) && !empty($result)) {
                return $result;
            }else{
                    return $result=[];
                 }
        }

      //combo pais
    public function LoadComboPais(){
            $sql="SELECT * FROM pais;";
            $result=$this->db->query_return($sql);
            if (isset($result) && !empty($result)) {
                return $result;
            }else{
                    return $result=[];
                 }
        }  

    public function LoadComboLista(){
            $sql="SELECT * FROM enc_precios;";
            $result=$this->db->query_return($sql);
            if (isset($result) && !empty($result)) {
                return $result;
            }else{
                    return $result=[];
                 }
        }  


    public function ComboFormPago(){
        $sql="SELECT * FROM forma_pago;";
        $result=$this->db->query_return($sql);
        if (isset($result) && !empty($result)) {
            return $result;
        }else{
                return $result=[];
             }
    }  
    public function NrodctoCompra(){
        $sql="select  ifnull(max(faccom_numero),0)+1 consecut from factura_compra;";
        $result=$this->db->query_return($sql);
        if (isset($result) && !empty($result)) {
            //print_r($result);
            foreach ($result as $row) {
             return   $nrodcto=$row['consecut'];
            }
        }else{
                return $nrodcto;
             }
    }

    public function NrodctoVenta(){
        $sql="select  ifnull(max(facven_numero),0)+1 consecut from factura_venta;";
        $result=$this->db->query_return($sql);
        if (isset($result) && !empty($result)) {
            //print_r($result);
            foreach ($result as $row) {
             return   $nrodcto=$row['consecut'];
            }
        }else{
                return $nrodcto;
             }
    }

    public function DatosTemp($cliente){
        $sql='';
        $sql="select detfac_com_id, detfac_pro_codigo ,detfac_pro_descrip2 ,detfac_valor ,";
        $sql.="detfac_cantidad as cantidad,cast((detfac_valor*detfac_cantidad) as int) as vlrtotal ";
        $sql.="from det_factura_compra_temp ";
        $sql.="where cli_documento ='".$cliente."';";
        //echo $sql;
        $result=$this->db->query_return($sql);
        
        if (isset($result) && !empty($result)) {
            //print_r($result);
            foreach ($result as $row) {
             return   $result;
            }
        }else{
                return $result=[];
             }
    }
    public function DatosTempVenta($cliente){
        $sql='';
        $sql="select detfac_ven_id , detfac_ven_categoria , detfac_descrip , detfac_ven_valor , ";
        $sql.="detfac_ven_cant  as cantidad, cast((detfac_ven_valor*detfac_ven_cant) as int) as vlrtotal ";
        $sql.="from det_factura_venta_temp ";
        $sql.="where cli_documento ='".$cliente."'; ";
        //echo $sql;
        $result=$this->db->query_return($sql);
        
        if (isset($result) && !empty($result)) {
            //print_r($result);
            foreach ($result as $row) {
             return   $result;
            }
        }else{
                return $result=[];
             }
    }

    public function LoadEmpresa(){
        $sql="select emp_razon_social ,emp_nit documento,emp_direccion ,emp_telefono ,emp_correo ";
        $sql.="from empresa e2";

        $result=$this->db->query_return($sql);
        if (isset($result) && !empty($result)) {
            //print_r($result);
            foreach ($result as $row) {
             return   $result;
            }
        }else{
                return $result=[];
             }
    }
    public function LoadDatosCompra($nrodcto){
        $sql="select detfac_pro_codigo ,d.detfac_pro_descrip2,d.detfac_cantidad ,d.detfac_valor "; 
        $sql.="from det_factura_compra d ";
        $sql.="where d.detfac_faccom_numero ='".$nrodcto."'";

        $result=$this->db->query_return($sql);
        if (isset($result) && !empty($result)) {
            //print_r($result);
            foreach ($result as $row) {
             return   $result;
            }
        }else{
                return $result=[];
             }
    }
}//fin de clase
    
?>