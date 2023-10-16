<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Cliente_model');
    }

	public function index()
	{
		$listaClientes = array(
			'clientes'=> $this->Cliente_model->getAllClientes(),
		);  
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('cliente/list', $listaClientes);
		$this->load->view('layouts/footer');		
		
	}
	public function add()
	{		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('cliente/add');
		$this->load->view('layouts/footer');				
	}  

	public function insert()
	{
		$nombre = $this->input->post("nombre");
		$num_documento = $this->input->post("num_documento");
		$telefono = $this->input->post("telefono");
		$direccion = $this->input->post("direccion");

		// campo a validar, alias del campo, regla de validacion is unique( tabla,. nombre campo)	
		$this->form_validation->set_rules("nombre", "Nombre", "required|alpha_numeric_spaces|min_length[3]|max_length[20]|is_unique[cliente.nombre]");

		if($this->form_validation->run()){

			$newClient = array(
				'nombre' => $nombre,
				'num_documento'=> $num_documento,
				'telefono'=> $telefono,
				'direccion'=> $direccion,
				'eliminado' =>"0",
				'fecha_creacion' => date('Y-m-d H:i:s'),
			    'fecha_actualizacion' => date('Y-m-d H:i:s'),
				'id_tipo_cliente'=>"1",
				'id_tipo_documento'=>"1",
			);
	
			if($this->Cliente_model->save($newClient)){
				redirect(base_url()."clientes");
			}else{
				$this->session->set_flashdata("Error","No se pudo guardar el registro");
				redirect(base_url()."clientes/add");
			}

		}else{
			$this->add();
		}

		

	//	echo $nombre." ".$descripcion; //to make test	
		
	}    

	public function edit($id){	

		$data = array(

			'cliente' => $this ->Cliente_model->getClienteById($id),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('cliente/edit', $data);
		$this->load->view('layouts/footer');
	}

	public function update(){

		$id = $this->input->post("idCliente");
		$nombre = $this->input->post("nombre");
		$direccion = $this->input->post("direccion");
		$telefono = $this->input->post("telefono");
		$num_documento = $this->input->post("num_documento");

		//echo $id." ".$nombre." ".$direccion.$telefono." ".$num_documento; //to make test	
		$ClienteActual = $this->Cliente_model->getClienteById($id);

		
		if($num_documento == $ClienteActual->num_documento){
			$unique = '';
		}
		else{
			$unique = '|is_unique[cliente.num_documento]';                       
		}

		$this->form_validation->set_rules("num_documento", "Numero de Documento",  "required|alpha_dash|min_length[3]|max_length[10]".$unique);
		$this->form_validation->set_rules("nombre", "Nombre", "required|alpha|min_length[3]|max_length[20]");
		$this->form_validation->set_rules("telefono", "Telefono", "required|numeric|min_length[3]|max_length[8]");



		if($this->form_validation->run()){

				$data = array(
					'nombre' => $nombre,
					'direccion' => $direccion,
					'telefono' => $telefono,
					'num_documento' => $num_documento,
					'fecha_actualizacion' => date('Y-m-d H:i:s')
				);

				if($this->Cliente_model->update($id, $data)){
					redirect(base_url()."clientes");
				}else{
					$this->session->set_flashdata("Error","No se pudo actualizar el registro");
					redirect(base_url()."cliente/edit/".$id);
				}	
		}else{
			$this->edit($id);
		}

	}

	public function view($id){
		$data = array(
			'cliente' => $this->Cliente_model->getClienteById($id),
		);
		$this->load->view("cliente/view",$data);
	}

	public function delete($id){
		$data = array(
			'eliminado' => "1",
		);
		$this->Cliente_model->update($id, $data); //actualizamos el registro
		echo "clientes"; //return url to redirect
	}

}