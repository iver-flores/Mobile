$(".GT").on("click", ".deleteGuard", function(){

	var Gid = $(this).attr("Gid");
	var imgG = $(this).attr("imgG");

	window.location = "index.php?url=guards&Gid="+Gid+"&imgG="+imgG;

})