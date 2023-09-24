<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

    public function getAllCategorias()
    {        
        $this->db->where("eliminado","0");
        $resultados = $this->db->get("categoria");
        return $resultados->result();          
    }

    public function save ($data){
        return $this->db->insert("categoria",$data);
    }

    public function getCategoriaById($id)
    {        
        $this->db->where("id_categoria", $id);
        $this->db->where("eliminado","0");
        $resultado = $this->db->get("categoria");
        return $resultado->row();          
    }
    
    public function update($id, $data)
    {        
        $this->db->where("id_categoria", $id);     
        return $this->db->update("categoria", $data); 
    }
    

}
