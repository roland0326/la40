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

        public function CargarDetalleCompra(){
            $datos=[];
                    require_once "views/Compras/Documentos/Frm_Detalle_Comp_Crud.php";
        }
        
    }//fin clase
    
?>