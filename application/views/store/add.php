<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Productos</li>
              <li class="breadcrumb-item active">Agregar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">    
                
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Venta</h3>
              </div>              
              <!-- /.card-header -->

              <!-- form start -->
       
                <!-- Content Wrapper. Contains page content -->
                <div class="container mt-3">
                    <!-- Content Header (Page header) -->             
                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="box box-solid">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <form action="<?php echo base_url();?>ventas/agregarventa" method="POST" class="form-horizontal" onsubmit=" return validarForm();">
                                            <div class="form-group row">                                                  
                                                <div class="col-md-3">
                                                    <label for="comprobante">Comprobante:</label>                                                    
                                                    <select name="comprobante" id="comprobante" class="form-control" required>
                                                        <option value="">Seleccione...</option> 
                                                        <?php foreach($comprobantes as $comprobante): ?>
                                                            <?php $dataComprobante = $comprobante->id_comprobante.'*'.$comprobante->cantidad.'*'.$comprobante->igv.'*'.$comprobante->serie;?>
                                                            <option value="<?php echo $dataComprobante;?>"><?php echo $comprobante->nombre ;?></option>  
                                                        <?php endforeach;?>
                                                    </select>                                                  
                                                    <input type="hidden" id="idcomprobante" name="idcomprobante">
                                                    <input type="hidden" id="igv">
                                                </div>                                                
                                                <div class="col-md-3">
                                                    <label for="">Serie:</label>
                                                    <input type="text" class="form-control" name="serie" id="serie" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Numero:</label>
                                                    <input type="text" class="form-control" name="numero"  id="numero" readonly>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="">Cliente:</label>
                                                    <div class="input-group">
                                                        <input type="hidden" name="idcliente" id="idcliente">
                                                        <input type="text" class="form-control" disabled="disabled" id="cliente">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                </div> 
                                                <!-- /Fecha 
                                                <div class="col-md-3">
                                                    <label for="">Fecha:</label>
                                                    <input type="date" class="form-control" name="fecha" required>
                                                </div>-->
                                            </div>
                                            <!--div class="form-group">
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Producto:</label>
                                                    <input type="text" class="form-control" id="producto">
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <label for="">&nbsp;</label>
                                                    <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                                                </div>
                                                </div>
                                            </!div-->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="producto">Productos</label>
                                                        <!--select-- class="form-control select2bs4" style="width: 100%;">
                                                            <option selected="selected">Seleccione un producto...</option>
                                                            <option>Alaska</option>
                                                            <option>California</option>
                                                            <option>Delaware</option>
                                                            <option>Tennessee</option>
                                                            <option>Texas</option>
                                                            <option>Washington</option>
                                                        </!select-->
                                                        <select  class="form-control select2bs4" name="producto" id="producto" style="width: 100%;">
                                                        <option value="selected">Seleccione...</option> 
                                                            <?php foreach($productos as $producto): ?>
                                                                
                                                            <?php $dataProducto = $producto->id_producto.'*'.$producto->codigo.'*'.$producto->nombre.'*'.$producto->precio.'*'.$producto->stock;?>
                                                            <option value="<?php echo $dataProducto;?>"><?php echo $producto->codigo."-".$producto->nombre."-".$producto->precio." Bs." ;?></option>  
                                                        <?php endforeach;?>
                                                    </select>  
                                                    </div>
                                                    <div class="col-md-2">
                                                    <label for="">&nbsp;</label>
                                                    <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                                                </div>
                                                </div>
                                            </div>
                                                          
                                            <table id="tbventas" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>

                                                        <th>Precio Bs.</th>
                                                        <th>Stock Max.</th>
                                                        <th>Cantidad</th>
                                                        <th>Importe Bs.</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_detalle">
                                                
                                                </tbody>
                                            </table>

                                            <div class="form-group row">
                                                <!--div class="col-md-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Subtotal:</span>
                                                        <input type="text" class="form-control" placeholder="0.00" name="subtotal" id="subtotal" readonly="readonly">
                                                    </div>
                                                </!--div>
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">IGV:</span>
                                                        <input type="text" class="form-control" placeholder="Username" name="igv" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div-- class="col-md-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Descuento:</span>
                                                        <input type="text" class="form-control" placeholder="Username" name="descuento" value="0.00" readonly="readonly">
                                                    </div>
                                                </div-->
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Total Bs:</span>
                                                        <input type="text" class="form-control" placeholder="0.00" name="txttotal" id="txttotal"  readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                                </div>                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <div class="modal fade " id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content container">
                            <div class="modal-header">                          
                                <h4 class="modal-title">Clientes</h4>  
                            </div>                   
                            <div class="modal-body">                     
                                    
                             
                                        <table id="listamodal" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Documento</th>
                                                    <th>Opcion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($clientes)):?>
                                                <?php $cont = 1;?>
                                                <?php foreach($clientes as $cliente):?>
                                                <tr>
                                                    <td><?php echo $cont;?></td>
                                                    <td><?php echo $cliente->nombre;?></td>
                                                    <td><?php echo $cliente->num_documento;?></td>                   
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-check" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataClient = $cliente->id_cliente."*". $cliente->nombre;?>">
                                                            <span class="fa fa-check"></span>
                                                        </button>                                                
                                                    </td>  
                                                </tr>
                                                <?php $cont++;?>  
                                                <?php endforeach;?>
                                                <?php endif; ?>      
                                                
                                            </tbody>
                                        </table>
                                
                             
                            </div>
                            <div class="modal-footer">
                                <a href="<?php echo base_url();?>clientes/add" type="button" class="btn btn-primary pull-left" >Agregar</a>
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

                            </div>
                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

              
            </div>              

            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
 var arr_ids = []; 

 document.addEventListener("DOMContentLoaded", function(event) {

    //Initialize Select2 Elements
    $('.select2').select2()  //to select and search products
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


///----------------add info to Agregar button when product change
    $("#producto").on("change", function(){
      option = $(this).val() // if option is changed
      if( option!=""){      
        $("#btn-agregar").val(option); //acording to array in split 
      }else{
        $("#btn-agregar").val(null); //acording to array in split   
      }
    })

    $('#btn-agregar').click(function(){
        let productData = $(this).val();
        infoProducto = productData.split("*");
        let id_producto = infoProducto[0];
        let codigo = infoProducto[1];
        let nombre = infoProducto[2];
        let precio = infoProducto[3];
        let stock = infoProducto[4];        
        console.log('id_producto:'+id_producto+' codigo:'+codigo+' nombre:'+nombre+' precio:'+precio+' stock:'+stock);
        if(id_producto=='')
          return;
        if( arr_ids.indexOf(id_producto) > -1 ){
            setCantidad(id_producto,precio,true);
        }
        else{

            let fila = getRowDetalle(id_producto,codigo,nombre,stock,precio);
            $('#tbody_detalle').append(fila);

        }
        calcularTotal();

    });

  });

  function getRowDetalle(id,codigo,descripcion,stock,precio){
    let html = '<tr id="fila_'+id+'">';
    html+='<td><input type="hidden" name="idcodigo[]" value="'+id+'"/>'+codigo+'</td>';
    html+='<td><input type="hidden" name="iddescripcion[]" value="'+id+'"/>'+descripcion+'</td>';
    html+='<td><input type="hidden" name="precios[]" value="'+precio+'"/>'+precio+'</td>';
    html+='<td><input type="hidden" name="stock[]" value="'+stock+'"/>'+stock+'</td>';
    html+='<td><input id="cantidad_'+id+'" name="cantidad[]" type="number" value="1" min="1" max="'+stock+'" onkeyup="setCantidad('+id+','+precio+')" onchange="setCantidad('+id+','+precio+')"/></td>';
    html+='<td><input  type="text" id="txt_subtotal_'+id+'"  name="importe[]" class="txt_subtotal disable" value="'+precio+'" readonly/></td>';
    html+='<td><button class="btn btn-danger" type="button" onclick="eliminarDetalle('+id+')"><i class="fa fa-trash"></i> </button></td>';
    html+='</tr>';
    arr_ids.push(id);

    return html;
  }poij
  

  function eliminarDetalle(id){
      if(confirm('Está seguro que desea eliminar este detalle?')){
        $('#fila_'+id).remove();
        calcularTotal();
        let idx = arr_ids.indexOf(id);
        arr_ids.splice(idx,1);
      }
  }

  function calcularTotal(){
      let total = 0;
      $('.txt_subtotal').each(function(){
          let val = parseFloat($(this).val());
          total += val;
      });

      $('#txttotal').val(total.toFixed(2));
  }

  function setCantidad(id,precio,aumentar = false){

      let temp_cant = $('#cantidad_'+id).val();
      if(aumentar)
      temp_cant++;
      let subt = temp_cant * precio;
      $('#cantidad_'+id).val(temp_cant);
      $('#txt_subtotal_'+id).val(subt.toFixed(2));
      calcularTotal();
  }

  function validarForm(){
      isValid = true;
      let nfilas = $('#tbody_detalle tr').length;
      console.log(nfilas);
      if(nfilas == 0){
          isValid = false;
          alert('Debe agregar al menos un detalle');
      }
      return isValid;
  }

</script>
