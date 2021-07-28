<?php
include("db.php");
if(isset($_POST['save_task'])){
    $tipo_pregunta = $_POST['tipo_preg'];
    $pregunta_anterior=$_POST['preg_anterior'];
    $descripcion = $_POST['descripcion'];
    $query= "INSERT INTO cuadro_pregunta(tipo_preg,preg_anterior,descripcion) VALUES ('$tipo_pregunta','$pregunta_anterior','$descripcion')";
    $result=mysqli_query($conn,$query) or  die(mysqli_error($conn));
    // var_dump($result);
    if(!$result){
        die("se murio");
    }
    $_SESSION['message']= "se guardo el cuadro";
    $_SESSION['message_type']= "success";

    
    header("location: index.php");

}
   
?>