<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

    public function getAllVentas(){          
        $this->db->select("v.*, c.nombre as cliente");
        $this->db->from("ventas v");
        $this->db->join("cliente c", "c.id_cliente = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $resultados = $this->db->get();
        return $resultados->result(); 
    }


    public function getAllComprobantes(){          
        $resultados = $this->db->get("comprobante");
        return $resultados->result();
    }

    public function save($data)
    {        
        return $this->db->insert("ventas", $data);       
    }

    public function lastId(){
        return $this->db->insert_id();
    }

    public function getComprobante($id){
        $this->db->where("id_comprobante", $id);
        $resultados = $this->db->get("comprobante");
        return $resultados->row();
    }

    public function updateComprobante($idComprobante, $data){
        $this->db->where("id_comprobante",$idComprobante);
        $this->db->update("comprobante",$data);
    } 

    public function save_detalle($data){
        $this->db->insert('detalle',$data);
    }

    public function getAllComprobantesforFecha($FechaInicial,$FechaFinal){
        $this->db->select("v.*, c.nombre as cliente");
        $this->db->from("ventas v");
        $this->db->join("cliente c", "c.id_cliente = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $this->db->where('v.fecha_creacion >=', $FechaInicial);
        $this->db->where('v.fecha_creacion <=', $FechaFinal); 
        $this->db->group_by("v.id_venta");
        

        $resultados = $this->db->get("ventas");
        return $resultados->result();
    }
}