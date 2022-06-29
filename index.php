<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php');
    }
?>
<?php include 'header.php';?>
<?php include 'menu.php';?>
<style>
        /*untuk teks heading di tag <body>*/
        h2
        {
            background-color: white;
            color: crimson;
            font-family: sans-serif;
            text-align: center;
            width: 45%;
            margin:auto;
            padding: 20px;
        }
 
        body
        {
            background-image: url(Logo.jpg);
            background-repeat: no-repeat;
            background-size: 400px 400px;
            background-position: center center;
        }
</style>
<body>
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        Selamat Datang <?php echo $_SESSION['nama'] ?>!
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                            <img width="100" height="100" src="logoadmin.ico" />
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $db->totaladmin() ?></div>
                            <div>Total Admin</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href="tampil_admin.php" id="AD">View Details</a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                            <img width="100" height="100" src="logotask.png" />
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $db->totalkriteria() ?></div>
                            <div>Total Kriteria</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href="tampil_kriteria.php" id="ds">View Details</a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                        <img width="100" height="100" src="logosub.png" />
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $db->totalsubkriteria() ?></div>
                            <div>Total Sub Kriteria</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href="tampil_subkriteria.php" id="sk">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                        <img width="100" height="100" src="logokar.png" />
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $db->totalkaryawan() ?></div>
                            <div>Total Karyawan</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href="tampil_karyawan.php" id="ck">View Details</a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                </div>
                <!-- /.row -->
            
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
</div>
<?php include 'footer.php';?>
</body>
<script type="text/javascript">
    $(function(){
        $("#home").addClass('menu-top-active');
    });
</script>
