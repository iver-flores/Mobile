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
		<h1>GESTOR DE USUARIOS</h1>
	</section>
	<section class="content">	
		<div class="box">		
			<div class="box-header">				
				<button class="btn btn-primary btn-lg" data-toggle="modal" 
                data-target="#createUser">Crear Ususario</button>			
			</div>
			<div class="box-body">				
				<table class="table table-bordered table-hover table-striped UT">					
					<thead>						
						<tr>							
							<th style="text-align: center;">N°</th>
							<th style="text-align: center;">Apellido</th>
							<th style="text-align: center;">Nombre</th>
							<th style="text-align: center;">Foto</th>
							<th style="text-align: center;">Camara</th>
							<th style="text-align: center;">Puerta</th>
							<th style="text-align: center;">Rol</th>														
							<th style="text-align: center;">Ver</th>							
							<th style="text-align: center;">Editar</th>
							<th style="text-align: center;">Borrar</th>							
						</tr>
					</thead>
					<tbody>
						<?php
						$columna = null;
						$valor = null;
						$resultado = UsersC::verUsersC($columna, $valor);
						foreach ($resultado as $key => $value) {							
							echo '<tr>						
									<td style="text-align: center;">'.($key+1).'</td>
									<td style="text-align: center;">'.$value["surname"].'</td>
									<td style="text-align: center;">'.$value["nameConfig"].'</td>';
									if($value["photo"] == "" || $value["photo"] == "0"){
										echo '<td style="text-align: center;"><img src="view/img/defecto.png" width="40px"></td>';
									}else{
										echo '<td style="text-align: center;"><img src="'.$value["photo"].'" width="40px"></td>';
									}
									$columna = "id";
									$valor = $value["id_camera"];
									$camera = CamerasC::viewCamerasC($columna, $valor);
									$columna = "id";
									$valor = $value["id_door"];
									$door = DoorsC::viewDoorsC($columna, $valor);
									echo '<td style="text-align: center;">'.$camera["name"].'</td>
									<td style="text-align: center;">'.$door["name"].'</td>
									<td style="text-align: center;">'.$value["role"].'</td>									
									<td style="text-align: center;">									
										<div class="btn-group">																						
											<button class="btn btn-success viewUser" 
                                            Vid="'.$value["id"].'" data-toggle="modal" 
                                            data-target="#viewUser">
                                            <i class="fa fa-eye"></i></button>																						
										</div>
									</td>
									<td style="text-align: center;">									
										<div class="btn-group">																						
											<button class="btn btn-warning editUser" 
                                            Uid="'.$value["id"].'" data-toggle="modal" 
                                            data-target="#editUser">
                                            <i class="fa fa-pencil"></i></button>																						
										</div>
									</td>
									<td style="text-align: center;">									
										<div class="btn-group">																																	
											<button class="btn btn-danger deleteUser" 
                                            Uid="'.$value["id"].'" imgU="'.$value["photo"].'">
                                            <i class="fa fa-times"></i></button>											
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

<div class="modal fade" rol="dialog" id="viewUser">	
	<div class="modal-dialog">	
		<div class="modal-content">			
			<form method="post" role="form">				
				<div class="modal-body">																					
						<div class="form-group">						
							<h2>Usuario:</h2>
							<input type="text" class="form-control input-lg" id="userV" >
						</div>						
						<div class="form-group">						
							<h2>Contraseña:</h2>
							<input type="text" class="form-control input-lg" id="passwordV">
						</div>
						<div class="form-group">						
							<h2>NameConfig:</h2>
							<input type="text" class="form-control input-lg" id="nameConfigV">
						</div>
						<div class="form-group">						
							<h2>Callerid:</h2>
							<input type="text" class="form-control input-lg" id="callerIdV">
						</div>
						<div class="form-group">						
							<h2>Defaultuser:</h2>
							<input type="text" class="form-control input-lg" id="defaultuserV">
						</div>
						<div class="form-group">						
							<h2>Regexten:</h2>
							<input type="text" class="form-control input-lg" id="regextenV">
						</div>
						<div class="form-group">						
							<h2>Secret:</h2>
							<input type="text" class="form-control input-lg" id="secretV">
						</div>
						<div class="form-group">						
							<h2>Mailbox:</h2>
							<input type="text" class="form-control input-lg" id="mailboxV">
						</div>
						<div class="form-group">						
							<h2>Accountcode:</h2>
							<input type="text" class="form-control input-lg" id="accountcodeV">
						</div>
						<div class="form-group">						
							<h2>Context:</h2>
							<input type="text" class="form-control input-lg" id="contextV">
						</div>
						<div class="form-group">						
							<h2>Amaflags:</h2>
							<input type="text" class="form-control input-lg" id="amaflagsV">
						</div>
						<div class="form-group">						
							<h2>Callgroup:</h2>
							<input type="text" class="form-control input-lg" id="callgroupV">
						</div>
						<div class="form-group">						
							<h2>Canreinvite:</h2>
							<input type="text" class="form-control input-lg" id="canreinviteV">
						</div>
						<div class="form-group">						
							<h2>Defaultip:</h2>
							<input type="text" class="form-control input-lg" id="defaultipV">
						</div>
						<div class="form-group">						
							<h2>Dtmfmode:</h2>
							<input type="text" class="form-control input-lg" id="dtmfmodeV">
						</div>
						<div class="form-group">						
							<h2>Fromuser:</h2>
							<input type="text" class="form-control input-lg" id="fromuserV">
						</div>
						<div class="form-group">						
							<h2>Fromdomain:</h2>
							<input type="text" class="form-control input-lg" id="fromdomainV">
						</div>
						<div class="form-group">						
							<h2>Fullcontact:</h2>
							<input type="text" class="form-control input-lg" id="fullcontactV">
						</div>						
						<div class="form-group">						
							<h2>Host:</h2>
							<input type="text" class="form-control input-lg" id="hostV">
						</div>
						<div class="form-group">						
							<h2>Insecure:</h2>
							<input type="text" class="form-control input-lg" id="insecureV">
						</div>
						<div class="form-group">						
							<h2>Language:</h2>
							<input type="text" class="form-control input-lg" id="languageV">
						</div>
						<div class="form-group">						
							<h2>Md5secret:</h2>
							<input type="text" class="form-control input-lg" id="md5secretV">
						</div>
						<div class="form-group">						
							<h2>Nat:</h2>
							<input type="text" class="form-control input-lg" id="natV">
						</div>
						<div class="form-group">						
							<h2>Deny:</h2>
							<input type="text" class="form-control input-lg" id="denyV">
						</div>
						<div class="form-group">						
							<h2>Permit:</h2>
							<input type="text" class="form-control input-lg" id="permitV">
						</div>
						<div class="form-group">						
							<h2>Mask:</h2>
							<input type="text" class="form-control input-lg" id="maskV">
						</div>
						<div class="form-group">						
							<h2>Pickupgroup:</h2>
							<input type="text" class="form-control input-lg" id="pickupgroupV">
						</div>
						<div class="form-group">						
							<h2>Port:</h2>
							<input type="text" class="form-control input-lg" id="portV">
						</div>
						<div class="form-group">						
							<h2>Qualify:</h2>
							<input type="text" class="form-control input-lg" id="qualifyV">
						</div>
						<div class="form-group">						
							<h2>Restrictcid:</h2>
							<input type="text" class="form-control input-lg" id="restrictcidV">
						</div>
						<div class="form-group">						
							<h2>Rtptimeout:</h2>
							<input type="text" class="form-control input-lg" id="rtptimeoutV">
						</div>						
						<div class="form-group">						
							<h2>Rtpholdtimeout:</h2>
							<input type="text" class="form-control input-lg" id="rtpholdtimeoutV">
						</div>
						<div class="form-group">						
							<h2>Type:</h2>
							<input type="text" class="form-control input-lg" id="typeE">
						</div>
						<div class="form-group">						
							<h2>Disallow:</h2>
							<input type="text" class="form-control input-lg" id="disallowV">
						</div>
						<div class="form-group">						
							<h2>Allow:</h2>
							<input type="text" class="form-control input-lg" id="allowV">
						</div>
						<div class="form-group">						
							<h2>Musiconhold:</h2>
							<input type="text" class="form-control input-lg" id="musiconholdV">
						</div>
						<div class="form-group">						
							<h2>Regseconds:</h2>
							<input type="text" class="form-control input-lg" id="regsecondsV">
						</div>						
						<div class="form-group">						
							<h2>IPaddr:</h2>
							<input type="text" class="form-control input-lg" id="ipaddrV">
						</div>
						<div class="form-group">						
							<h2>Cancallforward:</h2>
							<input type="text" class="form-control input-lg" id="cancallforwardV">
						</div>
						<div class="form-group">						
							<h2>Lastms:</h2>
							<input type="text" class="form-control input-lg" id="lastmsV">
						</div>
						<div class="form-group">						
							<h2>Useragent:</h2>
							<input type="text" class="form-control input-lg" id="useragentV">
						</div>
						<div class="form-group">						
							<h2>Regserver:</h2>
							<input type="text" class="form-control input-lg" id="regserverV">
						</div>
						<div class="form-group">						
							<h2>Callbackextension:</h2>
							<input type="text" class="form-control input-lg" id="callbackextensionV">
						</div>
						<div class="form-group">						
							<h2>Address :</h2>
							<input type="text" class="form-control input-lg" id="addressV">
						</div>		
				</div>
				<div class="modal-footer">										
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>				
			</form>
		</div>
	</div>
</div>

<div class="modal fade" rol="dialog" id="createUser">	
	<div class="modal-dialog">	
		<div class="modal-content">			
			<form method="post" role="form">				
				<div class="modal-body">									
				<div class="create-route">							
							<h2>Apellido:</h2>
							<input type="text" class="form-control input-lg" name="surname" required>
							<input type="hidden" name="roleU" value="user">
						</div>
						<div class="create-route">						
							<h2>ID de Llamada:</h2>
							<input type="text" class="form-control input-lg" name="name" required>
						</div>						
						<div class="create-route">							
							<h2>Camara:</h2>
							<select class="form-control input-lg" name="camera">								
								<option>Seleccionar...</option>
								<?php
									$columna = null;
									$valor = null;
									$resultado = CamerasC::viewCamerasC($columna, $valor);
									foreach ($resultado as $key => $value) {									
										echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
									}
								?>
							</select>
						</div>
						<div class="create-route">							
							<h2>Puerta:</h2>
							<select class="form-control input-lg" name="door">								
								<option>Seleccionar...</option>
								<?php
									$columna = null;
									$valor = null;
									$resultado = DoorsC::viewDoorsC($columna, $valor);
									foreach ($resultado as $key => $value) {									
										echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
									}
								?>
							</select>
						</div>
						<div class="create-route">							
							<h2>Rol:</h2>
							<select class="form-control input-lg" name="role" required="">								
								<option>Seleccionar...</option>
								<option value="play">Patio de entretenimientos</option>
								<option value="food">Patio de comidas</option>
								<option value="habitant">Habitante</option>
								<option value="porter">Portero</option>
								<option value="family">Familia</option>							
								<option value="access">Acceso</option>																
							</select>
						</div>
						<div class="create-route">							
							<h2>Usuario:</h2>
							<input type="text" class="form-control input-lg" name="user" required>
						</div>
						<div class="create-route">						
							<h2>Contraseña:</h2>
							<input type="text" class="form-control input-lg" name="password" required>
						</div>					
						<div class="create-route">						
							<h2>NameConfig:</h2>
							<input type="text" class="form-control input-lg" name="nameConfig" value="nombre de usuario" required>
						</div>
						<div class="create-route">						
							<h2>Callerid:</h2>
							<input type="text" class="form-control input-lg" name="callerId" value="identificador" required>
						</div>
						<div class="create-route">						
							<h2>Defaultuser:</h2>
							<input type="text" class="form-control input-lg" name="defaultuser" value="1999" required>
						</div>
						<div class="create-route">						
							<h2>Regexten:</h2>
							<input type="text" class="form-control input-lg" name="regexten" value="">
						</div>
						<div class="create-route">						
							<h2>Secret:</h2>
							<input type="text" class="form-control input-lg" name="secret" value="12345678" required>
						</div>
						<div class="create-route">						
							<h2>Mailbox:</h2>
							<input type="text" class="form-control input-lg" name="mailbox" value="">
						</div>
						<div class="create-route">						
							<h2>Accountcode:</h2>
							<input type="text" class="form-control input-lg" name="accountcode" value="">
						</div>
						<div class="create-route">						
							<h2>Context:</h2>
							<input type="text" class="form-control input-lg" name="context" value="portero" required>
						</div>
						<div class="create-route">						
							<h2>Amaflags:</h2>
							<input type="text" class="form-control input-lg" name="amaflags" value="">
						</div>
						<div class="create-route">						
							<h2>Callgroup:</h2>
							<input type="text" class="form-control input-lg" name="callgroup" value="">
						</div>
						<div class="create-route">						
							<h2>Canreinvite:</h2>
							<input type="text" class="form-control input-lg" name="canreinvite" value="yes" required>
						</div>
						<div class="create-route">						
							<h2>Defaultip:</h2>
							<input type="text" class="form-control input-lg" name="defaultip" value="">
						</div>
						<div class="create-route">						
							<h2>Dtmfmode:</h2>
							<input type="text" class="form-control input-lg" name="dtmfmode" value="">
						</div>
						<div class="create-route">						
							<h2>Fromuser:</h2>
							<input type="text" class="form-control input-lg" name="fromuser" value="">
						</div>
						<div class="create-route">						
							<h2>Fromdomain:</h2>
							<input type="text" class="form-control input-lg" name="fromdomain" value="">
						</div>
						<div class="create-route">						
							<h2>Fullcontact:</h2>
							<input type="text" class="form-control input-lg" name="fullcontact" value="">
						</div>						
						<div class="create-route">						
							<h2>Host:</h2>
							<input type="text" class="form-control input-lg" name="host" value="dynamic" required>
						</div>
						<div class="create-route">						
							<h2>Insecure:</h2>
							<input type="text" class="form-control input-lg" name="insecure" value="">
						</div>
						<div class="create-route">						
							<h2>Language:</h2>
							<input type="text" class="form-control input-lg" name="language" value="">
						</div>
						<div class="create-route">						
							<h2>Md5secret:</h2>
							<input type="text" class="form-control input-lg" name="md5secret" value="">
						</div>
						<div class="create-route">						
							<h2>Nat:</h2>
							<input type="text" class="form-control input-lg" name="nat" value="force_rport,comedia" required>
						</div>
						<div class="create-route">						
							<h2>Deny:</h2>
							<input type="text" class="form-control input-lg" name="deny" value="">
						</div>
						<div class="create-route">						
							<h2>Permit:</h2>
							<input type="text" class="form-control input-lg" name="permit" value="">
						</div>
						<div class="create-route">						
							<h2>Mask:</h2>
							<input type="text" class="form-control input-lg" name="mask" value="">
						</div>
						<div class="create-route">						
							<h2>Pickupgroup:</h2>
							<input type="text" class="form-control input-lg" name="pickupgroup" value="">
						</div>
						<div class="create-route">						
							<h2>Port:</h2>
							<input type="text" class="form-control input-lg" name="port" value="">
						</div>
						<div class="create-route">						
							<h2>Qualify:</h2>
							<input type="text" class="form-control input-lg" name="qualify" value="no" required>
						</div>
						<div class="create-route">						
							<h2>Restrictcid:</h2>
							<input type="text" class="form-control input-lg" name="restrictcid" value="">
						</div>
						<div class="create-route">						
							<h2>Rtptimeout:</h2>
							<input type="text" class="form-control input-lg" name="rtptimeout" value="">
						</div>						
						<div class="create-route">						
							<h2>Rtpholdtimeout:</h2>
							<input type="text" class="form-control input-lg" name="rtpholdtimeout" value="">
						</div>
						<div class="create-route">						
							<h2>Type:</h2>
							<input type="text" class="form-control input-lg" name="type" value="friend" required>
						</div>
						<div class="create-route">						
							<h2>Disallow:</h2>
							<input type="text" class="form-control input-lg" name="disallow" value="all" required>
						</div>
						<div class="create-route">						
							<h2>Allow:</h2>
							<input type="text" class="form-control input-lg" name="allow" value="g729;ilbc;gsm;ulaw;alaw" required>
						</div>
						<div class="create-route">						
							<h2>Musiconhold:</h2>
							<input type="text" class="form-control input-lg" name="musiconhold" value="">
						</div>
						<div class="create-route">						
							<h2>Regseconds:</h2>
							<input type="text" class="form-control input-lg" name="regseconds" value="0" required>
						</div>					
						<div class="create-route">						
							<h2>IPaddr:</h2>
							<input type="text" class="form-control input-lg" name="ipaddr" value="">
						</div>
						<div class="create-route">						
							<h2>Cancallforward:</h2>
							<input type="text" class="form-control input-lg" name="cancallforward" value="yes" required>
						</div>
						<div class="create-route">						
							<h2>Lastms:</h2>
							<input type="text" class="form-control input-lg" name="lastms" value="0">
						</div>
						<div class="create-route">						
							<h2>Useragent:</h2>
							<input type="text" class="form-control input-lg" name="useragent" value="">
						</div>
						<div class="create-route">						
							<h2>Regserver:</h2>
							<input type="text" class="form-control input-lg" name="regserver" value="">
						</div>
						<div class="create-route">						
							<h2>Callbackextension:</h2>
							<input type="text" class="form-control input-lg" name="callbackextension" value="">
						</div>
						<div class="create-route">						
							<h2>Address :</h2>
							<input type="text" class="form-control input-lg" name="address" value="Ubicacion de domicilio" required>
						</div>
				</div>
				<div class="modal-footer">					
					<button type="submit" class="btn btn-primary">Crear</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
					$crear = new UsersC();
					$crear -> crearUsersC();
				?>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" rol="dialog" id="editUser">	
	<div class="modal-dialog">	
		<div class="modal-content">			
			<form method="post" role="form">				
				<div class="modal-body">					
					<div class="form-group">							
							<h2>Apellido:</h2>
							<input type="text" class="form-control input-lg" id="surnameE" 
								name="surnameE" required>
							<input type="hidden" id="Uid" name="Uid">
						</div>
						<div class="form-group">							
							<h2>ID de Llamada:</h2>
							<input type="text" class="form-control input-lg" id="nameE" 
							name="nameE" required>
						</div>						

						<div class="form-group">							
							<h2>Camara:</h2>
							<select class="form-control input-lg" id="cameraE" name="cameraE">								
								<option id="cameraE"></option>
								<?php
									$columna = null;
									$valor = null;
									$resultado = CamerasC::viewCamerasC($columna, $valor);
									foreach ($resultado as $key => $value) {																		
										echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';									
									}
								?>
							</select>
						</div>
						<div class="form-group">							
							<h2>Puerta:</h2>
							<select class="form-control input-lg" id="doorE" name="doorE">			
							<option id="doorE"></option>													
								<?php
									$columna = null;
									$valor = null;
									$resultado = DoorsC::viewDoorsC($columna, $valor);
									foreach ($resultado as $key => $value) {																			
										echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
									}
								?>
							</select>
						</div>							
						<div class="form-group">							
							<h2>Rol:</h2>
							<select class="form-control input-lg" id="roleE"  name="roleE" required="">																								
								<option id="roleE"></option>
								<option value="play">Patio de entretenimientos</option>
								<option value="food">Patio de comidas</option>
								<option value="habitant">Habitante</option>
								<option value="portero">Portero</option>
								<option value="family">Familia</option>							
								<option value="access">Acceso</option>																
							</select>
						</div>
						<div class="form-group">						
							<h2>Usuario:</h2>
							<input type="text" class="form-control input-lg" id="userE" name="userE" require>
						</div>					
						<div class="form-group">						
							<h2>Contraseña:</h2>
							<input type="text" class="form-control input-lg" id="passwordE" name="passwordE" require>
						</div>
						<div class="form-group">						
							<h2>NameConfig:</h2>
							<input type="text" class="form-control input-lg" id="nameConfigE" name="nameConfigE" required>
						</div>
						<div class="form-group">						
							<h2>Callerid:</h2>
							<input type="text" class="form-control input-lg" id="callerIdE" name="CallerIdE" required>
						</div>
						<div class="form-group">						
							<h2>Defaultuser:</h2>
							<input type="text" class="form-control input-lg" id="defaultuserE" name="defaultuserE" required>
						</div>
						<div class="form-group">						
							<h2>Regexten:</h2>
							<input type="text" class="form-control input-lg" id="regextenE" name="regextenE" required>
						</div>
						<div class="form-group">						
							<h2>Secret:</h2>
							<input type="text" class="form-control input-lg" id="secretE" name="secretE" required>
						</div>
						<div class="form-group">						
							<h2>Mailbox:</h2>
							<input type="text" class="form-control input-lg" id="mailboxE" name="mailboxE" required>
						</div>
						<div class="form-group">						
							<h2>Accountcode:</h2>
							<input type="text" class="form-control input-lg" id="accountcodeE" name="accountcodeE" required>
						</div>
						<div class="form-group">						
							<h2>Context:</h2>
							<input type="text" class="form-control input-lg" id="contextE" name="contextE" required>
						</div>
						<div class="form-group">						
							<h2>Amaflags:</h2>
							<input type="text" class="form-control input-lg" id="amaflagsE" name="amaflagsE" required>
						</div>
						<div class="form-group">						
							<h2>Callgroup:</h2>
							<input type="text" class="form-control input-lg" id="callgroupE" name="callgroupE" required>
						</div>
						<div class="form-group">						
							<h2>Canreinvite:</h2>
							<input type="text" class="form-control input-lg" id="canreinviteE" name="canreinviteE" required>
						</div>
						<div class="form-group">						
							<h2>Defaultip:</h2>
							<input type="text" class="form-control input-lg" id="defaultipE" name="defaultipE" required>
						</div>
						<div class="form-group">						
							<h2>Dtmfmode:</h2>
							<input type="text" class="form-control input-lg" id="dtmfmodeE" name="dtmfmodeE" required>
						</div>
						<div class="form-group">						
							<h2>Fromuser:</h2>
							<input type="text" class="form-control input-lg" id="fromuserE" name="fromuserE" required>
						</div>
						<div class="form-group">						
							<h2>Fromdomain:</h2>
							<input type="text" class="form-control input-lg" id="fromdomainE" name="fromdomainE" required>
						</div>
						<div class="form-group">						
							<h2>Fullcontact:</h2>
							<input type="text" class="form-control input-lg" id="fullcontactE" name="fullcontactE" required>
						</div>						
						<div class="form-group">						
							<h2>Host:</h2>
							<input type="text" class="form-control input-lg" id="hostE" name="hostE" required>
						</div>
						<div class="form-group">						
							<h2>Insecure:</h2>
							<input type="text" class="form-control input-lg" id="insecureE" name="insecureE" required>
						</div>
						<div class="form-group">						
							<h2>Language:</h2>
							<input type="text" class="form-control input-lg" id="languageE" name="languageE" required>
						</div>
						<div class="form-group">						
							<h2>Md5secret:</h2>
							<input type="text" class="form-control input-lg" id="md5secretE" name="md5secretE" required>
						</div>
						<div class="form-group">						
							<h2>Nat:</h2>
							<input type="text" class="form-control input-lg" id="natE" name="natE" required>
						</div>
						<div class="form-group">						
							<h2>Deny:</h2>
							<input type="text" class="form-control input-lg" id="denyE" name="denyE" required>
						</div>
						<div class="form-group">						
							<h2>Permit:</h2>
							<input type="text" class="form-control input-lg" id="permitE" name="permitE" required>
						</div>
						<div class="form-group">						
							<h2>Mask:</h2>
							<input type="text" class="form-control input-lg" id="maskE" name="maskE" required>
						</div>
						<div class="form-group">						
							<h2>Pickupgroup:</h2>
							<input type="text" class="form-control input-lg" id="pickupgroupE" name="pickupgroupE" required>
						</div>
						<div class="form-group">						
							<h2>Port:</h2>
							<input type="text" class="form-control input-lg" id="portE" name="portE" required>
						</div>
						<div class="form-group">						
							<h2>Qualify:</h2>
							<input type="text" class="form-control input-lg" id="qualifyE" name="qualifyE" required>
						</div>
						<div class="form-group">						
							<h2>Restrictcid:</h2>
							<input type="text" class="form-control input-lg" id="restrictcidE" name="restrictcidE" required>
						</div>
						<div class="form-group">						
							<h2>Rtptimeout:</h2>
							<input type="text" class="form-control input-lg" id="rtptimeoutE" name="rtptimeoutE" required>
						</div>						
						<div class="form-group">						
							<h2>Rtpholdtimeout:</h2>
							<input type="text" class="form-control input-lg" id="rtpholdtimeoutE" name="rtpholdtimeoutE" required>
						</div>
						<div class="form-group">						
							<h2>Type:</h2>
							<input type="text" class="form-control input-lg" id="typeE" name="typeE" required>
						</div>
						<div class="form-group">						
							<h2>Disallow:</h2>
							<input type="text" class="form-control input-lg" id="disallowE" name="disallowE" required>
						</div>
						<div class="form-group">						
							<h2>Allow:</h2>
							<input type="text" class="form-control input-lg" id="allowE" name="allowE" required>
						</div>
						<div class="form-group">						
							<h2>Musiconhold:</h2>
							<input type="text" class="form-control input-lg" id="musiconholdE" name="musiconholdE" required>
						</div>
						<div class="form-group">						
							<h2>Regseconds:</h2>
							<input type="text" class="form-control input-lg" id="regsecondsE" name="regsecondsE" required>
						</div>						
						<div class="form-group">						
							<h2>IPaddr:</h2>
							<input type="text" class="form-control input-lg" id="ipaddrE" name="ipaddrE" required>
						</div>
						<div class="form-group">						
							<h2>Cancallforward:</h2>
							<input type="text" class="form-control input-lg" id="cancallforwardE" name="cancallforwardE" required>
						</div>
						<div class="form-group">						
							<h2>Lastms:</h2>
							<input type="text" class="form-control input-lg" id="lastmsE" name="lastmsE" required>
						</div>
						<div class="form-group">						
							<h2>Useragent:</h2>
							<input type="text" class="form-control input-lg" id="useragentE" name="useragentE" required>
						</div>
						<div class="form-group">						
							<h2>Regserver:</h2>
							<input type="text" class="form-control input-lg" id="regserverE" name="regserverE" required>
						</div>
						<div class="form-group">						
							<h2>Callbackextension:</h2>
							<input type="text" class="form-control input-lg" id="callbackextensionE" name="callbackextensionE" required>
						</div>
						<div class="form-group">						
							<h2>Address :</h2>
							<input type="text" class="form-control input-lg" id="addressE" name="addressE" required>
						</div>		
				</div>
				<div class="modal-footer">					
					<button type="submit" class="btn btn-success">Guardar Cambios</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
				<?php
					$actualizar = new UsersC();
					$actualizar -> actualizarUserC();
				?>
			</form>
		</div>
	</div>
</div>

<?php
	$borrarD = new UsersC();
	$borrarD -> borrarUserC();
