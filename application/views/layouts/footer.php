
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="#">Boris </a>.</strong>
     Derechos reservados 
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.1
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
<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

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

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true,"searching": true,
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
        },  
    //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      "buttons": ["excel"]
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
    $('#listarpt').DataTable({
      "paging": true, 
      "lengthChange": false,  
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
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

    ///---------properties for datatable lista in modal--------
    $('#listamodal').DataTable({
      "paging": false, 
      "lengthChange": true,  
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": false,
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

    //-------------------ACtion BTN check agregar cliente en venta------------------------------------
    $(".btn-check").on("click",function(){
      var cliente = $(this).val();
      infoCliente = cliente.split("*");
      $("#idcliente").val(infoCliente[0]);
      $("#cliente").val(infoCliente[1]);      
      $("#modal-default").modal("hide");
    })


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

  ///--------carga el nombre del archivo en el textbox -->

    $(function () {
      bsCustomFileInput.init();
    });

    //-- -------------------------- fro every change on comprobante--------------------------->
    $("#producto").on("change", function(){
      option = $("#comprobante").val() // if option is changed
      if( option!=""){
        infoComprobante = option.split("*"); // make split
        $("#idcomprobante").val(infoComprobante[0]); //acording to array in split 
        $("#igv").val(infoComprobante[2]);
        $("#serie").val(infoComprobante[3]);
        $("#numero").val(generarNumero(infoComprobante[1]));
      }else{
        $("#idcomprobante").val(null); //acording to array in split 
        $("#igv").val(null);
        $("#serie").val(null);
        $("#numero").val(null);
      }

    })

    //-------------Generate numero -------------------
    function generarNumero(numero){
        if(numero>=99999 && numero<999999){
          return Number(numero)+1;
        }
        if(numero>=9999 && numero<99999){
          return "0" + (Number(numero)+1);
        }
        if(numero>=999 && numero<9999){
          return "00" + (Number(numero)+1);
        }
        if(numero>=99 && numero<999){
          return "000" + (Number(numero)+1);
        }
        if(numero>=9 && numero<99){
          return "0000" + (Number(numero)+1);
        }
        if(numero<9){
          return "00000" + (Number(numero)+1);
        }
    }
    //--action btn-check------------------------------------------------


 
</script>
</html>
