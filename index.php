<?php

//Include Configuration File
include('config.php');

$login_button = '';

if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);

        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

//Ancla para iniciar sesión
if (!isset($_SESSION['access_token'])) {
    $login_button = '<a href="' . $google_client->createAuthUrl() . '" style=" background: #dd4b39; border-radius: 5px; color: white; display: block; font-weight: bold; padding: 20px; text-align: center; text-decoration: none; width: 200px;">Login With Google</a>';
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Estilo Netflix</title>
        <link rel="stylesheet" href="styles1.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="login-container">
            <form action="ingreso.php" method="POST" class="login-form">
                <h1>Inicia sesión</h1>
                <div class="input-container">
                    <input type="email" id="email" name="email" required>
                    <label for="email">Correo electrónico</label>
                </div>

                <div class="input-container">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Contraseña</label>
                </div>
                <button type="submit">Iniciar sesión</button>
                <div class="support">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recuérdame</label>
                </div>
                <a href="recover_pass.php">Recuperar Contraseña</a>
                </div>
                <br>
                <div align="center" class="a"> 
                    <?php
                        if ($login_button == '') {
                            echo '<div class="card-header">Welcome User</div><div class="card-body">';
                            echo '<img src="' . $_SESSION["user_image"] . '" class="rounded-circle container"/>';
                            echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
                            echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
                            echo '<h3><a href="logout.php">Logout</h3></div>';
                        } else {
                            echo '<div align="center">' . $login_button . '</div>';
                        }
                    ?>
                    </div>
                <div class="signup">
                    <p align="center">¿No Tienes Cuenta? <a href="form.php">Crea Una</a></p>
                </div>
            </form>
        </div>
    </body>
</html>
