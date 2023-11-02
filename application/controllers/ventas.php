<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ventas extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Ventas_model');
		$this->load->model('Cliente_model');
		$this->load->model('Producto_model');

    }

    public function index()
	{
		$data = array(
			"ventas" => $this->Ventas_model->getAllVentas(),					
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('store/list', $data);
		$this->load->view('layouts/footer');		
		
	}

    public function add()
	{		  
		$data = array(
			"comprobantes" => $this->Ventas_model->getAllComprobantes(),
			"clientes" => $this->Cliente_model->getAllClientes(),
			"productos" => $this->Producto_model->getAllproductos()			
		);
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('store/add', $data);
		$this->load->view('layouts/footer');		
		
	}

	public function agregarventa()
	{
		
		$subtotal = $this->input->post("subtotal");
		$igv = $this->input->post("igv");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("txttotal");
		$idcliente = $this->input->post("idcliente");
		$serie = $this->input->post("serie");
		$num_documento = $this->input->post("numero");
		$id_usuario = $this->session->userdata("id_usuario");
		$id_comprobante = $this->input->post("idcomprobante");

		

		$productos_id = $this->input->post("idcodigo");		
		$precios =      $this->input->post("precios");
		$cantidades =   $this->input->post("cantidad");
		$importes =     $this->input->post("importe");

		//echo 'sub'.$subtotal.'* igv:'.$igv.'* total:'.$total.'* idcliente'.$idcliente.'* serie'.$serie.'* num_docu:'.$num_documento.'* id_usuario:'.$id_usuario.'* id_comprobante:'.$id_comprobante;
			
		$data = array(
			'fecha_creacion' => date('Y-m-d H:i:s'),
			'eliminado' => "0",
			'subtotal'=> "0",
			'igv'=> $igv,
			'descuento'=> $descuento,			
			'total'=> $total,
			'id_cliente'=> $idcliente,
			'serie'=> $serie,
			'num_documento'=> $num_documento,
			'id_usuario'=> $id_usuario,
			'id_comprobante'=> $id_comprobante			
		);

		if($this->Ventas_model->save($data)){

			$idVenta= $this->Ventas_model->lastId();
			$this->update_Comprobante($id_comprobante);
			$this->save_detalle($productos_id,$idVenta,$precios,$cantidades,$importes);
			redirect(base_url()."ventas");

		}else{
			redirect(base_url()."ventas/add");		}

	}

	protected function update_Comprobante($idComprobante)
	{

		$comprobanteActual = $this->Ventas_model->getComprobante($idComprobante);

		$data = array(
			'cantidad' => $comprobanteActual->cantidad + 1, 
		);

		$this->Ventas_model->updateComprobante($idComprobante,$data);
	}

	protected function save_detalle($productos,$idVenta,$precios,$cantidades,$importes){
        for($i=0; $i<count($productos);$i++){
            $data = array(
                'id_producto' => $productos[$i],
                'id_venta' => $idVenta,
                'precio' => $precios[$i],
                'cantidad' => $cantidades[$i],
                'importe' => $importes[$i],
				'fecha_creacion' => date('Y-m-d H:i:s'),
				'fecha_actualizacion' => date('Y-m-d H:i:s'),
				'eliminado' => "0"
            );
            $this->Ventas_model->save_detalle($data);
			$this->updateProducto($productos[$i],$cantidades[$i]);
        }

    }

	protected function updateProducto($idProducto,$cantidad){

		$productoActual = $this->Producto_model->getProductoById($idProducto);
		$data = array(
			'stock' => $productoActual->stock - $cantidad,
		);
		$this->Producto_model->update($idProducto, $data);
	}

}