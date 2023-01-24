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
		<h1>GESTOR DE CAMARAS</h1>
	</section>
	<section class="content">	
		<div class="box">		
			<div class="box-header">				
				<form method="post">					
					<div class="col-md-4 col-xs-12">
                        <br>                        
						<input type="text" class="form-control" name="cameraN" 
                            placeholder="Ingrese el Nombre de la Camara" required>                        
					</div>
                    <div class="col-md-3 col-xs-12">						
                        <br>                        
                        <input type="text" class="form-control" name="ipN" 
                            placeholder="Ingrese la IP de la Camara" required>
					</div>
                    <div class="col-md-2 col-xs-12">                    
                        <br>                        
                        <button type="submit" class="btn btn-primary">Crear Camara</button>
                    </div>			
				</form>
				<?php
				    $crearC = new CamerasC();
				    $crearC -> createCameraC();
				?>
			</div>
			<div class="box-body">	
				<table class="table table-bordered table-hover table-striped">					
					<thead>						
						<tr>							
							<th>N°</th>
							<th style="text-align: center;">Camara</th>
                            <th style="text-align: center;">Direccion IP</th>
							<th style="text-align: center;">Editar</th>
							<th style="text-align: center;">Borrar</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$columna = null;
						$valor = null;
						$resultado = CamerasC::viewCamerasC($columna, $valor);
						foreach ($resultado as $key => $value) {						
							echo '<tr>							
								<td style="text-align: center;">'.($key+1).'</td>
								<td style="text-align: center;">'.$value["name"].'</td>
                                <td style="text-align: center;">'.$value["ip"].'</td>                                
								<td style="text-align: center;">									
									<div class="btn-group">											
										<a href="http://127.0.0.1/mobile/E-C/'.$value["id"].'">
											<button class="btn btn-success"><i class="fa fa-pencil">
                                            </i> Editar</button>
										</a>										
									</div>
								</td>
								<td style="text-align: center;">									
									<div class="btn-group">																					
										<a href="http://127.0.0.1/mobile/cameras/'.$value["id"].'">
											<button class="btn btn-danger"><i class="fa fa-times">
                                            </i> Borrar</button>
										</a>
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
<?php
    $borrarC = new CamerasC();
    $borrarC -> deleteCamerasC();