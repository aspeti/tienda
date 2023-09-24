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
        <div class="form-box">
            <div class="form-value">
                <form action="<?php echo base_url();?>Auth/login" method="post">
                    <h2>Login</h2>
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger">
                              <p><?php echo $this->session->flashdata("error")?></p>
                            </div> 
                        <?php endif; ?> 
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required  name="email">
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password">
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Recordarme 
                        <br>
                        <a href="#">Olvide mi contraseña</a></label>
                      
                    </div>
                    <button  type="submit">Ingresar</button>
                    <div class="register">
                        <p>No tienes cuenta? <a href="<?php echo base_url();?>Auth/registro">Registrate</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>