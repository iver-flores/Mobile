<?php
    if($_SESSION["roleC"] != "guard" && $_SESSION["roleC"] != "admin"){
        echo '<script>
            window.location = "init";
        </script>';
        return;
    }
?>

<div class="content-wrapper">
	<section class="content-header">		
		<h1>GESTOR DE GUARDIAS</h1>
	</section>
	<section class="content">	
		<div class="box">		
			<div class="box-header">				
				<button class="btn btn-primary btn-lg" data-toggle="modal" 
                    data-target="#createGuard">Crear Guardia
                </button>				
			</div>
			<div class="box-body">				
				<table class="table table-bordered table-hover table-striped dt-responsive GT">					
					<thead>						
						<tr>							
							<th>N°</th>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Foto</th>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Borrar</th>
						</tr>
					</thead>
					<tbody>
						<?php
						    $resultado = GuardC::viewGuardsC();
						    foreach ($resultado as $key => $value) {							
							    echo '<tr>							
									<td>'.($key+1).'</td>
									<td>'.$value["surname"].'</td>
									<td>'.$value["name"].'</td>';
									if($value["photo"] == "0" || $value["photo"] == ""){
										echo '<td><img src="view/img/defecto.png" width="40px"></td>';
									}else{
										echo '<td><img src="'.$value["photo"].'" width="40px"></td>';
									}
									echo '<td>'.$value["name"].'</td>
									<td>'.$value["password"].'</td>
									<td>									
										<div class="btn-group">										
											<button class="btn btn-danger deleteGuard" 
                                                Gid="'.$value["id"].'" imgG="'.$value["photo"].'">
                                                <i class="fa fa-times"></i> Borrar</button>											
										</div>
									</td>
								</tr>';
						    }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<div class="modal fade" rol="dialog" id="createGuard">	
	<div class="modal-dialog">		
		<div class="modal-content">			
			<form method="post" role="form">				
				<div class="modal-body">					
					<div class="box-body">						
						<div class="form-group">							
							<h2>Apellido:</h2>
							<input type="text" class="form-control input-lg" name="surname" required>
							<input type="hidden" name="rolS" value="guard">
						</div>
						<div class="form-group">							
							<h2>Nombre:</h2>
							<input type="text" class="form-control input-lg" name="name" required>
						</div>
						<div class="form-group">						
							<h2>Usuario:</h2>
							<input type="text" class="form-control input-lg" name="user" required>
						</div>
						<div class="form-group">						
							<h2>Contraseña:</h2>
							<input type="text" class="form-control input-lg" name="password" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">					
					<button type="submit" class="btn btn-primary">Crear</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
				    $crear = new GuardC();
				    $crear -> createGuardsC();
				?>
			</form>
		</div>
	</div>
</div>
<?php
    $borrarD = new GuardC();
    $borrarD -> deleteGuardC();