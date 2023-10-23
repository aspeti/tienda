<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {

    public function getAllproductos()
    {   
        $this->db->select("p.*, c.nombre as categoria");
        $this->db->from("producto p");
        $this->db->join("categoria c", "p.id_categoria = c.id_categoria");    
        $this->db->where("p.eliminado","0");
        $resultados = $this->db->get();
        return $resultados->result();          
    }

    public function save ($data){
        return $this->db->insert("producto",$data);
    }

    public function getProductoById($id)
    {        
        $this->db->where("id_producto", $id);
        $this->db->where("eliminado","0");
        $resultado = $this->db->get("producto");
        return $resultado->row();          
    }
    
    public function update($id, $data)
    {        
        $this->db->where("id_producto", $id);     
        return $this->db->update("producto", $data); 
    }

    public function getLastId() {
        // Consulta para obtener el último ID registrado
            $this->db->select('id_producto');
            $this->db->from('producto');
            $this->db->order_by('id_producto', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
            // Si hay registros en la tabla
                $row = $query->row();
                $ultimo_id = $row->id_producto;
                $proximo_id = $ultimo_id + 1;
            } else {
            // Si no hay registros en la tabla (por ejemplo, tabla vacía)
                $proximo_id = 1;
            }
    
            return $proximo_id;
    }    

}
