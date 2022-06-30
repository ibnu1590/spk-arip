<?php
    session_start();
    error_reporting(0);
    
    if(empty($_SESSION['id'])){
        header('location:login.php?error_login=1');
    }
?>
<!-- LOGO HEADER END-->
 <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a style="text-transform: capitalize;" href="index.php" id="home">Dashboard</a></li>
                            <li>
                                <a style="text-transform: capitalize;" href="" data-toggle="dropdown" > Master</a>
                                <ul class="dropdown-menu">
                                    <li><a style="text-transform: capitalize;" href="tampil_admin.php" id="AD">Data Admin</a></li>
                                    <li><a style="text-transform: capitalize;" href="tampil_karyawan.php" id="ck">Data Karyawan</a></li>
                                    <li><a style="text-transform: capitalize;" href="tampil_kriteria.php" id="ds">Data Kriteria</a></li>
                                    <li><a style="text-transform: capitalize;" href="tampil_subkriteria.php" id="sk">Data Sub Kriteria</a></li>
                                </ul>
                            </li>
                            <?php 
                                if ($_SESSION['role'] == 'kepalasekolah') {
                            ?>
                            <li><a style="text-transform: capitalize;" href="tampil_tpa.php" id="tpa">Penilaian Karyawan</a></li>
                            <li><a style="text-transform: capitalize;" href="proses_spk.php" id="proses">Proses SPK</a></li>  
                            <?php
                                }
                            ?>
                            <li><a style="text-transform: capitalize;" href="ubah_password.php" id="proses">Ubah Password</a></li>                                                               
                            <li>
                                <a style="text-transform: capitalize;" href="" data-toggle="dropdown" > Laporan</a>
                                <ul class="dropdown-menu">
                                    <li><a style="text-transform: capitalize;" href="lap_admin.php" id="ck">Lap Admin</a></li>
                                    <li><a style="text-transform: capitalize;" href="lap_karyawan.php" id="ck">Lap Karyawan</a></li>
                                    <li><a style="text-transform: capitalize;" href="lap_kriteria.php" id="ds">Lap Kriteria</a></li>
                                    <li><a style="text-transform: capitalize;" href="lap_subkriteria.php" id="sk">Lap Sub Kriteria</a></li>
                                    <li><a style="text-transform: capitalize;" href="lap_penilaian.php" id="sk">Lap Penilaian</a></li>
                                </ul>
                            </li>
                            <li><a style="text-transform: capitalize;" href="logout.php" id="ds">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <!--First Commit-->