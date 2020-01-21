<?php
if(isset($_POST['btn_login'])){
    require_once('global/Conexion.php');
    $email=$_POST['txt_email'];
    $password=$_POST['txt_password'];

    $sentenciaSQL=$pdo->prepare("Select * from usuarios where email=:correo and password=:password");
    $sentenciaSQL->bindParam('correo',$email, PDO::PARAM_STR);
    $sentenciaSQL->bindParam('password',$password, PDO::PARAM_STR);


    $sentenciaSQL->execute();
    $registro=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
    $numero_de_registro=$sentenciaSQL->rowCount();
    
    if($numero_de_registro>=1){
        session_start();
        $_SESSION['usuario']=$registro;
        header('Location:vista_panel.php');
    }else{
        echo 'No se encontraron registros...';
    }

}
?>