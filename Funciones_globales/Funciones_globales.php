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

    public function DatosTemp(){
        $sql="select detfac_com_id, detfac_pro_codigo ,detfac_pro_descrip2 ,detfac_valor ,
        detfac_cantidad as cantidad,cast((detfac_valor*detfac_cantidad) as int) as vlrtotal
        from det_factura_compra_temp
        where usuario ='".$this->usuario."';";
        $result=$this->db->query_return($sql);
        if (isset($result) && !empty($result)) {
            //print_r($result);
            foreach ($result as $row) {
             return   $result;
            }
        }else{
                return $$result=[];
             }
    }
}//fin de clase
    
?>