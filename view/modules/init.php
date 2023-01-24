<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <?php
            $init = new InitC();
            $init -> showInitC();
            if($_SESSION["roleC"] == "admin"){
                echo '<div class="box-footer">
                    <a href="init-edit">
                        <button class="btn btn-success btn-lg">Editar</button>
                    </a>
                </div>';
            }
        ?>           
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>