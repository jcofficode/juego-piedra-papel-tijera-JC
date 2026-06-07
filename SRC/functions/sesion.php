
<?php
function Crear_Sesion($username){
    session_start();
    $_SESSION['username'] = $username; //Definiendo Variables de sesión
    $_SESSION['NumeroPartidas']=0;
    $_SESSION['Ganador']=0;
    $_SESSION['Perdedor']=0;
    $_SESSION['Empate']=0;
    
    echo ('<p>El usuario y contrasena desde crear sesion</p>');

    header('Location: ./SRC/Views/Inicio_Sesion.php');//Redirige a al archivo Inicio Sesion

    return exit(); //detiene todo, lo q exista abajo no se ejecutara 
}

function Validar_Sesion (){
    

    if(!isset($_SESSION['username'])){
        echo('<p>NO AUTORIZADO</p>');
        return exit();
    }
}

function Destruir_sesion(){ //Funcion para destruir la sesión (Borra todos los cokkies y  basura)
   
    $_SESSION=array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    unset($_SESSION['NumeroPartidas']);
    unset($_SESSION['username']);
    session_destroy();

    header('Location: ../../login.php'); //Redirige al archivo login.
    return exit();
}

?>
