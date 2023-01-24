<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MOBILE IP</title>  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
  <link rel="icon" type="image/png" href="view/img/favicon.png"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/dist/css/skins/_all-skins.min.css">

  <!-- my styles-->
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/dist/css/styles.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- FullCalendar -->
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="http://127.0.0.1/mobile/view/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->
  <?php
  if(isset($_SESSION["enterC"]) && $_SESSION["enterC"] == true){
    echo '<div class="wrapper">';
    include "modules/header.php";
    if($_SESSION["roleC"] == "guard"){
      include "modules/menuGuard.php";
    }else if($_SESSION["roleC"] == "admin"){
      include "modules/menuAdmin.php";
    }else if($_SESSION["roleC"] == "Doctor"){
      include "modulos/menuDoctor.php";
    }else if($_SESSION["roleC"] == "Administrador"){
      include "modules/menuAdmin.php";
    }
    $url = array();
    if(isset($_GET["url"])){
      $url = explode("/", $_GET["url"]);
      if($url[0] == "init" || $url[0] == "exit" || $url[0] == "profile-guard" 
        || $url[0] == "profile-g" || $url[0] == "cameras" || $url[0] == "E-C" 
        || $url[0] == "doors" || $url[0] == "E-D" || $url[0] == "users" 
        || $url[0] == "access" || $url[0] == "cdrs" 
        || $url[0] == "profile-admin" || $url[0] == "profile-a" 
        || $url[0] == "Ver-consultorios" || $url[0] == "Doctor" 
        || $url[0] == "historial" || $url[0] == "perfil-Doctor" || $url[0] == "perfil-D" 
        || $url[0] == "Citas" || $url[0] == "perfil-Administrador" || $url[0] == "perfil-A" 
        || $url[0] == "guards" || $url[0] == "init-edit"){

        include "modules/".$url[0].".php";
      }
    }else{
        include "modules/init.php";
    }
    echo '</div>';
  }else if(isset($_GET["url"])){        
      if($_GET["url"] == "select"){
        include "modules/select.php";        
      }else if($_GET["url"] == "enter-guard"){
        include "modules/enter-guard.php";
      }else if($_GET["url"] == "enter-admin"){
        include "modules/enter-admin.php";
      }else if($_GET["url"] == "ingreso-Doctor"){
        include "modulos/ingreso-Doctor.php";
      }else if($_GET["url"] == "ingreso-Administrador"){
        include "modulos/ingreso-administrador.php";
      }
    }else {
      include "modules/select.php";
    }
  ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
 

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://127.0.0.1/mobile/view/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://127.0.0.1/mobile/view/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://127.0.0.1/mobile/view/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://127.0.0.1/mobile/view/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://127.0.0.1/mobile/view/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://127.0.0.1/mobile/view/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="http://127.0.0.1/mobile/view/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="http://127.0.0.1/mobile/view/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://127.0.0.1/mobile/view/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://127.0.0.1/mobile/view/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="http://127.0.0.1/mobile/view/bower_components/moment/moment.js"></script>
<script src="http://127.0.0.1/mobile/view/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="http://127.0.0.1/mobile/view/bower_components/fullcalendar/dist/locale/es.js"></script>

<script src="http://127.0.0.1/mobile/view/js/Users.js"></script>
<script src="http://127.0.0.1/mobile/view/js/Access.js"></script>
<script src="http://127.0.0.1/mobile/view/js/Guards.js"></script>
<script src="http://127.0.0.1/mobile/view/js/Cdrs.js"></script>
<!--
<script src="http://127.0.0.1/mobile/view/js/doctores.js"></script>
<script src="http://127.0.0.1/mobile/view/js/pacientes.js"></script>
<script src="http://127.0.0.1/mobile/view/js/secretarias.js"></script>
-->

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

</body>
</html>
