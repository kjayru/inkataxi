<!DOCTYPE html>
<?php

require_once( 'include/core.php' );
sec_session_start();

if ( login_admin() != true ) {

    header('location: login.php');
    return;
}

?>

<html>
    
    <?php
    require_once 'include/headermain.inc.php';
    ?>
    
    <body >

        <div class="bodyAnimate">
              
        
        <div class="topbar">
            
            <table class="table_topbar">
                <tr>
                    <td style="width: 250px"> <h1>Cuantico</h1></td>
                    <td> <h2>Buen dia <?php
                          $username = $_SESSION['nombre'];
                          echo $username;
                         ?> 
                        </h2></td>
                    <td style="width: 150px"><div onclick="logout()" class="divlogout">Cerrar sesión</div></td>
                </tr> 
            </table>  
             
            <div class="bottombar"/></div>

        </div> 

        <script>
            
        function logout() {
            window.location.href = 'login.php?send=logout';
        }
        function goPrincipal() {
            window.location.href = 'principal.php';
        }
        function goActividad() {
            window.location.href = 'notificacion_act.php';
        }
        function goPregunta() {
            window.location.href = 'notificacion_pregunta.php';
        }
        function goMensajes() {
            window.location.href = 'mensajeria.php';
        }

        function infouser(iduser) {
         
            window.location.href = "preguntas.php?id="+iduser;
            
        }
        
        function progresouser(iduser) {
            
            newwindow=window.open("cuestionario.php?id="+iduser);
            if (window.focus) {newwindow.focus()}
            return true;
            
        }
        
        
        </script>

        <div class="menuleft">

            <ul>
                <div class="selec">Principal</div>
                <li onclick="goActividad()" >Notificaciones diarias</li>
                <li onclick="goPregunta()">Notificaciones programadas</li>
                <li onclick="goMensajes()">Mensajeria</li>
            </ul>

        </div>

        <script>
        
            var buttons = document.getElementById('button');

            Array.prototype.forEach.call(buttons, function(b){
                b.addEventListener('click',createRipple);
            });

            function createRipple(e){

                var circle = document.createElement('div');
                this.appendChild(circle);

                var d = Math.max( this.clientWidth, this.clientHeight );

                circle.style.width = circle.style.height = d + 'px';
                
                circle.style.left = e.clientX - this.offsetLeft - d / 2 + 'px';
                circle.style.top = e.clientY - this.offsetTop - d / 2 + 'px';

                circle.classList.add('ripple');

            }    
        </script>

            <div class="workspace">

                    <div class="titulo_seccion">
                        Numero de contactos permitidos
                    </div>

                    <div class="content_seccion2">

                        <div class="divmsg2" >
                            <?php
                                if( isset($_GET['r']) != NULL && $_GET['r'] == "exito" )
                                {
                                    echo '<p style="color:blue;">Mensaje: el numero de contactos se actualizo con exito</p>';
                                }
                                else if( isset($_GET['r']) != NULL && $_GET['r'] == "2" )
                                {
                                    echo '<p style="color:blue;">Mensaje: hubo un error al subir un archivo de audio</p>';
                                }
                                else if( isset($_GET['r']) != NULL && $_GET['r'] == "3" )
                                {
                                    $statusauido = $_GET['e1'];
                                    echo '<p style="color:blue;">Mensaje: hubo un error al subir un archivo de audio, '.$statusauido.' </p>';
                                }
                                else if( isset($_GET['r']) != NULL && $_GET['r'] == "4" )
                                {
                                    $statusvideo = $_GET['e1'];
                                    echo '<p style="color:blue;">Mensaje: hubo un error al subir un archivo de vidoe, '.$statusvideo.' </p>';
                                }
                                else if( isset($_GET['r']) != NULL && $_GET['r'] == "10" )
                                {
                                    echo '<p style="color:blue;">Mensaje: hubo un error, intente mas tarde</p>';
                                }
                                else if( isset($_GET['r']) != NULL && $_GET['r'] == "11" )
                                {
                                    echo '<p style="color:blue;">Mensaje: hubo un error, intente mas tarde</p>';
                                }
                                else
                                {
                                    echo '<p></p>';
                                }
                            ?>
                        </div>
                        
                        
                        <h1>Indique el numero de veces en el que un usuario pueda ponerse en contacto: </h1>
                        <br/>
                        <form method="post" action="listenwork.php">
                        <div class="buscar">
                            <p>Contactos por semana
                                <input name="contactossemanales"  type="number"  step="0.5" size="60" style="height: 42px" value="<?php 

                                    $dbmanager = new DB_Connect();
                                    $mysqli = $dbmanager->connect();

                                    $sql2 = "SELECT numero FROM contactossem LIMIT 1";

                                    $resultado2 = $mysqli->query($sql2);
                                    if($resultado2){
                                        $row2 = $resultado2->fetch_assoc();
                                        if( isset($row2['numero']) ){
                                            echo $row2['numero'];
                                        }
                                        else{
                                            echo 1;
                                        }
                                    }
                                    else{
                                        echo 1;
                                    }
                            
                                ?>"/>
                                <input type="text" hidden="off" name="tag" value="numcont" />
                                <input type="submit" value="Aceptar"></p>
                        </div>
                        </form>
                            
                    </div>
                
                    </br>
                    
                    <div class="titulo_seccion">
                        Usuarios
                    </div>

                    <div class="content_seccion">
                        <h1>Total de usuarios: <?php  
                        
                            $sql = "";
                            $q_f = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS);
                            if( !isset($q_f ) ){
                                $sql = "SELECT * FROM usuario";
                            }else{
                                $sql = "SELECT * FROM usuario WHERE nombre LIKE '%".$q_f."%'";
                            }
                            
                            $resultado = $mysqli->query($sql);
                            
                            if($resultado){
                                echo $resultado->num_rows;
                            }
                            else{
                                echo "error query ".$sql;
                            }
                            
                            $sql0 = "SELECT * FROM retos";
                            $resultado0 = $mysqli->query($sql0);
                            $num_retos = 0;
                            if($resultado0){
                                $num_retos =  $resultado0->num_rows;
                            }
                            else{
                                echo "error query ".$sql;
                            }
                            
                        
                        ?></h1>
                        <form method="post" action="listenlogin.php">
                        <div class="buscar">
                            <p>Buscar usuario cuyo nombre es 
                                <input name="username"  type="text" size="60" style="height: 42px"/>
                                <input type="text" hidden="off" name="tag" value="buser" />
                                <input type="submit" value="Buscar"></p>
                        </div>
                        </form>

                        <div class="content_tabla_usuarios">
                            <table class="tabla_usuarios">
                            <thead>
                                <tr>
                                <th style="width: 80px; align-content: center;">Id</th>
                                <th style="width: 500px;  align-content: center;">Nombre</th>
                                <th style="width: 250px;  align-content: center;">Correo</th>
                                <th style="width: 70px;  align-content: center;">Progreso</th>
                                <th style="width: 105px;  align-content: center;">Informacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php
                                    
                                    $index = 1;
                                    
                                    while ($row = $resultado->fetch_assoc()) {
                                        
                                        $idusuario = "";
                                        if( isset($row['idusuario']) ){
                                            $idusuario = $row['idusuario'];
                                        }
                                        
                                        $nombre = "";
                                        if( isset($row['nombre']) ){
                                            $nombre = $row['nombre'];
                                        }
                                        
                                        $correo = "";
                                        if( isset($row['correo']) ){
                                            $correo = $row['correo'];
                                        }

                                        $sql2 = "SELECT nivel FROM progresouser WHERE idusuario='$idusuario' LIMIT 1";

                                        $resultado2 = $mysqli->query($sql2);
                                        $nivel = 0;
                                        if($resultado2){
                                            $row2 = $resultado2->fetch_assoc();
                                            if( isset($row2['nivel']) ){
                                                $nivel = $row2['nivel'];
                                            }
                                        }
                                        
                                        echo "<tr>\n";
                                        echo "<td align='center'>$index</td>\n";
                                        echo "<td style='padding-left: 25px;'>$nombre</td>\n";
                                        echo "<td align='center'>$correo</td>\n";
                                        echo "<td align='center'>$nivel/$num_retos</td>\n";
                                        echo "<td align='center'><img class='detailUserImg' height='24px' width='17px' src='img/iconlista.png' onclick='infouser(".$idusuario.")'/></td>\n";
                                        //echo "<td align='center'><img class='answerUserImg' height='20px' width='20px' src='img/iconcheck.png' onclick='progresouser(".$idusuario.")'/></td>\n";
                                        echo "</tr>\n";
                                        
                                        $index++;
                                    }
                                    
                                    $dbmanager->close($mysqli);
                                    
                                    ?>
                                    
                            </tbody>
                        </table>

                            
                            

                        </div>

                    </div>


            </div>


        </div>
    </body>
    
</html>