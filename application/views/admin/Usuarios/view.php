<p><Strong>Nombre:</Strong> <?php echo $usuario->nombre;?></p>
<p><Strong>Apellido:</Strong> <?php echo $usuario->apellido;?></p>
<p><Strong>CI:</Strong> <?php echo $usuario->ci;?></p>
<p><Strong>Email:</Strong> <?php echo $usuario->email;?></p>
<p><Strong>Direccion:</Strong> <?php echo $usuario->direccion;?></p>
<p><Strong>Celular:</Strong> <?php echo $usuario->celular;?></p>
<p><strong>Rol:</strong>
<?php if ($usuario->id_rol== 1): ?>
<?php echo 'Administrador'; ?>
<?php else: echo 'Cliente'; ?>
<?php endif; ?>
</p>

<p><Strong>Fecha Creacion:</Strong> <?php echo $usuario->fecha_creacion;?></p>
<p><Strong>Fecha Actualizacion:</Strong> <?php echo $usuario->fecha_actualizacion;?></p>