<?php 
    session_start();
    require "assets/config/define.php";
    require "assets/config/koneksi.php";
    if (!isset($_SESSION['pro_username']) && !isset($_SESSION['pro_password'])) {
        header("Location:home.php");
    }else{
        $nim_koas = $_SESSION['pro_id'];
?>
<!DOCTYPE html>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>EDOM - Profesi FKUMS</title>
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL; ?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL; ?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL; ?>assets/css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="<?php echo BASE_URL; ?>assets/js/Lightweight-Chart/cssCharts.css" rel="stylesheet"> 
    <link href="<?php echo BASE_URL; ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./"><strong><i class="icon fa fa-list-alt"></i> EDOM</strong></a>		
        		<div id="sideNav" href="">
        		  <i class="fa fa-bars icon"></i> 
        		</div>
            </div>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <?php require "assets/config/menu.php" ?>
        </nav>
        
        <?php require "assets/config/konten.php"; ?>
		
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo BASE_URL; ?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/custom-scripts.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
            $('#dataTables-example1').dataTable();
        });
    </script>
    <script src="<?php echo BASE_URL; ?>assets/js/chained/jquery.chained.min.js"></script>
    <script>
        $("#dosen").chained("#stase");
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : 'detail.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
             });
        });
      </script>
</body>
</html>
<?php
    }
?>