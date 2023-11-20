  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General</h1>
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
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php $TotalPagos = 0;?> 
                <?php if(!empty($ventas)):?>                        
                      <?php foreach($ventas as $venta):?>
                        <?php $TotalPagos = $TotalPagos + $venta->total;?> 
                      <?php endforeach;?>
                 <?php endif; ?>  
                <h3><?php echo "Bs ".number_format($TotalPagos,2) ;?></h3>

                <p>Total Ingreso</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                De la venta <i class="fas fa-arrow-circle-down"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Incremento de ventas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Nuevos clientes</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>15</h3>

                <p>Nuevos productos</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>     

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!--h3 class="card-title">lISTA DE VENTAS</!h3-->                             
                        
              </div>  
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Empleado</th>
                    <th>Cliente</th>
                    <th>producto</th>
                    <th>categoria</th>
                    <th>cantidad</th>
                    <th>precio unitario</th>
                    <th>subtotal</th>
                    <th>num de recibo</th>
                    <th>Fecha de Venta</th>
                    <th>Total</th>                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($ventas)):?>
                      <?php $cont = 1;?>      
                      <?php foreach($ventas as $venta):?>
                  <tr>
                    <td><?php echo $cont;?></td>
                    <td><?php echo $venta->usuario;?></td>
                    <td><?php echo $venta->cliente;?></td>   
                    <td><?php echo $venta->prod;?></td>  
                    <td><?php echo $venta->categoria;?></td> 
                    <td><?php echo $venta->cantidad;?></td>  
                    <td><?php echo $venta->precio;?></td>  
                    <td><?php echo $venta->importe;?></td>                   
                    <td><?php echo $venta->num_documento;?></td>                   
                    <td><?php echo date('d-m-Y', strtotime($venta->fecha_creacion)); ?></td>                     
                    <td><?php echo $venta->total;?></td> 
                  </tr>
                      <?php $cont++;?>                 
                  <?php endforeach;?>
                  <?php endif; ?>  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>empleado</th>
                    <th>Cliente</th>
                    <th>producto</th>
                    <th>categoria</th>
                    <th>cantidad</th>
                    <th>precio unitario</th>
                    <th>subtotal</th>
                    <th>num de recibo</th>
                    <th>Fecha de Venta</th>
                    <th>Total</th>
                   
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