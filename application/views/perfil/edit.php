<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar</h1>
          </div>
          <div class="col-sm-6">
            
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
                <h3 class="card-title">Perfil del Usuario</h3>
              </div>              
              <!-- /.card-header -->

              <!-- /.Alertr -->
              <?php if($this->session->flashdata("error")):?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dimiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-ban"><?php $this->session->flashdata("error");?></i></p>
              </div>
              <?php endif;?>
              <!-- /.Alertr -->
         

              <!-- form start -->    
              <form action="<?php echo base_url();?>usuarios/updateprofile" method="POST">              
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="idusuario" value="<?php echo $perfil->id_usuario; ?>">
                  </div>

                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("nombre")) ? 'is-invalid':'';?>"
                           placeholder="nombre" name="nombre" id="nombre" value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $perfil->nombre; ?>" disabled>
                           <?php echo form_error("nombre","<span class='help-block'>","</span>")?>  
                  </div>
                  <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("apellido")) ? 'is-invalid':'';?>"
                           placeholder="Apellido" name="apellido" id="apellido" value="<?php echo !empty(form_error("apellido")) ? set_value("apellido") : $perfil->apellido; ?>" disabled>
                           <?php echo form_error("apellido","<span class='help-block'>","</span>")?>  
                  </div>       
                  <div class="form-group">
                    <label for="ci">CI</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("ci")) ? 'is-invalid':'';?>" 
                           placeholder="CI" name="ci" id="ci" value="<?php echo !empty(form_error("apellido")) ? set_value("apellido") : $perfil->ci; ?>" disabled>
                           <?php echo form_error("ci","<span class='help-block'>","</span>")?>  
                          </div> 
                  <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("celular")) ? 'is-invalid':'';?>" 
                            placeholder="Celular" name="celular" id="celular" value="<?php echo !empty(form_error("celular")) ? set_value("celular") : $perfil->celular; ?>" disabled>
                            <?php echo form_error("celular","<span class='help-block'>","</span>")?>  
                  </div>
                  <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("direccion")) ? 'is-invalid':'';?>" 
                            placeholder="Direccion" name="direccion" id="direccion" value="<?php echo !empty(form_error("direccion")) ? set_value("direccion") : $perfil->direccion; ?>" disabled>
                            <?php echo form_error("direccion","<span class='help-block'>","</span>")?>  
                  </div>     
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("email")) ? 'is-invalid':'';?>" 
                            placeholder="Correo electronico" name="email" id="email" value="<?php echo !empty(form_error("email")) ? set_value("email") : $perfil->email; ?>"disabled>
                            <?php echo form_error("email","<span class='help-block'>","</span>")?>  
                  </div>                       
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a type="button" id="butonHabilitar" class="btn btn-warning" onclick="habilitarCampos(['nombre', 'apellido','ci','celular','direccion','email'])">Editar</a>

                  <button type="submit"  class="btn btn-primary">Actualizar</button>
                  
                  <a type="button"   class="btn btn-danger" onclick="deshabilitarCampos(['nombre', 'apellido','ci','celular','direccion','email'])">Cancelar</a>
                </div> <!--id="butonActualizar" style="display:none;" -->
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