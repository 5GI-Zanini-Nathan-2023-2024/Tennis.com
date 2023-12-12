<!DOCTYPE html>

<html class = "signinPage">

    <head>
        <title>Login Area Riservata</title>
        <link rel = "icon" type = "image/x-icon" href = "/Icons/General/favicon.ico"> 
        <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity = "sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin = "anonymous" referrerpolicy = "no-referrer">
        <link href = "style.css" rel = "stylesheet">
        <script src = "javascript.js"> </script>
    </head>

    <body class = "signinBody">

    <nav>
        <a href = "./index.html"><img src = "Icons/General/home.ico"></a>
    </nav>

        <section class = "signinSection">

            <div class = "loginContainer">

                <h2>Accedi alla tua area riservata</h2>

                <?php
                    $todayDate = date("Y-m-d");
                ?>

                <form id = "formLoginUtente" class = "formPersonalizzato" action = "login.php" method = "POST">

                    <div class = "gruppoInput">

                    <div class = "gruppoInput">

                        <label for = "inputEmailUtente"> Email </label>
                        <br>
                        <div class = "contenitoreInputIcona">
                            <i class = "fa fa-envelope inputIcon"> </i>
                            <input type = "email" id = "inputEmailUtente" name = "inputEmailUtente" pattern = "[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title = "Formato email valido: user@mail.com" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Email" required>
                            <i class = "fa fa-check"> </i>
                        </div>

                    </div>

                    <br>

                    <div class = "gruppoInput">

                        <label for = "inputPasswordUtente"> Password </label>
                        <br>
                        <div class = "contenitoreInputIcona">
                            <i class = "fa fa-key inputIcon"> </i>
                            <input type = "password" id = "inputPasswordUtente" name = "inputPasswordUtente" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title = "La password deve contenere almeno 8 caratteri, una lettera maiuscola, una minuscola ed un numero" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Password" required>
                            <i class = "fa fa-check"> </i>
                            <i class = "far fa-eye" id = "toggleUserPassword" style = "margin-right: 15px; cursor: pointer" onclick = "togglePasswordVisibility()"> </i>
                        </div>
                        <p id = "avvertimentoPasswordUtente" class = "avvertimenti"> </p>
                                
                    </div>

                    <br>

                    <button type = "submit" id = "bottoneRegistrazioneUtente" name = "bottoneRegistrazioneUtente" class = "bottoniRegistrazione">LOGIN</button>

                </form>

                <?php

                    session_start();

                    if (isset($_SESSION['session_id'])) {
                        header('Location: dashboard.php');
                        exit;
                    }

                    if (!empty($_POST)) {

                        include "connection.php";

                        $userEmail = $_POST["inputEmailUtente"] ?? '';
                        $userPassword = $_POST["inputPasswordUtente"] ?? '';

                        if (empty($userEmail) || empty($userPassword)) {
                            echo '<br> <p class = "avvertimenti"> Attenzione: Assicurati di aver inserito le tue credenziali!</p>';
                        }

                        else {

                            $statement = $connection->prepare("SELECT Email, Password FROM Utenti WHERE Email = ?");
                            $statement->bind_param("s", $userEmail);
                            $statement->execute();

                            $queryResult = mysqli_stmt_get_result($statement);
                            $fetchResult = mysqli_fetch_field($queryResult);
                            $passwordHash = $fetchResult['Password'];

                            if (!$result || password_verify($userPassword, $passwordHash) === false) {
                                echo '<br> <p class = "avvertimenti"> Attenzione: Le credenziali inserite sono errate!</p>';
                            }

                            else {
                                session_regenerate_id();
                                $_SESSION['session_id'] = session_id();
                                $_SESSION['session_user'] = $user['username'];
                                
                                header('Location: dashboard.php');
                                exit;
                            }
                        }
                    }
                ?>

            </div>

        </section>

    </body>

</html>