<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

    public function getAllClientes()
    {        
        $this->db->where("eliminado","0");
        $resultados = $this->db->get("cliente");
        return $resultados->result();          
    }

    public function save ($data){
        return $this->db->insert("cliente",$data);
    }

    public function getClienteById($id)
    {        
        $this->db->where("id_cliente", $id);
        $this->db->where("eliminado","0");
        $resultado = $this->db->get("cliente");
        return $resultado->row();          
    }
    
    public function update($id, $data)
    {        
        $this->db->where("id_cliente", $id);     
        return $this->db->update("cliente", $data); 
    }

}
