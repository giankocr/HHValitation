<?php
/**
 * Created by gianko.com.
 * User: ILG
 * Date: 03/08/2018
 */



$conn = require_once 'conn/connection.php';
$sql = "SELECT * FROM VALIDACION_SERIES_MASTERBOX";
$result = sqlsrv_query($conn, $sql);
while ($row = sqlsrv_fetch_array($result)) {
     echo $row['FECHA'].' '.$row['IDSUCURSAL'].' '. $row['IDSERIE']. '<br>';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Despacho Camión</title>
</head>
<body>
<form action="conn/action.php" method="post">
    <input type="date" name="fecha" id="fecha" size="40" autofocus><br>
    <input type="text" name="sucursal" maxlength="4" minlength="4" id="sucursal" size="40"><br>
    <input type="text" name="masterbox" maxlength="10" minlength="10" id="masterbox" size="40"><br>
    <input type="number" id="count"  disabled />
    </form>
</body>
</html>

<script>
var inputfecha = document.getElementById("fecha");
var inputsucursal = document.getElementById("sucursal");
var inputmasterbox = document.getElementById("masterbox");

inputfecha.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("sucursal").select();
    }
});

inputsucursal.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("masterbox").select();
    }
});

inputmasterbox.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        let count = parseInt(document.getElementById('count').value);
        count = count++;
        console.log(count);
        document.getElementById("count").value = count;
        document.getElementById("masterbox").value = '';
        document.getElementById("masterbox").select();
    }
});
</script>