<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/ticket_purchase.css">
    <title>Verificador</title>
</head>
<body>
    <header></header>
    <main>
        <section class="verificacion">
            <form action="paginaBusqueda.php" method="POST">
                <label>Introduce tu Boleto o Celular y haz CLICK en verificar</label>
                <div>
                    <input type="text" name="verificarBoleto" id="verificarBoleto" placeholder="Boleto" onkeypress="return soloNumeros(event)" maxlength="5">
                    <input type="submit" value="Verificar">
                </div>
                <div>
                    <input type="text" name="verificarWhatsapp" id="verificarWhatsapp" placeholder="Whatsapp" onkeypress="return soloNumeros(event)" maxlength="10">
                    <input type="submit" value="Verificar">
                </div>
            </form>
            <?php 
                require("conexion.php");
                $conexion = mysqli_connect($db_hostname,$db_user,$db_password,$db_name);
                if(mysqli_connect_errno()){
                    echo "FALLO AL CONECTAR LA BASE DE DATOS";
                    exit();
                }
                mysqli_select_db($conexion,$db_name) or die("NO SE ENCUENTRA LA BASE DE DATOS");
                mysqli_set_charset($conexion,"utf8");


                if(isset($_POST["verificarBoleto"])){
                $boleto = $_POST["verificarBoleto"];
                
                //creamos la sentencia sql
                $sql = "SELECT numero_boleto, nombre, apellido, estado, pagado FROM informacion_clientes WHERE numero_boleto=?";
                //preparamos la consulta
                $resSql = mysqli_prepare($conexion,$sql);
                $ok = mysqli_stmt_bind_param($resSql,"s",$boleto);
                $ok = mysqli_stmt_execute($resSql);
                $ok = mysqli_stmt_bind_result($resSql,$codigo,$nombre,$apellido,$estado,$pagado);
                echo "<br>";
                
                while(mysqli_stmt_fetch($resSql)){
                    echo " <table class='tabla'>
                                <tr class='titulo'>
                                    <th>Numero</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Estado</th>
                                    <th>Pagado</th>
                                </tr>
                                <tr class='sub-titulo'>
                                    <th>$codigo</th>
                                    <th>$nombre</th>
                                    <th>$apellido</th>
                                    <th>$estado</th>
                                    <th>$pagado</th>
                                </tr>
                            </table>";
                }
                mysqli_stmt_close($resSql);
                }
                if(isset($_POST["verificarWhatsapp"])){
                    $whatsapp = $_POST["verificarWhatsapp"];
                
                    //creamos la sentencia sql
                    $sql = "SELECT numero_boleto, nombre, apellido, estado, pagado FROM informacion_clientes WHERE celular=?";
                    //preparamos la consulta
                    $resSql = mysqli_prepare($conexion,$sql);
                    $ok = mysqli_stmt_bind_param($resSql,"s",$whatsapp);
                    $ok = mysqli_stmt_execute($resSql);
                    $ok = mysqli_stmt_bind_result($resSql,$codigo,$nombre,$apellido,$estado,$pagado);
                    echo "<br>";
                    
                    while(mysqli_stmt_fetch($resSql)){
                        echo " <table class='tabla'>
                                    <tr class='titulo'>
                                        <th>Numero</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Estado</th>
                                        <th>Pagado</th>
                                    </tr>
                                    <tr class='sub-titulo'>
                                        <th>$codigo</th>
                                        <th>$nombre</th>
                                        <th>$apellido</th>
                                        <th>$estado</th>
                                        <th>$pagado</th>
                                    </tr>
                                </table>";
                    }
                    mysqli_stmt_close($resSql);
                }
            ?>
        </section>
        <div class="infoBox">
            <section class="inf_pago">
                <label class="titule_infoPago">Informacion De Pago</label>
                <label class="sub-titule_infoPago">Debes realizar el pago por alguna de éstas opciones y enviar tu comprobante de pago al</label>
                <a href="https://api.whatsapp.com/send?phone=5216141921472&text=Hola%20Bienvenido%20a%20Rifas%20El%20Progreso"></a>
                <div class="infoPagoBox">
                    <label class="label--blue">EXCLUSIVO TRANFERENCIAS Y CAJERO</label>
                    <label class="label--black">EN CONCEPTO DE PAGO: TU NOMBRE</label>
                    <div class="infoBancos">
                        <label class="label--mediumblue">BANCO: <div class="bbva"></div></label>
                        <label class="label--mediumblue">NOMBRE: <span class="label--blackk">JUAN PEREZ</span></label>
                        <label class="label--mediumblue">NUMERO DE TARJETA: <span class="cuentasNum">123456789</span></label>
                    </div>
                    <div class="infoBancos">
                        <label class="label--red">BANCO: <div class="hsbc"></div></label>
                        <label class="label--red">NOMBRE: <span class="label--blackk">JUAN PEREZ<span></label>
                        <label class="label--red">NUMERO DE TARJETA: <span class="cuentasNum">123456789</span></label>
                    </div>
                    <div class="infoBancos">
                        <label class="label--green">BANCO: <div class="citi"></div></label>
                        <label class="label--green">NOMBRE: <span class="label--blackk">JUAN PEREZ<span></label>
                        <label class="label--green">NUMERO DE TARJETA: <span class="cuentasNum">123456789</span></label>
                    </div>
                </div>
                <div class="infoPagoBox">
                    <label class="label--blue">EN CONCEPTO DE PAGO: TU NOMBRE</label>
                    <div class="infoBancos">
                        <label class="label--mediumblue">BANCO: <div class="bbva"></div> </label>
                        <label class="label--mediumblue">NOMBRE DE TARJETA: <span class="cuentasNum">123456789</span></label>
                    </div>
                    <div class="infoBancos">
                        <label class="label--red">BANCO: <div class="hsbc"></div> </label>
                        <label class="label--red">NOMBRE DE TARJETA: <span class="cuentasNum">123456789</span></label>
                    </div>
                </div>
                <label class="label--boton">SI ALGUNA CUENTA APARECE SATURADA POR FAVOR INTENTA CON OTRA</label>
            </section>
            <section class="generaTuBoleto" id="generaTuBoleto">
                <label class="titule_infoPago"> Genera Tu Boleta</label>
                <label class="sub-titule_infoPago"> Introduce Tu Numero De Boleto y Haz Click En "Generar"</label>
                <form action="paginaBusqueda.php" method="POST" class="fornGeneraTuBoleto">
                    <input type="text" name="Generar_boleto" placeholder="Boleto" onkeypress="return soloNumeros(event)" maxlength="5">
                    <input type="submit" value="Generar" id="generarBoleto">
                </form> 
                <?php
                    
                    require("conexion.php");
                    $conexion = mysqli_connect($db_hostname,$db_user,$db_password,$db_name);
                    if(mysqli_connect_errno()){
                        echo "FALLO AL CONECTAR LA BASE DE DATOS";
                        exit();
                    }
                    mysqli_select_db($conexion,$db_name) or die("NO SE ENCUENTRA LA BASE DE DATOS");
                    mysqli_set_charset($conexion,"utf8");
    
    
                    if(isset($_POST["Generar_boleto"])){
                    $boleto = $_POST["Generar_boleto"];

                    //creamos la sentencia sql
                    $sql = "SELECT numero_boleto, nombre, apellido, estado, pagado,fecha_pagado FROM informacion_clientes WHERE numero_boleto=?";
                    //preparamos la consulta
                    $resSql = mysqli_prepare($conexion,$sql);
                    $ok = mysqli_stmt_bind_param($resSql,"s",$boleto);
                    $ok = mysqli_stmt_execute($resSql);
                    $ok = mysqli_stmt_bind_result($resSql,$codigo,$nombre,$apellido,$estado,$pagado,$date);
                    echo "<br>";
                    
                    while(mysqli_stmt_fetch($resSql)){
                        echo"<div class='divImg'>
                                 <div class='logoImg'></div>
                                 <label>Rifas El Progreso</label>
                             </div>
                                <label class='generaLabel'>Boleto: <span>$codigo</span></label>
                                <label class='generaLabel'>Sorteo: <span>$100,000</span></label>
                                <label class='generaLabel'>Nombre: <span>$nombre</span></label>
                                <label class='generaLabel'>Apellido: <span>$apellido</span></label>
                                <label class='generaLabel'>Estado: <span>$estado</span></label>
                                <label class='generaLabel'>Pagado: <span>$pagado</span></label>
                                <label class='generaLabel'>Compra: <span>$date</span></label>
                                <div class='fondoIng'></div>";
                    }
                }
                ?>
            </section>
        </div>
    </main>
    <div id="image-container"></div>
    <div class="cover"></div>
    <script src="../js/solamenteNumeros.js"></script>
    <script src="../js/imagen.js"></script>
</body>
</html>