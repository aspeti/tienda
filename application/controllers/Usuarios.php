<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
    }

	public function index()
	{
		$lista = array(
			'usuarios'=> $this->Usuario_model->getAllUsuarios(),
		);  

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/list', $lista);
		$this->load->view('layouts/footer');			
	}

	public function add()
	{		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/add');
		$this->load->view('layouts/footer');				
	}  

	public function insert()
	{
		$nombre = $this->input->post("nombre");
		$apellido = $this->input->post("apellido");
		$ci = $this->input->post("ci");
		$direccion = $this->input->post("direccion");
		$celular = $this->input->post("celular");
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$id_rol = $this->input->post("rol");

			//echo ($nombre.'-'.$apellido.'-'.$ci.'-'.$direccion.'-'.$celular.'-'.$email.'-'.$id_rol.'*'.md5($password));
		$this->form_validation->set_rules("nombre", "Nombre", "required|alpha|min_length[3]|max_length[20]");
		$this->form_validation->set_rules("apellido", "Apellido", "required|alpha|min_length[3]|max_length[20]");
		$this->form_validation->set_rules("celular", "Celular", "trim|numeric|required|min_length[8]|max_length[8]");
		$this->form_validation->set_rules("direccion", "Direccion", "required|min_length[3]|max_length[30]");
		$this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[usuario.email]");
		$this->form_validation->set_rules("password", "Password", 'required|min_length[5]|max_length[20]');
		
		if($this->form_validation->run()){

				$newUser = array(
					'nombre' => $nombre,
					'apellido'=> $apellido,
					'ci'=> $ci,
					'direccion'=> $direccion,
					'celular'=> $celular,
					'email' => $email,
					'password' => md5($password),
					'id_rol' => $id_rol,
					'eliminado' => "0",
					'fecha_creacion' => date('Y-m-d H:i:s'),
					'fecha_actualizacion' => date('Y-m-d H:i:s')
				);

				if($this->Usuario_model->save($newUser)){
					redirect(base_url()."usuarios");
				}else{
					$this->session->set_flashdata("Error","No se pudo guardar el registro");
					redirect(base_url()."usuarios/add");
				}
		}else{
			$this->add();
		}

		//	echo $nombre." ".$descripcion; //to make test	
		
	}

	public function edit($id){	

		$data = array(

			'usuario' => $this ->Usuario_model->getUsuarioById($id),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/edit', $data);
		$this->load->view('layouts/footer');
	}

	public function update(){

		$id = $this->input->post("idusuario");
		$nombre = $this->input->post("nombre");
		$apellido = $this->input->post("apellido");
		$ci = $this->input->post("ci");
		$direccion = $this->input->post("direccion");
		$celular = $this->input->post("celular");
		$email = $this->input->post("email");
		$rol = $this->input->post("rol");		

		//echo $id." ".$nombre." ".$descripcion; //to make test	

		$user = $this ->Usuario_model->getUsuarioById($id);

		if($email == $user->email){
			$unique = '';
		}
		else{
			$unique = '|is_unique[usuario.email]';
		}
		
		
		$this->form_validation->set_rules("nombre", "Nombre", "required|alpha|min_length[3]|max_length[20]");
		$this->form_validation->set_rules("apellido", "Apellido", "required|alpha|min_length[3]|max_length[20]");
		$this->form_validation->set_rules("celular", "Celular", "trim|numeric|required|min_length[8]|max_length[8]");
		$this->form_validation->set_rules("direccion", "Direccion", "required|min_length[3]|max_length[30]");
		$this->form_validation->set_rules("email", "Email", "required|valid_email|min_length[5]|max_length[20]".$unique);
		//$this->form_validation->set_rules("password", "Password", "required");
		

		if($this->form_validation->run()){

				$data = array(
					'nombre' => $nombre,
					'apellido' => $apellido,
					'ci' => $ci,
					'direccion' => $direccion,
					'celular' => $celular,
					'email' => $email,
					'fecha_actualizacion' => date('Y-m-d H:i:s'),
					'id_rol' => $rol
				);

				if($this->Usuario_model->update($id, $data)){
					redirect(base_url()."usuarios");
				}else{
					$this->session->set_flashdata("Error","No se pudo actualizar el registro");
					redirect(base_url()."usuarios/edit/".$id);
				}	
		}else{
			$this->edit($id);
		}		
	}

	public function view($id){		
		$data = array(
			'usuario' => $this ->Usuario_model->getUsuarioById($id),
		);		
		$this->load->view("admin/usuarios/view",$data);
	}

	public function delete($id){
		$data = array(
			'eliminado' => "1",
		);
		$this->Usuario_model->update($id, $data); //actualizamos el registro
		echo "usuarios"; //return url to redirect
	}

	


}