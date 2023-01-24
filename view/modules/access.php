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
		<h1>REGISTRO DE ACCESOS</h1>
	</section>
	<section class="content">	
		<div class="box">					
			<div class="box-body">				
				<table class="table table-bordered table-hover table-striped AT">					
					<thead>						
						<tr>							
							<th style="text-align: center;">N°</th>
							<th style="text-align: center;">Usuario</th>
                            <th style="text-align: center;">Puerta</th>
							<th style="text-align: center;">Rol</th>
							<th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Estade</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$columna = null;
						$valor = null;
						$resultado = AccessC::viewAccessC($columna, $valor);
						foreach ($resultado as $key => $value) {						
							echo '<tr>							
								<td style="text-align: center;">'.($key+1).'</td>
								<td style="text-align: center;">'.$value["callerid"].'</td>
                                <td style="text-align: center;">'.$value["door"].'</td>
                                <td style="text-align: center;">'.$value["role"].'</td>
                                <td style="text-align: center;">'.$value["date"].'</td>
                                <td style="text-align: center;">'.$value["state"].'</td>                                								
							</tr>';
						}
						?>										
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>