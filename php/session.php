<?php 
/*try {
    require("conexion.php");
    $base = new PDO("mysql:host=localhost; dbname=rifaselprogreso",$db_user,$db_password);
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT * FROM usuarios_pass WHERE usuarios=:login AND password=:password";
    $resultado = $base->prepare($sql);
    $login = htmlentities(addslashes($_POST["UserPerson"]));
    $password = htmlentities(addslashes($_POST["UserPassWord"]));
    $resultado->bindValue(":login", $login);
    $resultado->bindValue(":password", $password);
    $resultado->execute();
    $numero_registro = $resultado->rowCount();
    if ($numero_registro!=0) {
        echo "vamos bien Perra";
    }else{
        header("location:login.php");
    }
    

} catch (exception $th) {
    die("Error:" . $th->getMessage());
}*/
require("conexion.php");
$conexion = mysqli_connect($db_hostname,$db_user,$db_password,$db_name);
if(mysqli_connect_errno()){
    echo "FALLO AL CONECTAR LA BASE DE DATOS";
    exit();
}
mysqli_select_db($conexion,$db_name) or die("NO SE ENCUENTRA LA BASE DE DATOS");
mysqli_set_charset($conexion,"utf8");

$userN = $_POST["UserPerson"];
$passW = $_POST["UserPassWord"];
$sql = "SELECT * FROM usuarios_pass";
$result = mysqli_query($conexion,$sql);
$fila = mysqli_fetch_row($result);

if ($fila[1]===$userN) {
    
    if ($fila[2]===$passW) {
    
        header("location:panelControl.php");

    }else {
        header("location:login.php");
        echo "contraseña Incorrecta";
    }

}else {
    header("location:login.php");
    echo "usuario Incorrecta";
}

?>