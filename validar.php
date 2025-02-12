<?php
include 'conexion.php';

$u=$_POST['user'];
$c=$_POST['contra'];


$validar=mysqli_query($conexion, "SELECT * FROM admins WHERE usuario='$u' AND contrasena ='$c'");

if(mysqli_num_rows($validar)>0){
    header("location:m1.php");
    exit();
}else{
    echo '
<script>
alert("alerta intruso");
window.location="inicio.php";
</script>';
}
exit();
?>