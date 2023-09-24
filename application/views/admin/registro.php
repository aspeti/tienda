<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style >
  <link rel="stylesheet" href="<//?php echo base_url();?>assets/dist/css/adminlte.min.css"-->
  <!-- bootstrap style -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/styles/styles.css">
    <title>Login</title>

</head>
<body>
    <section>
        <div class="form-box-reg">
            <div class="form-value">
                <form action="<?php echo base_url();?>Auth/registroUsuario" method="post">
                    <h2>Registro</h2>
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger">
                              <p><?php echo $this->session->flashdata("error")?></p>
                            </div> 
                        <?php endif; ?> 
                        
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" class="<?php echo !empty(form_error("nombre")) ? 'is-invalid':' ';?>" 
                        name="nombre" id="nombre" value="<?php echo set_value("nombre");?>">
                        <label for="">Nombre</label>
                        <?php echo form_error("nombre","<span class='help-block'>","</span>")?>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text"  class="<?php echo !empty(form_error("celular")) ? 'is-invalid':' ';?>" 
                        name="celular" id="celular" value="<?php echo set_value("celular");?>">                        
                        <label for="">Celular</label>
                        <?php echo form_error("celular","<span class='help-block'>","</span>")?>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text"  class="<?php echo !empty(form_error("email")) ? 'is-invalid':' ';?>" 
                        name="email" id="email" value="<?php echo set_value("email");?>">
                        <label for="">Email</label>
                        <?php echo form_error("email","<span class='help-block'>","</span>")?>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" class="<?php echo !empty(form_error("password")) ? 'is-invalid':' ';?>" 
                        name="password" id="password" value="<?php echo set_value("password");?>">
                        <label for="">Password</label>
                        <?php echo form_error("password","<span class='help-block'>","</span>")?>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" class="<?php echo !empty(form_error("passconf")) ? 'is-invalid':' ';?>" 
                        name="passconf" id="passconf" value="<?php echo set_value("passconf");?>">
                        <label for="">Reescriba la contraseña</label>
                        <?php echo form_error("passconf","<span class='help-block'>","</span>")?>
                    </div>
                   
                    <button  type="submit">Registrarme</button>
                    <div class="register">
                        <p>Ya tienes cuenta? <a href="<?php echo base_url();?>Auth">Ingresa</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>