<div class="login-box">
  <div class="login-logo">
    <a href="#"><h1>MOBILE IP</h1></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresar como Administrador</p>
    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user-ent" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password-ent" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">    
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
      <?php
        $ingreso = new AdminC();
        $ingreso -> entranceAdminC();
      ?>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>