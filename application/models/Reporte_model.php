<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    public function getAllVentas(){          
        $this->db->select("v.*, c.nombre as cliente");
        $this->db->from("ventas v");
        $this->db->join("cliente c", "c.id_cliente = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $this->db->order_by("v.id_venta", "DESC");
        $resultados = $this->db->get();
        return $resultados->result(); 
    }


    public function getAllVentasByDate($fecha_inicio,$fecha_fin){

        $fecha_inicio = date('Y-m-d 00:00:00', strtotime($fecha_inicio));
        $fecha_fin = date('Y-m-d 00:00:00', strtotime($fecha_fin));
    
        // Agregar un día a la fecha_fin para incluir ventas del día especificado
        $fecha_fin = date('Y-m-d H:i:s', strtotime($fecha_fin . ' +1 day'));



        $this->db->select("v.*, c.nombre as cliente");
        $this->db->from("ventas v");
        $this->db->join("cliente c", "c.id_cliente = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $this->db->where('v.fecha_creacion >=', $fecha_inicio);
        $this->db->where('v.fecha_creacion <=', $fecha_fin); 
        $this->db->order_by("v.id_venta", "DESC");
        //$this->db->group_by("v.id_venta");      

        $resultados = $this->db->get();

        if($resultados->num_rows()>0){
            return $resultados->result();
        }else{
            return false;
        }   
    }

    public function getVentaByID($id){          
        $this->db->select("v.*, c.nombre as cliente, c.num_documento as ci");
        $this->db->from("ventas v");
        $this->db->join("cliente c", "c.id_cliente = v.id_cliente");    
        $this->db->where("v.eliminado","0");
        $this->db->where("v.id_venta", $id);       
        $resultados = $this->db->get();
        return $resultados->row(); 
    }

    public function getAllDetalleById($id){          
        $this->db->select("d.*, p.nombre as producto");
        $this->db->from("detalle d");
        $this->db->join("producto p", "d.id_producto = p.id_producto");    
        $this->db->where("d.id_venta", $id);
        $resultados = $this->db->get();
        return $resultados->result();
        

    }

    public function getAllEstadisticas(){    
        $this->db->select("p.nombre as paquete, SUM(d.cantidad) as cantidad, SUM(d.importe) as total");
        $this->db->from("detalle d");
        $this->db->join("producto p", "d.id_producto = p.id_producto");
        $this->db->where("d.eliminado", "0");
        $this->db->group_by("d.id_producto");
        $this->db->order_by("cantidad", "DESC");
        $resultados = $this->db->get();
        return $resultados->result();
    }


    public function general(){          
        $this->db->select("v.*, c.nombre as cliente, u.nombre as usuario, p.nombre as prod,p.precio as precio, d.cantidad as cantidad, 
        d.importe as importe, g.nombre as categoria");
        $this->db->from("ventas v");
        $this->db->join("cliente c", "c.id_cliente = v.id_cliente"); 
        $this->db->join("usuario u", "u.id_usuario = v.id_usuario");    
        $this->db->join("detalle d", "d.id_venta = v.id_venta");   
        $this->db->join("producto p", "d.id_producto = p.id_producto");  
        $this->db->join("categoria g", "g.id_categoria = p.id_categoria");  
        $this->db->where("v.eliminado","0");
        $this->db->order_by("v.id_venta", "DESC");
        $resultados = $this->db->get();
        return $resultados->result(); 
    }


}