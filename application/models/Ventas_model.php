<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

    public function getAllComprobantes(){          
        $resultados = $this->db->get("comprobante");
        return $resultados->result();
    }

   /* public function getAllUsuarios()
    {        
        $this->db->where("eliminado","0");
        $resultados = $this->db->get("usuario");
        return $resultados->result();          
    }
*/

}