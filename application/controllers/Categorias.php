<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Categorias_model');
    }

	public function index()
	{
		$listaCategorias = array(
			'categorias'=> $this->Categorias_model->getAllCategorias(),
		);  
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/list', $listaCategorias);
		$this->load->view('layouts/footer');		
		
	}
	public function add()
	{		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/add');
		$this->load->view('layouts/footer');				
	}  

	public function insert()
	{
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");

		// campo a validar, alias del campo, regla de validacion is unique( tabla,. nombre campo)	
		$this->form_validation->set_rules("nombre", "Nombre", "required|alpha|min_length[3]|max_length[20]|is_unique[categoria.nombre]");

		if($this->form_validation->run()){

			$newCatergoria = array(
				'nombre' => $nombre,
				'descripcion'=> $descripcion,
				'eliminado' =>"0"
			);
	
			if($this->Categorias_model->save($newCatergoria)){
				redirect(base_url()."categorias");
			}else{
				$this->session->set_flashdata("Error","No se pudo guardar el registro");
				redirect(base_url()."categorias/add");
			}

		}else{
			$this->add();
		}

		

	//	echo $nombre." ".$descripcion; //to make test	
		
	}    

	public function edit($id){	

		$data = array(

			'categoria' => $this ->Categorias_model->getCategoriaById($id),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/edit', $data);
		$this->load->view('layouts/footer');
	}

	public function update(){

		$id = $this->input->post("idCategoria");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");

		//echo $id." ".$nombre." ".$descripcion; //to make test	
		$categoriaActual = $this->Categorias_model->getCategoriaById($id);

		if($nombre == $categoriaActual->nombre){
			$unique = '';
		}
		else{
			$unique = '|is_unique[categoria.nombre]';
		}

		$this->form_validation->set_rules("nombre", "Nombre",  "required|alpha|min_length[3]|max_length[20]".$unique);

		if($this->form_validation->run()){

				$data = array(
					'nombre' => $nombre,
					'descripcion' => $descripcion,
				);

				if($this->Categorias_model->update($id, $data)){
					redirect(base_url()."categorias");
				}else{
					$this->session->set_flashdata("Error","No se pudo actualizar el registro");
					redirect(base_url()."categorias/edit/".$id);
				}	
		}else{
			$this->edit($id);
		}

	}

	public function view($id){
		$data = array(
			'categoria' => $this ->Categorias_model->getCategoriaById($id),
		);
		$this->load->view("admin/categorias/view",$data);
	}

	public function delete($id){
		$data = array(
			'eliminado' => "1",
		);
		$this->Categorias_model->update($id, $data); //actualizamos el registro
		echo "categorias"; //return url to redirect
	}

}