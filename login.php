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

                    include "connection.php";
                    session_start();

                    if (isset($_POST) && !empty($_POST)) {

                        $userEmail = $_POST["inputEmailUtente"];
                        $userPassword = $_POST["inputPasswordUtente"];

                        if (empty($userEmail) || empty($userPassword)) {
                            echo '<br> <p class = "avvertimenti"> Attenzione: Assicurati di aver inserito le tue credenziali!</p>';
                        }

                        else {

                            // Preparazione della query SELECT che dovrà essere effettuata sul database:
                            $statement = $connection->prepare("SELECT Email, Password FROM Utenti WHERE Email = ?");
                            // Bind dei parametri per prevenire attacchi di tipo SQL Injection:
                            $statement->bind_param("s", $userEmail);
                            // Esecuzione della query:
                            $statement->execute();
                            // Salvataggio del risultato della query:
                            $statement->store_result();

                            // Caso in cui la query abbia restituito almeno 1 riga (ovvero l'email inserita dall'utente sia stata trovata all'interno del database):
                            if ($statement->num_rows > 0) {

                                $statement->bind_result($databaseEmail, $databasePassword);
                                $statement->fetch();

                                if (password_verify($userPassword, $databasePassword)) {

                                    echo "<p class = 'conferme' style = 'margin-top: 400px'> Perfetto: l'accesso è avvenuto correttamente! </p>";
                                    $_SESSION['loggedin'] = true;
                                    $_SESSION['session_id'] = session_id();
                                    $_SESSION['session_user_email'] = $userEmail;
                                    header('Location: dashboard.php');
                                    exit;
                                }

                                else {
                                    echo '<p class = "avvertimenti" style = "margin-top: 440px"> Attenzione: Le credenziali inserite sono errate!</p>';
                                }
                            }

                            // Caso in cui la query non abbia restituito alcuna riga (ovvero l'email inserita dall'utente non sia stata trovata all'interno del database):
                            else {
                                echo '<p class = "avvertimenti" style = "margin-top: 380px"> Attenzione: Non sei ancora registrato a questo sito!</p>';
                                echo '<a href = "./registration.php" style = "margin-top: 80px; font-size: 25px">Registrati</a>';
                            }
                        }

                        $statement->close();
                    }
                ?>

            </div>

        </section>

    </body>

</html>