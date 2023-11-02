<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Reporte_model');  
    }

    public function index()
	{
        $fecha_inicio = $this->input->post("fechainicio");
        $fecha_fin = $this->input->post("fechafin");
        if($this->input->post("filtrar")){
			
            $ventas = $this->Reporte_model->getAllVentasByDate($fecha_inicio, $fecha_fin);

        }else{           

            $ventas = $this->Reporte_model->getAllVentas();	
        }

        $data = array(
            "ventas" => $ventas,
			"fecha_inicio"=>$fecha_inicio,	
			"fecha_fin"=>$fecha_fin				
        );		
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('reportes/list', $data);
		$this->load->view('layouts/footer');			
		
	}

	public function exportar()
	{		  
		$fecha_inicio = $this->input->post("inicio");
        $fecha_fin = $this->input->post("fin");

		if(!empty($fecha_inicio)){
			$data = array(
				"ventas" => $this->Reporte_model->getAllVentasByDate($fecha_inicio, $fecha_fin),								
			);	
			$this->load->view('reportes/fpdf/PruebaH', $data);		
		}else{
			$data = array(
				"ventas" => $this->Reporte_model->getAllVentas(),								
			);	
			$this->load->view('reportes/fpdf/PruebaH', $data);
		}
		
	}

}