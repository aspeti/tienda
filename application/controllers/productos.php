<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Producto_model');
		$this->load->model('Categorias_model');
    }

	public function index()
	{
		$lista = array(
			'productos'=> $this->Producto_model->getAllproductos(),
		);  

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/list', $lista);
		$this->load->view('layouts/footer');			
	}

	public function add()
	{		
		$data = array (
			"categorias" => $this->Categorias_model->getAllCategorias(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/add', $data);
		$this->load->view('layouts/footer');				
	}  

	public function insert()
	{
		$nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $precio = $this->input->post("precio");
        $id_categoria = $this->input->post("idCategoria");

			//echo ($nombre.'-'.$apellido.'-'.$ci.'-'.$direccion.'-'.$celular.'-'.$email.'-'.$id_rol.'*'.md5($password));

		$this->form_validation->set_rules("nombre", "Nombre", "required|alpha|min_length[3]|max_length[20]|is_unique[producto.nombre]");
		$this->form_validation->set_rules("precio", "Precio", "required|numeric");
        
		if($this->form_validation->run()){	

				$newProducto = array(
					'nombre' => $nombre,
					'descripcion'=> $descripcion,		
					'precio'=> $precio,
					'eliminado' => "0",
					'id_categoria' => $id_categoria,
					'fecha_creacion' => date('Y-m-d H:i:s'),
					'fecha_actualizacion' => date('Y-m-d H:i:s')
				);

				if($this->Producto_model->save($newProducto)){
					redirect(base_url()."productos");
				}else{
					$this->session->set_flashdata("Error","No se pudo guardar el registro");
					redirect(base_url()."productos/add");
				}

		}else{
			$this->add();
		}

		//	echo $nombre." ".$descripcion; //to make test	
		
	}

	public function edit($id){	

		$data = array(

			'producto' => $this ->Producto_model->getProductoById($id),
			"categorias" => $this->Categorias_model->getAllCategorias()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/edit', $data);
		$this->load->view('layouts/footer');
	}

	public function update(){

        $id = $this->input->post("idProducto");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $precio = $this->input->post("precio");
        $id_categoria = $this->input->post("idCategoria");

		//echo $id." ".$nombre." ".$descripcion; //to make test	

		$productoActual = $this->Producto_model->getProductoById($id);

		if($nombre == $productoActual->nombre){
			$unique = '';
		}
		else{
			$unique = '|is_unique[producto.nombre]';
		}

		$this->form_validation->set_rules("nombre", "Nombre", "required|alpha|min_length[3]|max_length[20]".$unique);
		$this->form_validation->set_rules("precio", "Precio", "required|numeric");
        
		if($this->form_validation->run()){

				$data = array(
					'nombre' => $nombre,
					'descripcion' => $descripcion,
					'precio' => $precio,
					'id_categoria' => $id_categoria,
					'fecha_actualizacion' => date('Y-m-d H:i:s')			
				);

				if($this->Producto_model->update($id, $data)){
					redirect(base_url()."productos");
				}else{
					$this->session->set_flashdata("Error","No se pudo actualizar el registro");
					redirect(base_url()."productos/edit/".$id);
				}	

		}else{
			$this->edit($id);
		}
	}

	public function view($id){		
		$data = array(
			'producto' => $this ->Producto_model->getProductoById($id),
		);		
		$this->load->view("admin/productos/view",$data);
	}

	public function delete($id){
		$data = array(
			'eliminado' => "1",
		);
		$this->Producto_model->update($id, $data); //actualizamos el registro
		echo "productos"; //return url to redirect
	}

	


}