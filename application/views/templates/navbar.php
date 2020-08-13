<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>" class="brand-link">
        <img src="<?php echo base_url() ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BlogIgniter</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url() ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <?php
                    if (isset($_SESSION['nombre']) && isset($_SESSION['apellidos'])) {
                        echo "<a href='#' class='d-block'>" . $_SESSION['nombre'] . " " . $_SESSION['apellidos'] . "</a>";
                    }
                ?>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php
                    if (isset($_SESSION['tipo'])) {
                        if ($_SESSION['tipo']=='profesor') {
                        
                            $this->load->view('templates/panelprofesor');

                        }else if($_SESSION['tipo']=='alumno') {
                
                            $this->load->view('templates/panelalumno');
                        }
                    }
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>