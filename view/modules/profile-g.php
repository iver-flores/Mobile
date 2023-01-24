<?php
    if($_SESSION["roleC"] != "guard"){
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
                    $editProfile = new GuardC();
                    $editProfile -> EditProfileGuardC();
                    $editProfile -> updateProfileGuardC();
				?>							
			</div>
		</div>
	</section>
</div>