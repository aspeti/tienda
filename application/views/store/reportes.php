
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reportes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Reportes</li>
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

                <table id="lista" class="table table-bordered table-striped">
                  <thead>                 
                  <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>numero documento</th>                   
                    <th>Total</th>    
                    <th>Acciones</th>                 
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($ventas)):?>
                        <?php $cont = 1;?>
                      <?php foreach($ventas as $venta):?>
                                <tr>
                                  <td><?php echo $cont;?></td>
                                  <td><?php echo $venta->fecha_creacion;?></td>
                                  <td><?php echo $venta->cliente;?></td>
                                  <td><?php echo $venta->num_documento;?></td>
                                  <td><?php echo $venta->total;?></td>                                 
                                  
                                  <td>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-default" value="<?php echo $viewURL ='productos/view/'.$venta->id_venta;?>">
                                          <span class="fa fa-search"></span>
                                        </button>   
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
                    <th>Total</th>  
                  </tr>

                </table>

                <form action="<?php echo base_url();?>ventas/reportefechas" method="POST">
                <div class ="col-md-6">
                  <div class ="row">
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="fechaInicial" required>
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="fechaFinal" required>
                    </div>
                    
                  </div>
                  <div class="col-md-8">
                        <label for="">&nbsp;</label>
                        <button id="btn-Generar" type="submit" class="btn btn-block btn-primary"><span class="fa fa-plus"></span> Exportar</button>
                    </div>
                </div>
                </form>
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