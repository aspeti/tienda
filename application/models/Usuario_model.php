<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function login($email, $password)
    {        
        $this->db->where("email", $email);
        $this->db->where("password", $password);

        $resultados = $this->db->get("usuario"); //tabla
        if($resultados->num_rows() > 0){
            return $resultados->row();
        }else{
            return false;
        }      
    }

    public function getAllUsuarios()
    {        
        $this->db->where("eliminado","0");
        $resultados = $this->db->get("usuario");
        return $resultados->result();          
    }

    public function save ($data){
        return $this->db->insert("usuario",$data);
    }

    public function getUsuarioById($id)
    {        
        $this->db->where("id_usuario", $id);
        $this->db->where("eliminado","0");
        $resultado = $this->db->get("usuario");
        return $resultado->row();          
    }
    
    public function update($id, $data)
    {        
        $this->db->where("id_usuario", $id);     
        return $this->db->update("usuario", $data); 
    }

    public function updatepassword($id, $data)
    {        
        $this->db->where("id_usuario", $id);     
        return $this->db->update("usuario", $data); 
    }
}
