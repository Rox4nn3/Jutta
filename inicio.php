<?php
include "con_bd.php"; // Asegúrate de que este archivo contenga la conexión a la base de datos

if (isset($_POST["login"])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Verifica que los campos no estén vacíos
    if (strlen($email) >= 1 && strlen($password) >= 1) {
        // Consulta para verificar si el correo electrónico existe
        $consultaEmail = "SELECT * FROM registro WHERE Email = ?";
        $stmtEmail = $conex->prepare($consultaEmail);
        $stmtEmail->bind_param("s", $email);
        $stmtEmail->execute();
        $resultadoEmail = $stmtEmail->get_result();

        if ($resultadoEmail->num_rows > 0) {
            // El correo electrónico existe, ahora verifica la contraseña
            $consultaPassword = "SELECT * FROM registro WHERE Email = ? AND Password = ?";
            $stmtPassword = $conex->prepare($consultaPassword);
            $stmtPassword->bind_param("ss", $email, $password);
            $stmtPassword->execute();
            $resultadoPassword = $stmtPassword->get_result();

            if ($resultadoPassword->num_rows > 0) {
                // Usuario encontrado, iniciar sesión (o redirigir a una página de bienvenida)
                echo "<h3 id='ok'>¡Inicio de sesión exitoso!</h3>";
                header("Location: Marlon.php");
                exit();
            } else {
                // Contraseña incorrecta, mostrar mensaje de error
                echo "<h3 id='bad'>¡La contraseña es incorrecta!</h3>";
            }

            $stmtPassword->close();
        } else {
            // Correo electrónico incorrecto, mostrar mensaje de error
            echo "<h3 id='bad'>¡El correo electrónico es incorrecto! Por favor, regístrate si no tienes una cuenta.</h3>";
        }

        $stmtEmail->close();
    } else {
        // Campos vacíos, mostrar mensaje de error
        echo "<h3 id='bad'>¡Por favor complete ambos campos!</h3>";
    }
}

$conex->close();

