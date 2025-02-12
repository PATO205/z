<?php
include 'conexion.php';

$nc=$_POST['nc'];
$nom=$_POST['nom'];


$validar=mysqli_query($conexion, "SELECT * FROM alumnos WHERE nc='$nc' AND nombre ='$nom'");

if(mysqli_num_rows($validar)>0){
    header("location:m2.html");
    exit();
}else{
    echo '
<script>
alert("alerta intruso");
window.location="01.html";
</script>';
}
exit();
?>