
  <!-- Main Footer -->
  <footer class="main-footer">
    <!--strong>Copyright &copy; 2023 <a href="#">Boris</a>.</!strong>
     Todos lo derechos reservados  -->
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script  src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/jszip/jszip.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script  src="<?php echo base_url();?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.full.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {

    var base_url = "<?php echo base_url();?>";

    $(".btn-remove").on("click", function(e){
      e.preventDefault();
     // alert("eliminando.."); //to test
      var ruta = $(this).attr("href");
      //alert(ruta) ; // to test ruta
      $.ajax({
        url: ruta,
        type:"POST",   //usamos el metodo post
        success:function(resp){   //si el valor es true lanzamos la alerta
         // alert(resp);
         // $("#modal-default .modal-body").html(resp);
           window.location.href = base_url + resp;
           //alert(base_url + resp);
        }
      });
    
    });

 

    $(".btn-view").on("click", function(){ //obtiene el valor btn-view
      var viewUrl = $(this).val();  //almacenamos el valor en en id     
      //alert(viewUrl);
      $.ajax({
        url:base_url + viewUrl,  //nos dirigimos al controlado enviando el id  
        type:"POST",   //usamos el metodo post
        success:function(resp){   //si el valor es true lanzamos la alerta
          //alert(resp);
          $("#modal-default .modal-body").html(resp);
        }
      });
    
    });

    



    $("#reporte").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#lista').DataTable({
      "paging": true, 
      "lengthChange": false,  
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,

      "language": {
            "lengthMenu": "mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontró nada - lo siento",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate" :{
              "next": "Siguiente",
              "previous": "Anterior"
            }
        }
    });
  });
//-- -------------------------- profile---------------------------------------------------->

  function deshabilitarCampos(campos) {
    campos.forEach(function(idCampo) {
      document.getElementById(idCampo).setAttribute("disabled", "true");
    });
  }
  function habilitarCampos(campos){
    campos.forEach(function(idCampo) {
      document.getElementById(idCampo).removeAttribute("disabled");
    });
  
  }



</script>
</body>
</html>
