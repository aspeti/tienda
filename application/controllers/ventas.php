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
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('store/list');
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
}