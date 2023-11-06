  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Estadistica</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
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
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1">
                <i class="fa-solid fa-sack-dollar"></i>
              </span>
              <div class="info-box-content">                 
                <span class="info-box-text">TOTAl PAGOS</span>
                <?php $TotalPagos = 0;?> 
                <?php if(!empty($reservas)):?>                        
                      <?php foreach($reservas as $reserva):?>
                        <?php $TotalPagos = $TotalPagos + $reserva->total;?> 
                      <?php endforeach;?>
                 <?php endif; ?>  
                <span class="info-box-number"><?php echo $TotalPagos; ?> <small>Bs</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>       
        </div>  

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <form action="<?php echo base_url() ?>reportes/estadistica" method="POST"  target="_blank" >
                      <div class=" form-group  row">                       
                          <input type="submit" class="btn btn-primary" name="estadistica" id="estadistica" value="Exportar">  
                      </div> 
                  </form>  
              </div>  
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>               
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total Bs </th>                                
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($reservas)):?>
                      <?php $cont = 1;?>      
                      <?php foreach($reservas as $reserva):?>
                  <tr>
                    <td><?php echo $cont;?></td>                 
                    <td><?php echo $reserva->paquete;?></td>  
                    <td><?php echo $reserva->cantidad;?></td>                   
                    <td><?php echo $reserva->total;?></td>                                
 
                  </tr>
                      <?php $cont++;?>                 
                  <?php endforeach;?>
                  <?php endif; ?>  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>               
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total Bs </th>                                
                  </tr>
                  </tfoot>
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