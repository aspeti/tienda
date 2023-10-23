  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url();?>assets/img/logo.png" class="brand-image elevation-0" style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>Multitud Deportiva</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--img src="<//?php echo base_url();?>assets/img/estampado.png" class="img-circle elevation-2" alt="User Image"-->
        </div>
        <div class="info">
          <a class="d-block"><?php echo $this->session->userdata("nombre");?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">         
          <?php if($this->session->userdata('rol') == 1) { ?>  
          <li class="nav-item">
            <a href="#" class="nav-link">                           
              <i class="nav-icon fas fa-cog"></i>           
              <p>
                Panel
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>usuarios" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>   
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>categorias" class="nav-link">
                  <i class="fas fa-bars nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>   
            </ul>
            <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo base_url();?>productos" class="nav-link">
                          <i class="fas fa-store nav-icon"></i>
                          <p>Productos</p>
                        </a>
                      </li>   
            </ul>
          </li>           
          <?php }?>                        
          <?php if($this->session->userdata('login')) { ?>   
                  <li class="nav-item">
                      <a href="<?php echo base_url();?>clientes" class="nav-link">
                      <i class="fas fa-users  nav-icon"></i>
                      <p>Clientes</p>
                      </a>
                  </li>   
                  <li class="nav-item">
                      <a href="<?php echo base_url();?>ventas" class="nav-link">
                      <i class="fas fa-shopping-basket nav-icon"></i>
                      <p>Ventas</p>
                      </a>
                  </li>   
          <?php }?>     
                    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>