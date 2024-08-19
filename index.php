<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login y Registro con HTML5 y CSS3</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>
<body>
    <main>
        <article>
                <form method="POST">
                    <h1>Inicia Sesion</h1>
                    <img src="icons-social/facebook.svg" title="Inicia Sesion con Facebook" alt="Inicia Sesion con Facebook">
                    <img src="icons-social/google.svg" title="Inicia Sesion con Google" alt="Inicia Sesion con Google">
                    <img src="icons-social/twitter.svg" title="Inicia Sesion con Twitter" alt="Inicia Sesion con Twitter">
                    <img src="icons-social/github.svg" title="Inicia Sesion con GitHub" alt="Inicia Sesion con GitHub"><br>
                    <input type="email" name="email" placeholder="Correo electr&oacute;nico" required><br/>
                    <input type="password" name="password" placeholder="Contrase&ntilde;a" required><br>
                    <input type="submit"  name="login">
                    <input type="reset">

                    <p>Aun no tienes cuenta ?</p>
                    <p>
                        <a href="register.php">Registrate</a>
                    </p>
                </form>
                <?php
                include "inicio.php";
                ?>
            </section>
        </article>
    </main>
    
</body>
</html>