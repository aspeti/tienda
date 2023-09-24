<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
    }

	public function index()
	{
        if($this->session->userdata("login")){
            redirect(base_url()."dashboard");
        }else{
            $this->load->view("admin/login");
        }      
        	
	}

    public function login(){
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $res = $this->Usuario_model->login($email , MD5($password));

        if(!$res){
            $this->session->set_flashdata("error", "usuario y/o contraseña incorrecto");
            redirect(base_url());

        }else{

            $data = array(
                'id_usuario'=> $res->id_usuario,
                'nombre' => $res->nombre.' '.$res->apellido,                
                'email'=> $res->email,
                'rol'=>$res->id_rol,
                'login'=>TRUE 

            );

            $this->session->set_userdata($data);
            redirect(base_url()."dashboard");
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function registro()
	{				
		$this->load->view('admin/registro');					
	}  

    
    public function registroUsuario()
	{
		$nombre = $this->input->post("nombre");
		$celular = $this->input->post("celular");	
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$passconf = $this->input->post("passconf");		

			//echo ($nombre.'-'.$apellido.'-'.$ci.'-'.$direccion.'-'.$celular.'-'.$email.'-'.$id_rol.'*'.md5($password));
		$this->form_validation->set_rules("nombre", "Nombre", "required|alpha|min_length[3]|max_length[20]");
		$this->form_validation->set_rules("celular", "Celular", "trim|numeric|required|min_length[8]|max_length[8]");
		$this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[usuario.email]");
		$this->form_validation->set_rules("password", "Password", 'required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('passconf', 'Confirmacion de password', 'trim|required|min_length[5]|max_length[20]|matches[password]');

		if($this->form_validation->run()){

				$newUser = array(
					'nombre' => $nombre,				
					'celular'=> $celular,
					'email' => $email,
					'password' => md5($password),
					'id_rol' => "2",
					'eliminado' => "0",
					'fecha_creacion' => date('Y-m-d H:i:s'),
					'fecha_actualizacion' => date('Y-m-d H:i:s')
				);

				if($this->Usuario_model->save($newUser)){
					redirect(base_url()."Auth");
				}else{
					$this->session->set_flashdata("Error","No se pudo guardar el registro");
					redirect(base_url()."admin/registro"); 
				}
		}else{
			$this->registro();
		}

	}


}
