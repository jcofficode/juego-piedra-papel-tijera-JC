<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./src/img/liderazgo.png" type="image/x-icon">
    <title>Piedra Lagarto Spoke Tijera Papel</title>
</head>

<body>
    <?/*
    */?>
  
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
       include("./SRC/functions/global.php");
    }
    ?>
    <main>
   
        
              <article class="todo">
               
                    <div class="img-section">
                        
                        <img src="./SRC/img/piedra-papel-tijera-piedra-papel-tijera-lagarto-spock.gif" class="gif-presen" >             
                    </div>
               
                <!--<div class="login-container" style="height: auto; ">-->
                    <div class="main-section">
                   
                        
                    <form action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF']));  ?>" class="formulario" method="get">
                    <legend>Ingrese sus datos para pasar un buen rato</legend><br>
                        <!--EMPIEZA ACA-->
                    <div class="grid">
                       
                        <div class="form-group">
                            <label for="username">Correo </label><br>
                            <input  class="form-input" type="email" name="correo" id="correo" placeholder="Escribe tu correo electronico" minlength="14" maxlength="24"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Nombre </label><br>
                            <input  class="form-input" type="text" name="nombre" id="name" placeholder="Escribe tu  primer nombre" minlength="2" maxlength="15" pattern="^[a-zA-Záéíóúñ]{2,15}$" required>
                        </div>
                        

                        <div class="form-group">
                            <label for="username">Apellido </label><br>
                            <input  class="form-input" type="text" name="apellido" id="apellido" placeholder="Escribe tu apellido" minlength="2" maxlength="15" pattern="^[a-zA-Záéíóúñ]{2,15}$" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Usuario </label><br>
                            <input  class="form-input" type="text" name="username" id="username" placeholder="Escribe tu nombre de usuario" minlength="8" maxlength="14" pattern="[a-zA-Z0-9]{8,14}" required>
                        </div>

                        <div class="form-group inout-telf">
                            <label for="username">Teléfono </label><br>
                            <input  class="form-input" type="number" name="telefono" id="telefono" placeholder="Escribe tu telefono"   pattern="^[0-9]{3,15}$" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label><br>
                            <input class="form-input" type="password" name="password" id="password" placeholder="Escribe tu contraseña" minlength="8" maxlength="14" pattern="[a-zA-Z0-9-@.-_]{14}" required>
                        </div>
                        <?php if (!empty($error)) :
                            echo $error;
                        endif; ?>
                        <!--TERMINA ACA-->
                        </div>
                    
                        <div class="botones">
                            <input class="form-button b-registrar"  type="submit" name="registrar" value="Registrarse">
                        
                        <a href="./login.php"  class="b-sesion">Iniciar Sesión</a>
                        
                        </div>
                    </form>
                    </article>
                
                
                <?php
                if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['correo']) )  {//Validación de datos
                    //variables de entrada 
                    $username_JC = $_GET['username'];
                    $password_JC = $_GET['password'];
                    $correo_JC = $_GET['correo'];
                    $nombre_JC = $_GET['nombre'];
                    $apellido_JC = $_GET['apellido'];
                    $telefono_JC = $_GET['telefono'];
                    $name_JC = isset($_GET['enviar'])
                     ? $_GET['enviar'] : $_GET['registrar'];

                    // Variable de salida 
                    $result_Datos_JC = Datos_Login($username_JC, $password_JC, $correo_JC ,$nombre_JC,$apellido_JC,$telefono_JC,$name_JC );//Invocación de función que recibe todos los datos de cada usuario
                    echo ('<p>' . $result_Datos_JC . '<p>');
                }
                ?>
            </article>
        </section>
       
    </main>

    <!--  -->
    <?/*php include './src/layout/footer.php'; */?>

</body>

</html>