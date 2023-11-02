<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    public function getAllVentas(){          
        $this->db->select("v.*, c.nombre as cliente");
        $this->db->from("ventas v");
        $this->db->join("cliente c", "c.id_cliente = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $resultados = $this->db->get();
        return $resultados->result(); 
    }


    public function getAllVentasByDate($fecha_inicio,$fecha_fin){
        $this->db->select("v.*, c.nombre as cliente");
        $this->db->from("ventas v");
        $this->db->join("cliente c", "c.id_cliente = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $this->db->where('v.fecha_creacion >=', $fecha_inicio);
        $this->db->where('v.fecha_creacion <=', $fecha_fin); 
        //$this->db->group_by("v.id_venta");      

        $resultados = $this->db->get();

        if($resultados->num_rows()>0){
            return $resultados->result();
        }else{
            return false;
        }
        
    }

}