<?php 
session_start();
include('sesion.php');

function Datos_login(string $username, string $password, string $correo ,string $nombre,string $apellido,string $telefono,  $name)
{
    //echo(' <p class="error"> estoy fuera </p> ');
    $error = "";
    if (!empty($username) && !empty($password)){
    $username = trim($username);
    $username = htmlspecialchars($username);
    $username= stripslashes($username);
    $password = trim($password);
    $password = htmlspecialchars($password);
    $password= stripslashes($password);
    
    // EXPRESIONES REGULARES
        //preg_match — Realiza una comparación con una expresión regular
       if( !preg_match("/^[a-zA-Z0-9]{2,10}$/", $username)&& !preg_match("/^[a-zA-Z0-9-@.-_]{6}$/", $password)){

       echo(' <p class="error"> el usuario y la contraseña no coinciden');
    }else{
       //Sino se crea la cuenta
        if($name == isset($_GET['registrar'])){
            return $resultado = Registrar_Login($username, $password, $correo, $nombre, $apellido, $telefono);
        }else{
           echo 'No se ha podido crear la cuenta';
        }
        

        }
    }
}


function Iniciar_Sesion($username, $password)
{
    $ocurre=false;
    
    if (!empty($username) && !empty($password)){
        

    $fileContent = file_get_contents("./SRC/ficheros/datos_obtenidos.txt"); //Lee el contenido del archivo para verificar si el usuario existe o no
    $lineas = explode(PHP_EOL, $fileContent);

    foreach($lineas as $line){ //Lee línea por línea
        if(empty($line)){
            continue;
        }
        $user = json_decode($line, true);
        if($user['username'] == $username && $user['password'] == $password){
            $ocurre=true;
           
            $_SESSION['nombre_Usuario']=$user['nombre'];
             return Crear_Sesion($username); //Si existe el usuario entra en la sesión
         }
    }
    if($ocurre==false){//De lo contrario se le deniega el acceso al usuario y se le muestre el siguiente mensaje.
        echo ('
        <h3>El usuario y contraseña no existen</h3> 
       ');
    }
    
    
    
    }
    
}


function Registrar_Login($username, $password, $correo, $nombre,  $apellido, $telefono  )
{
    #paso 2 validar si el usuario ya existe
    if(Validar_Usuario($username)){ //Verifica si los datos ingresados existen
        echo "<h5>EL USUARIO YA EXISTE</h5>"; //Sino se muestra el siguiente mensaje y se deniega la creación de los datos ingresados
        return;
    }

    //De lo contrario crea un archivo y gurda todos los datos del usuario, en dicho archivo
    $fichero = fopen('./SRC/ficheros/datos_obtenidos.txt', "a+");
    $arr = [
        'username'=>$username, 'password' => $password, 'correo' => $correo, 'nombre' => $nombre, 'apellido' => $apellido, 'telefono' => $telefono 
    ];
    fwrite($fichero, json_encode($arr).PHP_EOL);
    fclose($fichero);
    
     echo ('<h6>Cuenta creada </h6>');
}



function Validar_Usuario($username)
{ //ALGORITMO DE BUSQUEDA
    /*Busca datos, los trasforma a un formato utilizable, hace las comparaciones y retorna un resultado */
    $fileContent = file_get_contents("./SRC/ficheros/datos_obtenidos.txt");
    $lineas = explode(PHP_EOL, $fileContent);
    foreach($lineas as $linea){
      
        if(empty($linea)) continue;
        $user = json_decode($linea, true);
        if(isset($user['username'])){
            if($user['username'] == $username)  return true; //el usuario ya existe
        }
        
            
    } 
    return false;//el usuario no existe
    
}

?>