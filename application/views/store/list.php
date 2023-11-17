
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
              <li class="breadcrumb-item active">lista</li>
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
              <div class="card-header">                
                <div class ="col-md-2" >
                  <a href="<?php echo base_url();?>ventas/add" type="button" class="btn btn-block btn-success"> <!-- quietar el btn-block---->
                    <span class="mr-2"> <i class="fa-solid fa-sack-dollar"></i></span>  Realizar Venta
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">           

                <table id="lista" class="table table-bordered table-striped">
                  <thead>                 
                  <tr>
                    <th>#</th>
                    <th>Fecha de venta</th>
                    <th>Nombre Cliente</th>
                    <th>numero de recibo</th>                   
                    <th>Total</th>    
                    <th>Recibo de Venta</th>                 
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($ventas)):?>
                        <?php $cont = 1;?>
                      <?php foreach($ventas as $venta):?>
                                <tr>
                                  <td><?php echo $cont;?></td>                                 
                                  <td><?php echo date('d-m-Y', strtotime($venta->fecha_creacion)); ?></td> 
                                  <td><?php echo $venta->cliente;?></td>
                                  <td><?php echo $venta->num_documento;?></td>
                                  <td><?php echo $venta->total;?></td>                                 
                                  
                                  <td>
                                      <div class="btn-group">                                       
                                        <a class="btn btn-success" href="<?php echo base_url();?>reportes/comprobante/<?php echo $venta->id_venta;?>" target="_blank"><span class="fas fa-file-text" ></span></a>   
                                      </div>
                                  </td>  
                                </tr>  
                        <?php $cont++;?>
                  <?php endforeach;?>
                  <?php endif; ?>                                               
                  </tbody>                                 
                 
                  <tr>
                  <th>#</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>cliente</th>
                    <th>Precio</th>
                    <th>Recibo de Venta</th>
                  </tr>

                </table>

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

  <!-- /.modal -->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Info</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <!--button type="button" class="btn btn-primary">Save changes</!button*-->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->