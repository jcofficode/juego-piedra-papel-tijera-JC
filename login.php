<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="shortcut icon" href="./src/img/icono.ico" type="image/x-icon">
    <title>Piedra Lagarto Spock Tijera Papel</title>
</head>

<body>
  
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
       include("./SRC/functions/global.php");
    }
    ?>
    <main>

            <article>
                
                <div class="img-section header-sesion">
                <h1 class="h-login">Adentrate a este  maravilloso <span style="margin-left: 150px;">juego</span></h1>
                <img src="./SRC/img/juego.gif" class="gif-presen" >  
              </div>

                <div class="main-section cuerpo-sesion">
                    <form action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF']));  ?>" method="get"> 
                   
                        <div class="form-group">
                            <label for="username">Usuario <img src="./SRC/img/naranja.png" alt="" class="img-login"></label><br>
                            <input class="form-input" type="text" name="username" id="username" placeholder="Escribe tu nombre de usuario" minlength="8" maxlength="14" pattern="[a-zA-Z0-9]{4,18}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña  <img src="./SRC/img/bloquear.png" alt="" class="img-login"></label><br>
                            <input class="form-input" type="password" name="password" id="password" placeholder="Escribe tu contraseña" minlength="8" maxlength="14" pattern="[a-zA-Z0-9-@.-_]{14}" required>
                        </div>
                        <?php if (!empty($error)) :
                            echo $error;
                        endif; ?>
                   
                        <div class="botones">
                        <a  href="index.php" class="b-sesion b-registrar-gif">Crear Cuenta</a>
                        <input class="form-button b-sesion b-sesion-gif" type="submit" name="enviar" value="Ingresar">
                      
                        
                        
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_GET['username']) && isset($_GET['password'])) {
                    //variables de entrada 
                    $username_JC = $_GET['username'];
                    $password_JC = $_GET['password'];

                    $name_JC = isset($_GET['enviar']) ? $_GET['enviar'] : $_GET['registrar'];

                    // Variable de salida 
                    $result_Datos = Iniciar_Sesion($username_JC, $password_JC );
                    echo ('<p>' . $result_Datos . '<p>');
                }
                ?>
            </article>
        </section>
       
    </main>

    <!--  -->
    <?/*php include './src/layout/footer.php'; */?>

</body>

</html>