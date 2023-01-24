<?php
    if($_SESSION["roleC"] != "admin"){
        echo '<script>
            window.location = "init";
        </script>';
        return;
    }
?>

<div class="content-wrapper">
	<section class="content">	
		<div class="box">			
			<div class="box-body">
				<?php
                    $editProfile = new AdminC();
                    $editProfile -> EditProfileAdminC();
                    $editProfile -> updateProfileAdminC();
				?>							
			</div>
		</div>
	</section>
</div>