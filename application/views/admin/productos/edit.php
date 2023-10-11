<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Productos</li>
              <li class="breadcrumb-item active">Editar</li>
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
                <h3 class="card-title">Producto</h3>
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
              <form action="<?php echo base_url();?>productos/update" method="POST" enctype="multipart/form-data">            
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="idProducto" value="<?php echo $producto->id_producto; ?>">
                  </div>
                  <div class="form-group">
                    <label for="codigo">Codigo *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("codigo")) ? 'is-invalid':' ';?>" placeholder="codigo" id="codigo" name="codigo" 
                            value="<?php echo !empty(form_error("codigo")) ? set_value("codigo") : $producto->codigo; ?>">
                    <?php echo form_error("codigo","<span class='help-block'>","</span>")?>
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("nombre")) ? 'is-invalid':'';?>" placeholder="nombre" id="nombre" name="nombre"
                       value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $producto->nombre; ?>">
                    <?php echo form_error("nombre","<span class='help-block'>","</span>")?>   
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" value="<?php echo $producto->descripcion; ?>">
                  </div>                 
                  <div class="form-group">
                    <label for="precio">Precio *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("precio")) ? 'is-invalid':'';?>" placeholder="precio" id="precio" name="precio" 
                    value="<?php echo !empty(form_error("precio")) ? set_value("precio") : $producto->precio; ?>">
                    <?php echo form_error("precio","<span class='help-block'>","</span>")?>
                  </div>

                  <div class="form-group">
                    <label for="stock">Stock *</label>
                    <input type="text" class="form-control <?php echo !empty(form_error("stock")) ? 'is-invalid':'';?>" placeholder="Agregue cantidad en Stock" id="stock" name="stock" 
                    value="<?php echo !empty(form_error("stock")) ? set_value("stock") : $producto->stock; ?>">
                    <?php echo form_error("stock","<span class='help-block'>","</span>")?>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputFile">Cargar archivo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="customFile">
                        <label class="custom-file-label" for="exampleInputFile">Seleccionar</label>
                      </div>                     
                    </div>
                  </div>

                  <div class="form-group">                    
                    <label for="idCategoria">Categoria</label>
                    <select type="text" class="form-control" placeholder="categoria" name="idCategoria">                      
                      <?php foreach($categorias as $categoria):?>
                        <?php if($categoria->id_categoria == $producto->id_categoria):?>
                                <option value="<?php echo $categoria->id_categoria?>" selected> <?php echo $categoria->nombre;?></option>
                        <?php else:?>
                          <option value="<?php echo $categoria->id_categoria?>"> <?php echo $categoria->nombre;?></option>
                          <?php endif;?>
                      <?php endforeach?>
                    </select>  
                  </div>            
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
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