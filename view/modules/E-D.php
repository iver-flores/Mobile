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
		<h1>Editar Puerta</h1>
	</section>
	<section class="content">	
		<div class="box">			
			<div class="box-body">				
				<form method="post">
					<?php
					    $editarC = new DoorsC();
					    $editarC -> editDoorsC();
					    $editarC -> updateDoorsC();
					?>									
				</form>
			</div>
		</div>
	</section>

</div>