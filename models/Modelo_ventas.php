<?php
    class Modelo_ventas
    {
        private $db;
        private $usuario="Roland";
        public function __construct(){
            $this->db= new database;
        }
    
        public function LoadCategoriasPoppup($op){
            switch ($op) {
                case 1:
                    $sql="select sal_cat_nombre categoria , sum(sal_cant_in) compras , sum(sal_cant_out) ventas, sum((sal_cant_in-sal_cant_out)) saldo ";
                    $sql .="from saldo_inv si ";
                    $sql .="group by sal_cat_nombre ";
                    $sql .="having sum((sal_cant_in-sal_cant_out))<>0";
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

        public function modInsertdetalleVenta($nrodcto,$articulo,$cantidad,$descrip,$valor,$identificacion){
                       
            $sql="INSERT INTO det_factura_venta_temp ";
            $sql .="(detfac_ven_numero, detfac_ven_categoria, detfac_ven_cant, detfac_ven_valor, detfac_descrip, usuario, cli_documento) ";
            $sql .="VALUES(".$nrodcto.",'".$articulo."', ".$cantidad.", ".$valor.", '".$descrip."', '".$this->usuario."', '".$identificacion."'); ";

            $result=$this->db->query_execute($sql);
            if (isset($result) && !empty($result)) {
                return true;
            }else{
                    return false;
                 }
                 
        }//fin modInsertdetalleVenta

        public function EditTemporalVentasId($IdTemp){
            $sql="";       
            $sql="select dv.detfac_ven_categoria ,dv.detfac_descrip ,dv.detfac_ven_cant ,dv.detfac_ven_valor ,dv.detfac_ven_id,s.saldo  ";
            $sql.="from det_factura_venta_temp dv ";
            $sql.="inner join v_saldo_inv s on s.categoria=dv.detfac_ven_categoria ";
            $sql.="where dv.detfac_ven_id  ='".$IdTemp."' ";
            if ($sql!="") {
                $result=$this->db->query_return($sql);
                if (isset($result) && !empty($result)) {
                    return $result;
                }else{
                        return $result=[];
                    }
            }
        }//fin EditTemporalVentasId

        public function editComprasVentas( $valor,$cantidad,$id){
            $sql="update det_factura_venta_temp set detfac_ven_cant=".$cantidad.",detfac_ven_valor=".$valor." ";
            $sql.="where detfac_ven_id ='".$id."'";
            //echo '<script>alert("'.$sql.'");</script>';
            $result=$this->db->query_return($sql);
            if (isset($result) && !empty($result)) {
                return $result;
            }else{
                    return $result=[];
                 }
        }//fin editComprasVentas

        public function DeleteDetalleVentas($IdTemp){
            $sql="DELETE FROM det_factura_venta_temp WHERE detfac_ven_id='".$IdTemp."';";             
            //echo '<script>alert("'.$sql.'");</script>';
            $result=$this->db->query_execute($sql);
            if (isset($result) && !empty($result)) {
                return true;
            }else{
                    return false;
                 }
        }//fin DeleteDetalleVentas

        public function InsertVentas($cliente,$formapag,$usuario){
            $Encabezado="INSERT INTO factura_venta ";
            $Encabezado .="( facven_clientes, facven_fecha, facven_usuario, facven_estado_factura, ";
            $Encabezado .="facven_forma_pago) ";
            $Encabezado .="VALUES('".$cliente."', sysdate(),  '".$usuario."', 1,  ".$formapag."); ";

            $detalle="INSERT INTO det_factura_venta (detfac_facven_numero, detfac_pro_codigo, detfac_cantidad, ";
            $detalle .="detfac_valor, detfac_pro_descrip2) ";
            $detalle .="select (select  ifnull(max(facven_numero),0) consecut from factura_venta),dt.detfac_ven_categoria , ";
            $detalle .="dt.detfac_ven_cant , ";
            $detalle .="dt.detfac_ven_valor ,dt.detfac_descrip from det_factura_venta_temp dt ";
            $detalle .="where dt.cli_documento ='".$cliente."'";

            $lista=[
                "Sql1"=>$Encabezado,
                "Sql2"=>$detalle,
                "Sql3"=>"delete from det_factura_venta_temp where cli_documento ='".$cliente."'"
             ];           
            $result=$this->db->query_trans($lista);
             if (isset($result) && !empty($result)) {
                 return $result;
             }else{
                     return $result=[];
                  }
                  
         }//fin InsertVentas

         public function OperacionesVentas($opc,$lista){
            $sql="";
            switch ($opc) {
                case '1':
                   $sql="select fc.facven_fecha,fc.facven_numero Nrodcto,fc.facven_clientes Nit, ";
                   $sql.="(select cli_razonsocial from clientes where cli_documento=fc.facven_clientes) as Nombre_Cliente, ";
                   $sql.="(select cli_direccion from clientes where cli_documento=fc.facven_clientes) as Direccion, ";
                   $sql.="CAST((select sum(detfac_valor*detfac_cantidad) from det_factura_venta dfc where detfac_facven_numero=fc.facven_numero)as DECIMAL(17,2)) Total_Fac ";
                   $sql.="from factura_venta fc";
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
      
    }