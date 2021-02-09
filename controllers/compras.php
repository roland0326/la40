<?php 
    class compras
    {
        private $mod_com;
        private $mod_cli;
        private $usuario="Roland";
        public function __construct(){
            require_once "models/Modelo_compras.php";
            require_once "models/Modelo_clientes.php";
            $this->mod_cli=new Modelo_clientes;
            $this->mod_com= new Modelo_compras;
        }

        public function LoadContenedor(){
            require_once 'views/Compras/Frm_Contenedor_Compras.php';
        }

        public function LoadDocCompras(){
            if(!empty($this->mod_cli->CargarClienteActivos())){
                $datos=$this->mod_cli->CargarClienteActivos();
                 //print_r($datos);
                require_once "views/Compras/Documentos/Frm_Compras_documentos_datos.php";
            }else{
                    $datos=[];
                    require_once "views/Compras/Documentos/Frm_Compras_documentos_datos.php";

                }
        }//fin loadDocCompras

        public function CargarDetalleCompra($Nit){
            if (!empty($this->mod_cli->CargarClienteActivosCompra($Nit))) {
                $datos=$this->mod_cli->CargarClienteActivosCompra($Nit);
                require_once "views/Compras/Documentos/Frm_Detalle_Comp_Crud.php";
            }
            $datos=[];
                    require_once "views/Compras/Documentos/Frm_Detalle_Comp_Crud.php";
        }
        
        public function ModalCompra(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $Op=$_POST['opc'];
                switch ($Op) {
                    case 1:
                        $datos=$this->mod_com->LoadProductosPoppup(1);
                    // print_r($datos);					 
                        $JsonString=json_encode($datos);
                        echo $JsonString;
                        break;
                    
                  
                }//fin de switch
            }
        }

        public function InsertDetalle(){
            if($_SERVER['REQUEST_METHOD']=='POST'){

                
                 $nrodcto=$_POST['nrodcto'];
                 $articulo=$_POST['articulo'];
                 $cantidad=$_POST['cantidad'];
                 $descrip=$_POST['descrip'];
                 $valor=$_POST['valor'];
                 //echo '<script>alert("'.$nrodcto.$articulo.$cantidad.$descrip.$valor.'");</script>';
                 $datos=$this->mod_com->modInsertdetalle($nrodcto,$articulo,$cantidad,$descrip,$valor);
                 require_once 'views/Compras/Documentos/TableDetalle/Frm_Table_detalle.php';

            }
        }//fin insert

        public function DeleteDetalle(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $IdTemp=$_POST['IdTemp'];
                $datos=$this->mod_com->DeleteDetalle($IdTemp);
                require_once 'views/Compras/Documentos/TableDetalle/Frm_Table_detalle.php';
            }
        }

        public function InsertCompras(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $cliente=$_POST['cliente'];
                $formapag=$_POST['formapag'];
                $datos=$this->mod_com->InsertCompras($cliente,$formapag,$this->usuario);
                if (!empty($datos)) {
                    LoadDocCompras();
                }
                $JsonString=json_encode($datos);
                echo $JsonString;
               
            }
        }

        public function LoadListCompras(){
            $lista=[];
            if (!empty($this->mod_com->OperacionesCompras(1,$lista))) {
                $datos=$this->mod_com->OperacionesCompras(1,$lista);
                require_once 'views/Compras/Informes/Frm_Compras_Informes_Datos.php';
            }else{
                $datos=[];
                require_once 'views/Compras/Informes/Frm_Compras_Informes_Datos.php';
            }
           
        }

        public function LoadFormatoImpresion($id){
            if ($id) {
                $datos=[
                    "id"=>$id
                ];
            require_once 'views/Compras/Informes/Formato_de_impresion.php';
            }else{
                $datos=[];
                require_once 'views/Compras/Informes/Formato_de_impresion.php';
            }
            
        }
        
    }//fin clase
    
?>