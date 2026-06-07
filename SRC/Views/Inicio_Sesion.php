<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include('../functions/sesion.php');
Validar_Sesion();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="shortcut icon" href="../img/liderazgo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Piedra Papel Tijera Lagarto Spock</title>
</head>

<body>
    

    <div class="inicio">
    <?php
    //Proceso
     echo '<div class="bienvenida">Bienvenido(a), '. $_SESSION['nombre_Usuario'].'<img src="../img/grupo.png" alt="bienvenida"></div>';
    ?>
    <form action="" method="get" class="form-inicio">
        <a class="misInstrucciones" href="../Views/video.php">Instrucciones <img src="../img/instruccion.png" alt="salida" ></a> <!--Redirige al archivo instrucciones donde se explica el juego -->
    <button class="ordenar" id="ordenar" name="ordenar" type="submit">Ranking <img src="../img/ganador.png" alt=""></button><!--Muestra el ranking o el orden de las partidas gandas de cada usuario-->
    <a href="../Views/Cerrar_sesion.php" class="cerrar">Salir <img src="../img/salida.png" alt="salida" > </a><!--Cierra la sesión-->
    </form>
   
    </div>
    <main>
        <section>
            <article>

            <?php
function pintaTabla($primeraImagen,$segundaImagen,$texto1,$texto2,$resultado,$imagenGanoPerdio,$clase){//Esta función crea una tabla para mostrar la elleción del usuario y la máquina.
    $tabla='<table class="imprimirObjetos">
    <tr><th><h1>Tú elegiste</h1></th><th><h1>La máquina eligió</h1></th><th><h1>Resultado</h1></th><th><h1>Estatus</h1></th></tr>
    <tr>
    <td><h2>'.$texto1.'</h2><img src='.$primeraImagen.'></td><td><h2>'.$texto2.'</h2><img src='.$segundaImagen.'></td><td><h2 class='.$clase.' espacial>'.$resultado.'</h2></td><td><img class='.$clase.' src='.$imagenGanoPerdio.'></td>
    </tr>
    </table>
    ';
    return $tabla;
}



function piedra($persona, $pc) { //Función donde el usuario elige piedra y la máquina hace una elección random
    $_SESSION['NumeroPartidas']++;
    $persona=1;
    
    
    if ($persona == 1 && $pc == 2) {
      
      echo pintaTabla("../img/piedra.png","../img/papel.png","Piedra","Papel","Perdiste","../img/perdedores.gif","perdedor");
      
        $_SESSION['Perdedor']++;
    } elseif ($persona == 1 && $pc == 3) {
      
      echo pintaTabla("../img/piedra.png","../img/tijera.png","Piedra","Tijera","Ganaste","../img/ganador.gif","ganador");
    
        $_SESSION['Ganador']++;
    } elseif ($persona == 1 && $pc == 4) {
     
      echo pintaTabla("../img/piedra.png","../img/lagarto-off.png","Piedra","Lagarto","Ganaste","../img/ganador.gif","ganador");
        
        $_SESSION['Ganador']++;
    } elseif ($persona == 1 && $pc == 5) {
      
      echo pintaTabla("../img/piedra.png","../img/spock-off.png","Piedra","Spock","Perdiste","../img/perdedores.gif","perdedor");
 
        $_SESSION['Perdedor']++;
    } else {
       
        echo '<img src="../img/apreton-de-manos.gif" class="empate" alt="empate">';
        echo '<h1>Empate</h1>';
        echo '<img src="../img/spock-sheldon.jpg" class="empate" alt="empate">';
        $_SESSION['Empate']++;
    }

}

function papel($persona, $pc) { //Función donde el usuario elige papel y la máquina hace una elección random
    $_SESSION['NumeroPartidas']++;
    $persona=2;
    
    if ($persona == 2 && $pc == 1) {
        echo pintaTabla("../img/papel.png","../img/piedra.png","Papel","Piedra","Ganaste","../img/ganador.gif","ganador");
        
        $_SESSION['Ganador']++;
    } elseif ($persona == 2 && $pc == 3) {
        echo pintaTabla("../img/papel.png","../img/tijera.png","Papel","Tijera","Perdiste","../img/perdedores.gif","perdedor");
       
        $_SESSION['Perdedor']++;
    } elseif ($persona == 2 && $pc == 4) {
        echo pintaTabla("../img/papel.png","../img/lagarto-off.png","Papel","Lagarto","Perdiste","../img/perdedores.gif","perdedor");
      
        $_SESSION['Perdedor']++;
    } elseif ($persona == 2 && $pc == 5) {
        echo pintaTabla("../img/papel.png","../img/spock-off.png","Papel","Spock","Ganaste","../img/ganador.gif","ganador");
    
        $_SESSION['Ganador']++;
    } else {
       
        echo '<img src="../img/apreton-de-manos.gif" class="empate" alt="empate">';
        echo '<h1>Empate</h1>';
        echo '<img src="../img/spock-sheldon.jpg" class="ganador" alt="ganador">';
        $_SESSION['Empate']++;
    }
    
}


function tijera($persona, $pc) { //Función donde el usuario elige tijera y la máquina hace una elección random
    $_SESSION['NumeroPartidas']++;
    $persona=3;
    
    if ($persona == 3 && $pc == 1) {
        echo pintaTabla("../img/tijera.png","../img/piedra.png","Tijera","Piedra","Perdiste","../img/perdedores.gif","perdedor");
    
        $_SESSION['Perdedor']++;
    } elseif ($persona == 3 && $pc == 2) {
        echo pintaTabla("../img/tijera.png","../img/papel.png","Tijera","Papel","Ganaste","../img/ganador.gif","ganador");
     
        $_SESSION['Ganador']++;
    } elseif ($persona == 3 && $pc == 4) {
        echo pintaTabla("../img/tijera.png","../img/lagarto-off.png","Tijera","Lagarto","Ganaste","../img/ganador.gif","ganador");
     
        $_SESSION['Ganador']++;
    } elseif ($persona == 3 && $pc == 5) {
        echo pintaTabla("../img/tijera.png","../img/spock-off.png","Tijera","Spock","Perdiste","../img/perdedores.gif","perdedor");
      
        $_SESSION['Perdedor']++;
    } else {
        echo '<img src="../img/apreton-de-manos.gif" class="empate" alt="empate">';
        echo '<h1>Empate</h1>';
        echo '<img src="../img/spock-sheldon.jpg" class="ganador" alt="ganador">';
    
        $_SESSION['Empate']++;
    }
   
}

function lagarto($persona, $pc) { //Función donde el usuario elige lagarto y la máquina hace una elección random
    $_SESSION['NumeroPartidas']++;
    $persona=4;
   
    if ($persona == 4 && $pc == 1) {
        echo pintaTabla("../img/lagarto-off.png","../img/piedra.png","Lagarto","Piedra","Perdiste","../img/perdedores.gif","perdedor");
      
        $_SESSION['Perdedor']++;
    } elseif ($persona == 4 && $pc == 2) {
        echo pintaTabla("../img/lagarto-off.png","../img/papel.png","Lagarto","Papel","Ganaste","../img/ganador.gif","ganador");
     
        $_SESSION['Ganador']++;
    } elseif ($persona == 4 && $pc == 3) {
        echo pintaTabla("../img/lagarto-off.png","../img/tijera.png","Lagarto","Tijera","Perdiste","../img/perdedores.gif","perdedor");
        
        $_SESSION['Perdedor']++;
    } elseif ($persona == 4 && $pc == 5) {
        echo pintaTabla("../img/lagarto-off.png","../img/spock-off.png","Lagarto","Spock","Ganaste","../img/ganador.gif","ganador");
     
        $_SESSION['Ganador']++;
    } else {
        echo '<img src="../img/apreton-de-manos.gif" class="empate" alt="empate">';
        echo '<h1>Empate</h1>';
        echo '<img src="../img/spock-sheldon.jpg" class="ganador" alt="ganador">';
      
        $_SESSION['Empate']++;
    }
   
}

function spock($persona, $pc) { //Función donde el usuario elige spock y la máquina hace una elección random
    $_SESSION['NumeroPartidas']++;
    $persona=5;
   
    if ($persona == 5 && $pc == 1) {
        echo pintaTabla("../img/spock-off.png","../img/piedra.png","Spock","Piedra","Ganaste","../img/ganador.gif","ganador");
      
        $_SESSION['Ganador']++;
    } elseif ($persona == 5 && $pc == 2) {
        echo pintaTabla("../img/spock-off.png","../img/papel.png","Spock","Papel","Perdiste","../img/perdedores.gif","perdedor");
   
        $_SESSION['Perdedor']++;
    } elseif ($persona == 5 && $pc == 3) {
        echo pintaTabla("../img/spock-off.png","../img/tijera.png","Spock","Tijera","Ganaste","../img/ganador.gif","ganador");
    
        $_SESSION['Ganador']++;
    } elseif ($persona == 5 && $pc == 4) {
        echo pintaTabla("../img/spock-off.png","../img/lagarto-off.png","Spock","Lagarto","Perdiste","../img/perdedores.gif","perdedor");
        
        $_SESSION['Perdedor']++;
    } else {
        echo '<img src="../img/apreton-de-manos.gif" class="empate" alt="empate">';
        echo '<h1>Empate</h1>';
        echo '<img src="../img/spock-sheldon.jpg" class="ganador" alt="ganador">';
        
        $_SESSION['Empate']++;
    }
   
}

function Ordenar(){ //Función Importante: Obtiene los datos del archivo historial  y obtiene el nombre de usuario y las partidas ganadas y finalmente con el método asort ordena todos los datos de manera descendiente los usuarios.
    $fichero = '../ficheros/historial.txt';
                    $contenido = file_get_contents($fichero); // Leer el contenido del archivo
                  
                    $lineas = explode(PHP_EOL, $contenido);
    $usuarios = [];

                
    foreach($lineas as $linea){ //Leer línea por línea del archivo
        if(empty($linea)) continue;
        $user = json_decode($linea, true);
        if ($user === null && json_last_error() !== JSON_ERROR_NONE) {
            continue;
        }
        
        $usuarios[$user['nombre_Usuario']]=$user['P_ganadas'];
    }
    // Ordenar el array de forma decreciente manteniendo la correlación de índices
arsort($usuarios);// Ordena de manera descendiente el arreglo usuarios
echo "<br><br>";
echo "<h1>Ranking</h1>";
echo "<table border='1'>";
echo "<tr><th>Usuario</th><th>Partidas Ganadas</th></tr>";
// Imprimir los usuarios con sus partidas ganadas de forma decreciente
foreach ($usuarios as $usuario => $ganadas) {
    echo "<tr><td>".$usuario . "</td><td>" . $ganadas . "</td></tr>";
}
echo "</table>";
echo "<br>";
echo "<small><strong>Esta tabla se genera con el método de PHP, denominado arsort</strong></small>";
}

//Declaración de variables
$piedra_JC = isset($_GET['piedra']);
$papel_JC = isset($_GET['papel']);
$tijera_JC = isset($_GET['tijera']);
$lagarto_JC = isset($_GET['piedra']);
$spock_JC = isset($_GET['spock']);
$ordenar_JC= isset($_GET['ordenar']);
$pc_JC=random_int(1,5); //Función random que elige entre piedra, papel, tijera, lagarto, spock
$persona_JC=0;


    
?>





                <br><br>
              
                <!--Recibe los datos del usuario y maquina-->
                <form action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF'])); ?>" method="get">
                <button id="piedra" name="piedra" type="submit"><img src="../img/piedra.png" alt="" ><h1>Piedra</h1></button>
              
                <button id="papel" name="papel" type="submit"><img src="../img/papel.png" alt="" ><h1>Papel</h1></button>
                
                <button id="tijera" name="tijera" type="submit"><img src="../img/tijera.png" alt="" ><h1>Tijera</h1></button>
            
                <button id="lagarto" name="lagarto" type="submit"><img src="../img/lagarto-off.png" alt="" ><h1>Lagarto</h1></button>
               
                <button id="spock" name="spock" type="submit"><img src="../img/spock-off.png" alt="" ><h1>Spock</h1></button>
           
                
                </form>
         

                <!-- //Validador de ejecucion  valida los botones piedra papel tijera lagarto spock invocando las diferentes funciones-->
                <?php
                  if (isset($piedra_JC) && isset($pc_JC)) {
    
                    if (isset($_GET['piedra'])) {
                       echo piedra($persona_JC,$pc_JC);
                       guardarResultado();
                    }
                } 
                
                if (isset($papel_JC) && isset($pc_JC)) {
                   
                    if (isset($_GET['papel'])) {
                        echo papel($persona_JC,$pc_JC);
                        guardarResultado();
                    }
                } 
            
                if (isset($tijera_JC) && isset($pc_JC)) {
                   
                    if (isset($_GET['tijera'])) {
                        echo tijera($persona_JC,$pc_JC);
                        guardarResultado();
                    }
                } 
            
                if (isset($lagarto_JC) && isset($pc_JC)) {
                   
                    if (isset($_GET['lagarto'])) {
                        echo lagarto($persona_JC,$pc_JC);
                        guardarResultado();
                    }
                } 
            
                if (isset($spock_JC) && isset($pc_JC)) {
                   
                    if (isset($_GET['spock'])) {
                        echo spock($persona_JC,$pc_JC);
                        guardarResultado();
                    }
                }

                if (isset($ordenar_JC) ) {
                   
                    if (isset($_GET['ordenar'])) {
                        Ordenar();
                    }
                }
                
       
                function guardarResultado(){//Funcion que guarda todas las partidas jugadas por casa usuario
                    $fichero = fopen('../ficheros/historial.txt', "a+");
                $arr = [
                  'nombre_Usuario'=>$_SESSION['username'],  'Nro_Partidas'=>$_SESSION['NumeroPartidas'], 'P_ganadas' =>$_SESSION['Ganador'] , 'Empates' => $_SESSION['Empate'], 'P_Perdidas'=> $_SESSION['Perdedor']
                ];
                fwrite($fichero, json_encode($arr).PHP_EOL);
                fclose($fichero);//Se cierra el fichero
                }
                



                $misregistros=array();
                if (!isset($_SESSION['contenido'])) { // Si el contenido no está en la sesión
                    $fichero = '../ficheros/historial.txt';
                    $contenido = file_get_contents($fichero); // Leer el contenido del archivo
                    $_SESSION['contenido'] = $contenido; // Guarda el contenido en la sesión que se crea
                    $lineas = explode(PHP_EOL, $contenido);
                    echo "<br>";
                    $usuarioHistorial=array();
                    $usuarioHistorialNroPartidas=array();
                    $usuarioHistorialPartidasGanadas=array();
                    $usuarioHistorialEmpates=array();
                    $usuarioHistorialPartidasPerdidas=array();
                    foreach($lineas as $linea){
          
                        if(empty($linea)) continue;
                        $user = json_decode($linea, true);
                        if ($user === null && json_last_error() !== JSON_ERROR_NONE) {
                            continue;
                        }
                        if($user['nombre_Usuario']==$_SESSION['username']){//Declaración de arrays y variables que guardan cada uno de los datos de los usuarios para se mostrados durante el juego
                            $usuarioJugador= $user['nombre_Usuario'];
                            $usuarioNroPartidas =$user['Nro_Partidas'];
                            $usuarioPartidasGanadas= $user['P_ganadas'];
                            $usuarioEmpates= $user['Empates'];
                            $usuarioPartidasPerdidas= $user['P_Perdidas'];
                            $usuarioHistorial[]=$user['nombre_Usuario'];
                            $usuarioHistorialNroPartidas[]=$user['Nro_Partidas'];
                            $usuarioHistorialPartidasGanadas[]=$user['P_ganadas'];
                            $usuarioHistorialEmpates[]=$user['Empates'];
                            $usuarioHistorialPartidasPerdidas[]=$user['P_Perdidas'];
                        }
                        
                            
                    } 
                    if(isset($usuarioNroPartidas) && isset($usuarioPartidasGanadas) && isset($usuarioEmpates) && isset($usuarioPartidasPerdidas)){ //Validación y  declaración de variables de sesión
                        $_SESSION['NumeroPartidas']=$usuarioNroPartidas;
                        $_SESSION['Ganador']=$usuarioPartidasGanadas;
                        $_SESSION['Empate']=$usuarioEmpates;
                        $_SESSION['Perdedor']=$usuarioPartidasPerdidas;
                    }  
         
                    
                    echo "<br><br><br>";
                    echo "<h1>Partida Actual</h1>";
                    echo "<table border='1'>";
                    echo "<tr><th>Partidas</th><th>Ganadas</th><th>Empate</th><th>Perdidas</th></tr>";//Se muestra la partida actual del usuario
                    echo "<tr><td>".$_SESSION['NumeroPartidas']."</td><td>".$_SESSION['Ganador']."</td><td>".$_SESSION['Empate']."</td><td>".$_SESSION['Perdedor']."</td></tr>";
                    echo "</table>";
                    echo "<br>";
                    if(isset($usuarioNroPartidas)){
                        echo "<br><br>";
                    echo "<h1>Mi Historial</h1>";//Se muestra el historial de cada partida que realiza el usuario
                    echo "<table border='1'>";
                    echo "<tr><th>Número de Partidas</th><th>Ganadas</th><th>Empate</th><th>Perdidas</th></tr>";
                        for($i=0;$i<count($usuarioHistorial);$i++){
                            echo "<tr><td>".$usuarioHistorialNroPartidas[$i]."</td><td>".$usuarioHistorialPartidasGanadas[$i]."</td><td>". $usuarioHistorialEmpates[$i]."</td><td>".$usuarioHistorialPartidasPerdidas[$i]."</td></tr>";
                            
                        }
                    echo "</table>";
                       /*********** */



                       /****** */
                    }
                } else {
                    $usuarioHistorialII=array();
                    $usuarioHistorialNroPartidasII=array();
                    $usuarioHistorialPartidasGanadasII=array();
                    $usuarioHistorialEmpatesII=array();
                    $usuarioHistorialPartidasPerdidasII=array();
                    $fichero = '../ficheros/historial.txt';
                    $contenido = file_get_contents($fichero); // Leer el contenido del archivo
                   /* $_SESSION['contenido'] = $contenido; 
                    $contenido = $_SESSION['contenido']; // Obtener el contenido de la sesión*/
                    echo "<br><br><br>";
                    echo "<h1>Partida Actual</h1>";
                   
                    echo "<table border='1'>";
                    echo "<tr><th>Partidas</th><th>Ganadas</th><th>Empate</th><th>Perdidas</th></tr>";
                    echo "<tr><td>".$_SESSION['NumeroPartidas']."</td><td>".$_SESSION['Ganador']."</td><td>".$_SESSION['Empate']."</td><td>".$_SESSION['Perdedor']."</td></tr>";
                    echo "</table>";
                    echo "<br>";

                    //if (isset($usuarioHistorial)) {
                        $lineas = explode(PHP_EOL, $contenido);
                        foreach($lineas as $linea){
          
                            if(empty($linea)) continue;
                            $user = json_decode($linea, true);
                            if ($user === null && json_last_error() !== JSON_ERROR_NONE) {
                                continue;
                            }
                            if($user['nombre_Usuario']==$_SESSION['username']){
                                $usuarioHistorialII[]=$user['nombre_Usuario'];
                                $usuarioHistorialNroPartidasII[]=$user['Nro_Partidas'];
                                $usuarioHistorialPartidasGanadasII[]=$user['P_ganadas'];
                                $usuarioHistorialEmpatesII[]=$user['Empates'];
                                $usuarioHistorialPartidasPerdidasII[]=$user['P_Perdidas'];
                            }
                            
                        }
                        echo "<br><br>";
                        echo "<h1>Mi Historial</h1>";
                        echo "<table border='1'>";
                        echo "<tr><th>Número de Partidas</th><th>Ganadas</th><th>Empate</th><th>Perdidas</th></tr>";
                        for($z=0;$z<count($usuarioHistorialII);$z++){
                            echo "<tr><td>".$usuarioHistorialNroPartidasII[$z]."</td><td>".$usuarioHistorialPartidasGanadasII[$z]."</td><td>". $usuarioHistorialEmpatesII[$z]."</td><td>".$usuarioHistorialPartidasPerdidasII[$z]."</td></tr>";
                        }
                        echo "</table>";
                    
                }
                
               
                
         
              
                ?>
            </article>
        </section>
        <footer style="text-align: center; padding: 20px; background: linear-gradient(to left, #9387d4, rgb(74, 164, 224)); border-top: 1px solid #e9ecef;">
  <p style="margin: 0; color: black;">Elaborado por Jean Coffi. Disfrute del juego</p>
</footer>
    </main>

  
   
   
   
</body>

</html>