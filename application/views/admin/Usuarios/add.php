<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">usuarios</li>
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
          <div class="col-6">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">    
                
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Usuarios</h3>
              </div>              
              <!-- /.card-header -->

              <!-- /.Alertr -->
              <?php if($this->session->flashdata("error")):?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dimiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-ban"><?php $this->session->flashdata("error");?></i></p>
              </div>s
              <?php endif;?>
              <!-- /.Alertr -->
         

              <!-- form start -->
              <form action="<?php echo base_url();?>usuarios/insert" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("nombre")) ? 'is-invalid':' ';?>" 
                            placeholder="nombre" name="nombre" id="nombre" value = "<?php echo set_value("nombre");?>">
                            <?php echo form_error("nombre","<span class='help-block'>","</span>")?>
                  </div>
                  <div class="form-group">
                    <label for="apellido">apellido</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("nombre")) ? 'is-invalid':' ';?>"
                           placeholder="Apellido" name="apellido" id="apellido" value = "<?php echo set_value("apellido");?>">
                           <?php echo form_error("apellido","<span class='help-block'>","</span>")?>
                  </div>    
                  <div class="form-group">
                    <label for="ci">CI</label>
                    <input type="text" class="form-control" placeholder="Cedula de Identidad" name="ci">
                  </div> 
                  <div class="form-group">
                    <label for="direccion">Direccion *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("direccion")) ? 'is-invalid':' ';?>" 
                            placeholder="Direccion" name="direccion" id="direccion" value = "<?php echo set_value("direccion");?>">
                            <?php echo form_error("direccion","<span class='help-block'>","</span>")?>
                  </div>       
                  <div class="form-group">
                    <label for="direccion">Celular *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("celular")) ? 'is-invalid':' ';?>" 
                          placeholder="Celular" name="celular" id="celular" value = "<?php echo set_value("celular");?>">
                          <?php echo form_error("celular","<span class='help-block'>","</span>")?>
                  </div>                   
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("email")) ? 'is-invalid':' ';?>"
                        placeholder="Correo electronico" name="email" id="email" value = "<?php echo set_value("email");?>">
                        <?php echo form_error("email","<span class='help-block'>","</span>")?>
                  </div> 
                  <!--div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" class="form-control <?php echo !empty(form_error("password")) ? 'is-invalid':' ';?>" 
                        placeholder="Constraseña" name="password" id="password" value = "<?php echo set_value("password");?>">
                        <?php echo form_error("password","<span class='help-block'>","</span>")?>
                  </!div--> 

                  <div class="form-group">
                        <label for="rol">Rol</label>
                        <select class="form-control select2" style="width: 100%;" name="rol">
                            <!--option selected="selected">Cliente</!--option-->
                            <option value='2'>Usuario</option>
                            <option value='1'>Administrador</option>      
                        </select>
                   </div>        
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a type="button" class="btn btn-danger" href="<?php echo base_url();?>usuarios/">Cancelar</a>
                </div>
              </form>
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