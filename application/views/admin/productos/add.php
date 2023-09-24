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
          <div class="col-6">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">    
                
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Productos</h3>
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
              <form action="<?php echo base_url();?>productos/insert" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("nombre")) ? 'is-invalid':' ';?>" placeholder="nombre" id="nombre" name="nombre" 
                          value="<?php echo set_value("nombre");?>">
                    <?php echo form_error("nombre","<span class='help-block'>","</span>")?>
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" placeholder="Descripcion" name="descripcion">
                  </div>    
                  <div class="form-group">
                    <label for="precio">Precio *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("precio")) ? 'is-invalid':' ';?>" placeholder="Precio" id="precio" name="precio"
                          value="<?php echo set_value("precio");?>">
                          <?php echo form_error("precio","<span class='help-block'>","</span>")?> 
                  </div>  
                  <div class="form-group">
                    <label for="idCategoria">Categoria</label>
                    <select type="text" class="form-control" placeholder="categoria" name="idCategoria">
                      <?php foreach($categorias as $categoria):?>
                        <option value="<?php echo $categoria->id_categoria?>">
                            <?php echo $categoria->nombre;?>
                      </option>

                      <?php endforeach?>
                    </select>  
                  </div>            
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>                  
                  <a type="button" class="btn btn-danger" href="<?php echo base_url();?>productos/">Cancelar</a>
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