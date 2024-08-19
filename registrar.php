<?php
include "con_bd.php";

if (isset($_POST["Register"])) {
    if (
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['surname']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['password']) >= 1 &&
        strlen($_POST['password2']) >= 1
    ) {
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);
        $fecha = date("d/m/y");

        // Verificar si las contraseñas coinciden
        if ($password === $password2) {

            // Verificar si el correo ya existe
            $checkEmailQuery = "SELECT * FROM registro WHERE Email = '$email'";
            $result = mysqli_query($conex, $checkEmailQuery);

            if (mysqli_num_rows($result) > 0) {
                ?>
                <h3 id="bad">¡El correo electrónico ya está registrado!</h3>
                <?php
            } else {
                // Si no existe, insertar el nuevo registro
                $consulta = "INSERT INTO `registro`(`Name`, `Surname`, `Email`, `Password`, `Password2`, `Fecha`)
                             VALUES ('$name','$surname','$email','$password','$password2','$fecha')";
                $resultado = mysqli_query($conex, $consulta);

                if ($resultado) {
                    ?>
                    <h3 id="ok">¡Te has inscrito correctamente!</h3>
                    <?php
                    header("Location: Marlon.php");
                    exit();
                } else {
                    ?>
                    <h3 id="bad">¡Ups, ha ocurrido un error!</h3>
                    <?php
                }
            }
        } else {
            ?>
            <h3 id="bad">¡Las contraseñas no coinciden!</h3>
            <?php
        }
    } else {
        ?>
        <h3 id="bad">¡Por favor complete todos los campos!</h3>
        <?php
    }
}
?>
