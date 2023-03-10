<?php $this->load->view('template/dashboard/header', $title); ?>
    <div class="dashboard">
        <!-- ini tampilan untuk sebelah kiri -->
        <nav id="sidebar" class="bg-dark">
            <ul class="menu">
                <li class="<?php echo menuAktif('dashboard'); ?>" ><?= anchor('dashboard', 'Dashboard'); ?></li>
                <li class="<?php echo menuAktif('karyawan'); ?>" ><?= anchor('dashboard/karyawan', 'Karyawan'); ?></li>
                <li><?= anchor('dashboard/gaji-dan-tunjangan', 'Gaji & Tunjangan'); ?></li>
                <li><?= anchor('dashboard/absensi', 'Absensi'); ?></li>
                <li><?= anchor('dashboard/posisi', 'Posisi'); ?></li>
                <li><?= anchor('dashboard/departemen', 'Departemen'); ?></li>
                <li>
                    <a href="#administrasi" aria-expanded="false" class="dropdown-toggle  dropdown-sidebar-colcom" data-toggle="collapse">Administrasi</a>
                    
                    <ul id="administrasi" class="collapse menu">
                        <li><?php echo anchor('dashboard/kategori', 'Kategori'); ?></li>
                    </ul>
                </li>
                <li><?= anchor('logout', 'Logout'); ?></li>
            </ul>
        </nav>

        <!-- ini tampilan untuk sebelah kanan -->
        <div id="content">
            <nav class="navbar navbar-expand bg-light">
                <button type="button" id="sidebarCollapse" class="btn btn-outline-dark">
                    <i class="fa fa-align-justify"></i>
                </button>

                <a class="navbar-brand logo-dashboard" href="#">COLCOM</a>
            </nav>

            <div class="container-fluid">
                <?php echo $this->router->fetch_class(); //mengambil nama class yang diakses user ?>
                <!-- ini adalah konten -->
            </div>
        </div>
    </div>
<?php $this->load->view('template/dashboard/header');?>