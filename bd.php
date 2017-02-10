<?php
$busqueda=$_GET['search'];

    if(is_numeric($busqueda)) {
        $sql = "SELECT floor, building, side, name, classificationini, classificationfin FROM location where $busqueda between classificationini and classificationfin";
    } else {
        $sql = "SELECT floor, building, side, name, classificationini, classificationfin FROM location where name like '%$busqueda%'";
    }



function connectDB(){

        $server = "172.17.32.100";
        $user = "catalogo";
        $pass = "Catalogo$2016";
        $bd = "catalogo";

    $conexion = mysqli_connect($server, $user, $pass,$bd);
/*
        if($conexion){
            echo 'La conexion de la base de datos se ha hecho satisfactoriamente
';
        }else{
            echo 'Ha sucedido un error inexperado en la conexion de la base de datos
';
        }
*/
    return $conexion;
}

function disconnectDB($conexion){

    $close = mysqli_close($conexion);
/*
        if($close){
            echo 'La desconexion de la base de datos se ha hecho satisfactoriamente
';
        }else{
            echo 'Ha sucedido un error inexperado en la desconexion de la base de datos
';
        }   
*/
    return $close;
}

function getArraySQL($sql){
    //Creamos la conexión con la función anterior
    $conexion = connectDB();

    //generamos la consulta

        mysqli_set_charset($conexion,'utf8'); //formato de datos utf8

    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa

    $rawdata = array(); //creamos un array

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;

    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;

        $nombre=$row['name'];
        print "<br/>Colección: ".$nombre."<br/>";

        $piso=$row['floor'];
        print "<br/>Piso: ".$piso."<br/>";

        $edificio=$row['building'];
        print "<br/>Edificio: ".$edificio."<br/>";

        $lado=$row['side'];
        print "<br/>Lado: ".$lado."<br/>";
    }

    disconnectDB($conexion); //desconectamos la base de datos

    return $rawdata; //devolvemos el array
}

        $myArray = getArraySQL($sql);
        echo json_encode($myArray); 
?>