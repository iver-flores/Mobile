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
		<h1>REGISTRO DETALLADO DE LLAMADAS</h1>
	</section>
	<section class="content">	
		<div class="box">					
			<div class="box-body">				
				<table class="table table-bordered table-hover table-striped CT">					
					<thead>						
						<tr>							
							<th style="text-align: center;">N°</th>
							<th style="text-align: center;">Origen</th>
                            <th style="text-align: center;">Destino</th>
							<th style="text-align: center;">Fecha</th>
							<th style="text-align: center;">Duracion</th>
                            <th style="text-align: center;">Estado</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$columna = null;
						$valor = null;
						$resultado = CdrC::viewCdrsC($columna, $valor);
						foreach ($resultado as $key => $value) {						
							echo '<tr>							
								<td style="text-align: center;">'.($key+1).'</td>
								<td style="text-align: center;">'.$value["src"].'</td>
                                <td style="text-align: center;">'.$value["dst"].'</td>
                                <td style="text-align: center;">'.$value["calldate"].'</td>
                                <td style="text-align: center;">'.$value["duration"].'</td>
                                <td style="text-align: center;">'.$value["disposition"].'</td>                                								
							</tr>';
						}
						?>										
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>