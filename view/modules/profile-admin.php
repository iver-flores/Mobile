<?php
    if($_SESSION["roleC"] != "admin"){
        echo '<script>
            window.location = "init";
        </script>';
        return;
    }
?>

<div class="content-wrapper">
	<section class="content-header">	
		<h1>GESTOR DE PERFIL</h1>
	</section>
	<section class="content">		
		<div class="box">		
			<div class="box-body">				
				<table class="table table-bordered table-hover table-striped">					
					<thead>						
						<tr>							
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Foto</th>
							<th>Editar</th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $perfil = new AdminC();
                            $perfil -> viewProfileAdminC();
						?>						
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>