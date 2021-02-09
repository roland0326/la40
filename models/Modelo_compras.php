<?php
    class Modelo_compras
    {
        private $db;
        private $usuario="Roland";
        public function __construct(){
            $this->db= new database;
        }
       
        public function LoadProductosPoppup($op){
            switch ($op) {
                case 1:
                    $sql="select p.pro_codigo codigo ,p.pro_descripcion descripcion,p.pro_categoria categoria,p.pro_unidadmed undmed,
                    (select detpre_valor 
                    from la40.det_precios 
                    where detpre_pro_codigo =p.pro_codigo  and detpre_fecha =(select max(detpre_fecha) from det_precios 
                    where detpre_pro_codigo =p.pro_codigo )) valor
                    from productos p ;";
                    break;
                
                default:
                     $sql="";
                    break;
            }
            

                $result=$this->db->query_return($sql);
                if (isset($result) && !empty($result)) {
                    return $result;
                }else{
                        return $result=[];
                     }
        }//fin function

        public function modInsertdetalle($nrodcto,$articulo,$cantidad,$descrip,$valor){
            
            $sql="INSERT INTO det_factura_compra_temp(detfac_faccom_numero, detfac_pro_codigo, ";
            $sql .="detfac_cantidad, detfac_valor, detfac_pro_descrip2, usuario) ";
            $sql .="VALUES(".$nrodcto.", '".$articulo."', ".$cantidad.", "
            .$valor.", '".$descrip."','".$this->usuario."');";    
            
             

            $result=$this->db->query_execute($sql);
            if (isset($result) && !empty($result)) {
                return true;
            }else{
                    return false;
                 }
                 
        }

        public function DeleteDetalle($IdTemp){
            $sql="DELETE FROM det_factura_compra_temp WHERE detfac_com_id='".$IdTemp."';";             
            //echo '<script>alert("'.$sql.'");</script>';
            $result=$this->db->query_execute($sql);
            if (isset($result) && !empty($result)) {
                return true;
            }else{
                    return false;
                 }
        }

        public function InsertCompras($cliente,$formapag,$usuario){

           $lista=[
               "Sql1"=>"INSERT INTO factura_compra (faccom_clientes, faccom_fecha, faccom_usuario, faccom_estado_factura, faccom_forma_pago) VALUES('".$cliente."', sysdate(), '".$usuario."', 1, ".$formapag.");
               ",
               "Sql2"=>"insert into det_factura_compra(detfac_faccom_numero, detfac_pro_codigo, detfac_cantidad,detfac_valor, detfac_pro_descrip2) select (select  ifnull(max(faccom_numero),0) consecut from factura_compra),dt.detfac_pro_codigo ,dt.detfac_cantidad ,dt.detfac_valor ,dt.detfac_pro_descrip2 from det_factura_compra_temp dt where dt.usuario ='".$usuario."'",
               "Sql3"=>"delete from det_factura_compra_temp where usuario ='".$usuario."'"
            ];           
           $result=$this->db->query_trans($lista);
            if (isset($result) && !empty($result)) {
                return $result;
            }else{
                    return $result=[];
                 }
                 
        }

        public function OperacionesCompras($opc,$lista){
            $sql="";
            switch ($opc) {
                case '1':
                   $sql="select faccom_fecha,faccom_numero Nrodcto,faccom_clientes Nit,
                   (select cli_razonsocial from clientes where cli_documento=fc.faccom_clientes) as Nombre_Cliente,
                   (select cli_direccion from clientes where cli_documento=fc.faccom_clientes) as Direccion,
                   CAST((select sum(detfac_valor*detfac_cantidad) from det_factura_compra dfc where detfac_faccom_numero=fc.faccom_numero)as DECIMAL(17,2)) Total_Fac
                   from factura_compra fc";
                    break;                
                
            }
            if ($sql!="") {
                $result=$this->db->query_return($sql);
                if (isset($result) && !empty($result)) {
                    return $result;
                }else{
                        return $result=[];
                    }
            }
            
        }//fin metodo

    }//fin de clase
?>