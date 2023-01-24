<?php
    if($_SESSION["roleC"] != "guard"){
	    echo '<script>
	        window.location = "init";
	    </script>';
	return;
    }
?>

<div class="content-wrapper">	
	<section class="content-header">
		<h1>Editar Camara</h1>
	</section>
	<section class="content">	
		<div class="box">			
			<div class="box-body">				
				<form method="post">
					<?php
					    $editarC = new CamerasC();
					    $editarC -> editCamerasC();
					    $editarC -> updateCamerasC();
					?>									
				</form>
			</div>
		</div>
	</section>

</div>