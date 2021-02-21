<?php
    class ventas 
    {

        public function __construct(){
            require_once "models/Modelo_ventas.php";
            $this->mod_ven= new Modelo_ventas;
            require_once "models/Modelo_clientes.php";
            $this->mod_cli=new Modelo_clientes;
        }

        public function LoadContVentas(){
            $datos=[];
            require_once 'views/Ventas/Frm_Contenedor_Ventas.php';
        }//fin de loadcontventas

        public function LoadDocVentas(){
            if(!empty($this->mod_cli->CargarClienteActivos())){
                $datos=$this->mod_cli->CargarClienteActivos();
                 //print_r($datos);
                require_once "views/Ventas/Documentos/Frm_Ventas_documentos_datos.php";
            }else{
                    $datos=[];
                    require_once "views/Ventas/Documentos/Frm_Ventas_documentos_datos.php";

                }
        }//fin LoadDocVentas

        public function CargarDetalleVenta($Nit){
            if (!empty($this->mod_cli->CargarClienteActivosCompra($Nit))) {
                $datos=$this->mod_cli->CargarClienteActivosCompra($Nit);
                require_once "views/Ventas/Documentos/Frm_Detalle_Venta_Crud.php";
            }
            $datos=[];
                    require_once "views/Ventas/Documentos/Frm_Detalle_Venta_Crud.php";
        }//fin CargarDetalleVenta

        public function ModalVenta(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $Op=$_POST['opc'];
                switch ($Op) {
                    case 1:
                        $datos=$this->mod_ven->LoadCategoriasPoppup(1);
                        //print_r($datos);					 
                        $JsonString=json_encode($datos);
                        echo $JsonString;
                        break;
                    
                  
                }//fin de switch
            }
        }// fin ModalVenta

        public function InsertDetalleVenta(){
            if($_SERVER['REQUEST_METHOD']=='POST'){                
                 $nrodcto=$_POST['nrodcto'];
                 $articulo=$_POST['articulo'];
                 $cantidad=$_POST['cantidad'];
                 $descrip=$_POST['descrip'];
                 $valor=$_POST['valor'];
                 $identificacion=$_POST['identificacion'];

                 //echo '<script>alert("'.$nrodcto.$articulo.$cantidad.$descrip.$valor.$identificacion.'");</script>';
                 $this->mod_ven->modInsertdetalleVenta($nrodcto,$articulo,$cantidad,$descrip,$valor,$identificacion);
                 $datos=[
                    "identi"=>$identificacion
                 ];
                 require_once 'views/Ventas/Documentos/TableDetalle/Frm_Table_detalle.php';

            }
        }//fin insert

        public function EditVenta(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $IdTemp=$_POST['IdTemp'];                
                        $datos=$this->mod_ven->EditTemporalVentasId($IdTemp);
                    // print_r($datos);					 
                        $JsonString=json_encode($datos);
                        echo $JsonString;         
     
            }
        }
        
        public function ActualizartemporalVentas(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $valor=$_POST['valor'];
                $cantidad=$_POST['cantidad'];
                $id=$_POST['id'];
                //echo '<script>alert("'.$id.'");</script>';
                $datos=$this->mod_ven->editComprasVentas($valor,$cantidad,$id);               
                $JsonString=json_encode($datos);
                echo $JsonString;
               
            }
        }//fin ActualizartemporalVentas

        public function DeleteDetalleVenta(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $IdTemp=$_POST['IdTemp'];
                $identificacion=$_POST['identificacion'];
                $this->mod_ven->DeleteDetalleVentas($IdTemp);
                $datos=[
                    "identi"=>$identificacion
                 ];
                require_once 'views/Ventas/Documentos/TableDetalle/Frm_Table_detalle.php';
            }
        }//fin DeleteDetalleVenta

        public function InsertVentas(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $cliente=$_POST['cliente'];
                $formapag=$_POST['formapag'];
                $datos=$this->mod_ven->InsertVentas($cliente,$formapag,$this->usuario);
                if (!empty($datos)) {
                    LoadDocVentas();
                }
                $JsonString=json_encode($datos);
                echo $JsonString;
               
            }
        }//fin InsertVentas

        public function LoadListVentas(){
            $lista=[];
            if (!empty($this->mod_ven->OperacionesVentas(1,$lista))) {
                $datos=$this->mod_ven->OperacionesVentas(1,$lista);
                require_once 'views/Ventas/Informes/Frm_Ventas_Informes_Datos.php';
            }else{
                $datos=[];
                require_once 'views/Ventas/Informes/Frm_Ventas_Informes_Datos.php';
            }
           
        }//fin LoadListVentas
        
    }//fin de la clase ventas
    
?>