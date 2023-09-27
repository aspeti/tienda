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
                <h3 class="card-title">Password del Usuario</h3>
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
              <form action="<?php echo base_url();?>usuarios/updatepassword" method="POST">              
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="idusuario" value="<?php echo $perfil->id_usuario; ?>">
                  </div>
                  
                 <!-- <div class="form-group">
                    <label for="nombre">Password</label>
                    <input type="password" class="form-control  <//?php echo !empty(form_error("password")) ? 'is-invalid':'';?>"
                           placeholder="" name="password" id="password" value="</?php echo !empty(form_error("password")) ?>" disabled>
                           <//?php echo form_error("password","<span class='help-block'>","</span>")?>
                  </div>

              -->
                  <div class="form-group">
                    <label for="apellido">Nueva contraseña</label>
                    <input type="password" class="form-control <?php echo !empty(form_error("newpassword")) ? 'is-invalid':'';?>"
                           placeholder="" name="newpassword" id="newpassword" value="<?php echo !empty(form_error("newpassword"))?>" disabled>
                           <?php echo form_error("newpassword","<span class='help-block'>","</span>")?>
                  </div>     
                  <div class="form-group">
                    <label for="apellido">Rescriba la Contraseña</label>
                    <input type="password" class="form-control <?php echo !empty(form_error("confirmpassword")) ? 'is-invalid':'';?>"
                           placeholder="" name="confirmpassword" id="confirmpassword" value="<?php echo !empty(form_error("confirmpassword"))?>" disabled>
                           <?php echo form_error("confirmpassword","<span class='help-block'>","</span>")?>
                  </div>
                  
                  <div class="card-footer">
                  <a type="button" id="butonHabilitar" class="btn btn-warning" onclick="habilitarCampos(['newpassword','confirmpassword'])">Editar</a>

                  <button type="submit" id="btnActualizar"    class="btn btn-primary">Actualizar</button>
                  
                  <a type="button"   class="btn btn-danger" onclick="deshabilitarCampos([ 'newpassword','confirmpassword'])">Cancelar</a>
                </div> <!--id="butonActualizar" style="display:none;" -->
                  
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