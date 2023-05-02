<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/inputs.css">
    <link rel="stylesheet" href="../css/panelControl.css">
    <title>Panel Control</title>
</head>
<body>
    <header></header>
    <main>
        <div class="box_inputs">
            <form action="panelControl.php">
                <input type="submit" value="Actulizar" class="btn input--green btn--margin">
            </form>
            <form action="panelControl.php" method="POST" class="form">
                <input type="text" name="dato_cambiarPagado" class="input" placeholder="Ingresa N° Boleto" onkeypress="return soloNumeros(event)" maxlength="5">
                <input type="submit" value="Borrar" class="btn input--red">
            </form>
            <?php 
            
            require("conexion.php");
            $conexion = mysqli_connect($db_hostname,$db_user,$db_password,$db_name,$db_port);
            if(mysqli_connect_errno()){
                echo "FALLO AL CONECTAR LA BASE DE DATOS";
                exit();
            }
            mysqli_select_db($conexion,$db_name) or die("NO SE ENCUENTRA LA BASE DE DATOS");
            mysqli_set_charset($conexion,"utf8");
    
    
            if(isset($_POST["dato_cambiarPagado"])){
            $boleto = $_POST["dato_cambiarPagado"];
            $query_info = "DELETE FROM informacion_clientes WHERE numero_boleto='$boleto'";
            $result = mysqli_query($conexion,$query_info);  
            if ($result === false) {
                echo "error al borrar";
            }
                else {
                    echo "se borro correctamente";
                }
            }
            
            ?>
            <form action="panelControl.php" class="form" method="POST">
                <input type="text" name="cambiar_pagado" id="" class="input" placeholder="Ingresa N° Boleto" onkeypress="return soloNumeros(event)" maxlength="5">
                <input type="submit" value="Cambiar" class="btn">
            </form>
            <?php 
            require("conexion.php");
            $conexion = mysqli_connect($db_hostname,$db_user,$db_password,$db_name,$db_port);
            if(mysqli_connect_errno()){
                echo "FALLO AL CONECTAR LA BASE DE DATOS";
                exit();
            }
            mysqli_select_db($conexion,$db_name) or die("NO SE ENCUENTRA LA BASE DE DATOS");
            mysqli_set_charset($conexion,"utf8");

            if(isset($_POST["cambiar_pagado"])){
                $fecha_pago = date("d-m-Y H:i:s");
                $boleto = $_POST["cambiar_pagado"];
                $query_info = "UPDATE informacion_clientes SET pagado='Si', fecha_pagado='$fecha_pago' WHERE numero_boleto='$boleto'";
                $result = mysqli_query($conexion,$query_info);  
                if ($result === false) {
                    echo "error al borrar";
                }
            }
            

            ?>
        </div>
        <?php 
                echo " <table class='tabla'>
                <tr class='titulo'>
                    <th class='first'>Numero</th>
                    <th class='first'>Pagado</th>
                    <th class='first'>Nombre</th>
                    <th class='first'>Apellido</th>
                    <th class='first'>Telefono</th>
                    <th class='fifth'>Estado</th>
                    <th class='first'>Fecha De Apartado</th>
                    <th class='first'>Fecha De Pago</th>
                </tr>";
        require("conexion.php");
        $conexion = mysqli_connect($db_hostname,$db_user,$db_password,$db_name,$db_port);
        $sql = "SELECT * FROM informacion_clientes";
        $resSql = mysqli_query($conexion,$sql);
        echo "<br>";
        while($fila=mysqli_fetch_row($resSql)){
            echo " <table class='tabla'>
                        <tr class='sub-titulo'>
                            <th class='first'>$fila[1]</th>
                            <th class='first'>$fila[2]</th>
                            <th class='first'>$fila[3]</th>
                            <th class='first'>$fila[4]</th>
                            <th class='first'>$fila[5]</th>
                            <th class='first'>$fila[6]</th>
                            <th class='first'>$fila[7]</th>
                            <th class='first'>$fila[8]</th>
                        </tr>
                    </table>";
        }
    ?>
    </main>
    <script src="../js/solamenteNumeros.js"></script>
</body>
</html>