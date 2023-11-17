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

	public function reporte()
	{	
		 
		$fecha_inicio = $this->input->post("inicio");
        $fecha_fin = $this->input->post("fin");

		if(!empty($fecha_inicio)){
			$data = array(
				"ventas" => $this->Reporte_model->getAllVentasByDate($fecha_inicio, $fecha_fin),
				'usuario' => $this->session->userdata("nombre"),	
				"fechaInicio"=>$fecha_inicio, 
				"fechaFinal"=>$fecha_fin, 					
			);				
			$this->load->view('reportes/fpdf/ventas', $data);		
		}else{
			$data = array(
				"ventas" => $this->Reporte_model->getAllVentas(),
				'usuario' => $this->session->userdata("nombre"),	
				"fechaInicio"=>"---------", 
				"fechaFinal"=>"----------",
								
			);	
			$this->load->view('reportes/fpdf/ventas',  $data);
		}
		
	}
	public function estadistica()
	{	 
            $data = array(
				"reservas" => $this->Reporte_model->getAllEstadisticas(),							
			);	

			if($this->input->post("estadistica")){
				$this->load->view('reportes/fpdf/estadistica',  $data);

			}else{
				$this->load->view('layouts/header');
				$this->load->view('layouts/aside');
				$this->load->view('reportes/estadistica', $data);
				$this->load->view('layouts/footer');	
			}

					
	}

	public function comprobante($id)
	{	
				
		$data = array(
			"empleado"=>$this->session->userdata("nombre"),
			"venta" => $this->Reporte_model->getVentaByID($id),	
			"ventas" => $this->Reporte_model->getAllDetalleById($id),
		);	

		$this->load->view('reportes/fpdf/recibo',  $data);

	}

}