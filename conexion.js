<form align="right">
	<input type="search" placeholder="Buscar" action="">
 
       
       $(document).ready(function()
 {
 var url="http://localhost/pruebas/json.php";
 $.getJSON(url,function(result){
 console.log(result);
 $.each(result,function(i, field){
 var floor=piso.floor;
 var bulding=edificio.building;
 var side=lado.side;
 var collection=coleccion.collection;
 $("#listview").append("<a class='item' href='http://localhost/pruebas/json.php'><span class='item-note'>$"+collection+"</span><h2>"+ floor + " </h2><p>"+ side +"</p></a>");

    </form>