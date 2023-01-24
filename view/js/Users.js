$(".UT").on("click", ".viewUser", function(){

	var Vid = $(this).attr("Vid");
	var datosV = new FormData();

	datosV.append("Vid", Vid);

	$.ajax({
		url: "ajax/UsersA.php",
		method: "POST",
		data: datosV,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,

		success: function(resultado){
			$("#Vid").val(resultado["id"]);
			$("#surnameV").val(resultado["surname"]);
			$("#nameV").val(resultado["name"]);
			$("#userV").val(resultado["user"]);
			$("#passwordV").val(resultado["password"]);
			$("#cameraV").val(resultado["id_camera"]);
			$("#doorV").val(resultado["id_door"]);
			$("#roleV").val(resultado["role"]);
			$("#nameConfigV").val(resultado["nameConfig"]);			
			$("#callerIdV").val(resultado["callerid"]);
			$("#defaultuserV").val(resultado["defaultuser"]);
			$("#regextenV").val(resultado["regexten"]);
			$("#secretV").val(resultado["secret"]);
			$("#mailboxV").val(resultado["mailbox"]);
			$("#accountcodeV").val(resultado["accountcode"]);
			$("#contextV").val(resultado["context"]);
			$("#amaflagsV").val(resultado["amaflags"]);
			$("#callgroupV").val(resultado["callgroup"]);
			$("#canreinviteV").val(resultado["canreinvite"]);
			$("#defaultipV").val(resultado["defaultip"]);
			$("#dtmfmodeV").val(resultado["dtmfmode"]);
			$("#fromuserV").val(resultado["fromuser"]);
			$("#fromdomainV").val(resultado["fromdomain"]);
			$("#fullcontactV").val(resultado["fullcontact"]);
			$("#hostV").val(resultado["host"]);
			$("#insecureV").val(resultado["insecure"]);
			$("#languageV").val(resultado["language"]);
			$("#md5secretV").val(resultado["md5secret"]);
			$("#natV").val(resultado["nat"]);
			$("#denyV").val(resultado["deny"]);
			$("#permitV").val(resultado["permit"]);
			$("#maskV").val(resultado["mask"]);
			$("#pickupgroupV").val(resultado["pickupgroup"]);
			$("#portV").val(resultado["port"]);
			$("#qualifyV").val(resultado["qualify"]);
			$("#restrictcidV").val(resultado["restrictcid"]);
			$("#rtptimeoutV").val(resultado["rtptimeout"]);
			$("#rtpholdtimeoutV").val(resultado["rtpholdtimeout"]);
			$("#typeV").val(resultado["type"]);
			$("#disallowV").val(resultado["disallow"]);
			$("#allowV").val(resultado["allow"]);
			$("#musiconholdV").val(resultado["musiconhold"]);
			$("#regsecondsV").val(resultado["regseconds"]);
			$("#ipaddrV").val(resultado["ipaddr"]);
			$("#cancallforwardV").val(resultado["cancallforward"]);
			$("#lastmsV").val(resultado["lastms"]);
			$("#useragentV").val(resultado["useragent"]);
			$("#regserverV").val(resultado["regserver"]);
			$("#callbackextensionV").val(resultado["callbackextension"]);
			$("#addressV").val(resultado["address"]);			
		} 
	})
})

$(".UT").on("click", ".editUser", function(){

	var Uid = $(this).attr("Uid");
	var datosU = new FormData();

	datosU.append("Uid", Uid);

	$.ajax({
		url: "ajax/UsersA.php",
		method: "POST",
		data: datosU,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,

		success: function(resultado){
			$("#Uid").val(resultado["id"]);
			$("#surnameE").val(resultado["surname"]);
			$("#nameE").val(resultado["name"]);
			$("#userE").val(resultado["user"]);
			$("#passwordE").val(resultado["password"]);
			$("#cameraE").val(resultado["id_camera"]);
			$("#doorE").val(resultado["id_door"]);
			$("#roleE").val(resultado["role"]);
			$("#nameConfigE").val(resultado["nameConfig"]);			
			$("#callerIdE").val(resultado["callerid"]);
			$("#defaultuserE").val(resultado["defaultuser"]);
			$("#regextenE").val(resultado["regexten"]);
			$("#secretE").val(resultado["secret"]);
			$("#mailboxE").val(resultado["mailbox"]);
			$("#accountcodeE").val(resultado["accountcode"]);
			$("#contextE").val(resultado["context"]);
			$("#amaflagsE").val(resultado["amaflags"]);
			$("#callgroupE").val(resultado["callgroup"]);
			$("#canreinviteE").val(resultado["canreinvite"]);
			$("#defaultipE").val(resultado["defaultip"]);
			$("#dtmfmodeE").val(resultado["dtmfmode"]);
			$("#fromuserE").val(resultado["fromuser"]);
			$("#fromdomainE").val(resultado["fromdomain"]);
			$("#fullcontactE").val(resultado["fullcontact"]);
			$("#hostE").val(resultado["host"]);
			$("#insecureE").val(resultado["insecure"]);
			$("#languageE").val(resultado["language"]);
			$("#md5secretE").val(resultado["md5secret"]);
			$("#natE").val(resultado["nat"]);
			$("#denyE").val(resultado["deny"]);
			$("#permitE").val(resultado["permit"]);
			$("#maskE").val(resultado["mask"]);
			$("#pickupgroupE").val(resultado["pickupgroup"]);
			$("#portE").val(resultado["port"]);
			$("#qualifyE").val(resultado["qualify"]);
			$("#restrictcidE").val(resultado["restrictcid"]);
			$("#rtptimeoutE").val(resultado["rtptimeout"]);
			$("#rtpholdtimeoutE").val(resultado["rtpholdtimeout"]);
			$("#typeE").val(resultado["type"]);
			$("#disallowE").val(resultado["disallow"]);
			$("#allowE").val(resultado["allow"]);
			$("#musiconholdE").val(resultado["musiconhold"]);
			$("#regsecondsE").val(resultado["regseconds"]);
			$("#ipaddrE").val(resultado["ipaddr"]);
			$("#cancallforwardE").val(resultado["cancallforward"]);
			$("#lastmsE").val(resultado["lastms"]);
			$("#useragentE").val(resultado["useragent"]);
			$("#regserverE").val(resultado["regserver"]);
			$("#callbackextensionE").val(resultado["callbackextension"]);
			$("#addressE").val(resultado["address"]);			
		} 
	})
})

$(".UT").on("click", ".deleteUser", function(){
	var Uid = $(this).attr("Uid");
	var imgU = $(this).attr("imgU");
	window.location = "index.php?url=users&Uid="+Uid+"&imgU="+imgU;
})

$(".UT").DataTable({
	"language": {
		"sSearch": "Buscar:",
		"sEmptyTable": "No hay datos en la Tabla",
		"sZeroRecords": "No se encontraron resultados",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
		"SInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"sLoadingRecords": "Cargando...",
		"sLengthMenu": "Mostrar _MENU_ registros"
	}
})