﻿<?php
$id_func = (int) @$_GET['id_func'];
 
$sql = "delete from usuarios where id_func = '$id_func';"; 

$resultado = mysqli_query($con, $sql)or die(mysqli_error());

if ($resultado) {
    header('Location: ?page=lista_usu&msg=5');
    mysqli_close($con);
}else{
    header('Location: ?page=lista_usu&msg=4');
    mysqli_close($con);
}
?>
