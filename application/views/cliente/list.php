<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clientes</li>
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
                  <a href="<?php echo base_url();?>clientes/add" type="button" class="btn btn-block btn-primary"> <!-- quietar el btn-block---->
                    <span class="fa fa-plus"></span>  Agregar
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">           

                <table id="lista" class="table table-bordered table-striped">
                  <thead>                 
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Num Documento</th>                                     
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($clientes)):?>
                      <?php $cont = 1;?>
                      <?php foreach($clientes as $cliente):?>
                  <tr>
                    <td><?php echo $cont;?></td>
                    <td><?php echo $cliente->nombre;?></td>
                    <td><?php echo $cliente->direccion;?></td>
                    <td><?php echo $cliente->telefono;?></td>
                    <td><?php echo $cliente->num_documento;?></td>                                
                    <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $viewURL ='clientes/view/'.$cliente->id_cliente;?>">
                            <span class="fa fa-search"></span>
                          </button>
                          <!--a class="btn btn-primary" href="#" class="btn bt-info"><span class="fa fa-eye"></span></!a-->
                          <a class="btn btn-warning" href="<?php echo base_url();?>clientes/edit/<?php echo $cliente->id_cliente;?>" class="btn btn-info"><span class="fa fa-pen"></span></a>
                          <a class="btn btn-danger btn-remove" href="<?php echo base_url();?>clientes/delete/<?php echo $cliente->id_cliente;?>" class="btn btn-info"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>  
                  </tr>
                  <?php $cont++;?>  
                  <?php endforeach;?>
                  <?php endif; ?>                                               
                  </tbody>                                 
                 
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Num Documento</th>                                    
                    <th>Acciones</th>
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