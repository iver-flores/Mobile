<header class="main-header">
    <!-- Logo -->
    <a href="http://127.0.0.1/mobile/init" class="logo" style="background-color: #Fc4722;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MOBILE IP</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #FF5722;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">    
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
                if($_SESSION["photoC"] == "" || $_SESSION["photoC"] == "0"){
                    echo '<img src="http://127.0.0.1/mobile/view/img/defecto.png" 
                    class="user-image" alt="User Image">';
                }else{
                    echo '<img src="http://127.0.0.1/mobile/'.$_SESSION["photoC"].'" 
                    class="user-image" alt="User Image">';
                }
              ?>        
                <span class="hidden-xs">
                    <?php echo $_SESSION["nameC"]; 
                        echo " "; 
                        echo $_SESSION["surnameC"];  
                    ?>
                </span>
            </a>
            <ul class="dropdown-menu">              
              <li class="user-footer">
                <div class="pull-left">
                  <?php
                  echo '<a href="http://127.0.0.1/mobile/profile-'.$_SESSION["roleC"].'" 
                  class="btn btn-primary btn-flat">Perfil</a>';
                  ?>                  
                </div>
                <div class="pull-right">
                  <a href="http://127.0.0.1/mobile/exit" 
                  class="btn btn-danger btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>          
        </ul>
      </div>
    </nav>
  </header>