<p><Strong>Codigo:</Strong> <?php echo $producto->codigo;?></p>
<p><Strong>Nombre:</Strong> <?php echo $producto->nombre;?></p>
<p><Strong>Descripcion:</Strong> <?php echo $producto->descripcion;?></p>
<p><Strong>Precio:</Strong> <?php echo $producto->precio;?></p>
<p><Strong>Stock Disponible:</Strong> <?php echo $producto->stock;?></p>
<p><Strong>Fecha Creacion:</Strong> <?php echo $producto->fecha_creacion;?></p>
<p><Strong>Fecha Actualizacion:</Strong> <?php echo $producto->fecha_actualizacion;?></p>

<img src="<?php echo base_url().$producto->img;?>"/>

