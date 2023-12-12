<!DOCTYPE html>

<html class = "signinPage">

    <head>
        <title>Login Area Riservata</title>
        <link rel = "icon" type = "image/x-icon" href = "/Icons/General/favicon.ico"> 
        <link href = "style.css" rel = "stylesheet">
        <script src = "javascript.js"> </script>
    </head>

    <body class = "signinBody">

    <nav>
        <img src = "Icons/General/">
    </nav>

        <section class = "signinSection">

            <div class = "signin">

                <h2>Accedi alla tua area riservata</h2>

                <form class = "signinForm" id = "formLogin" name = "formLogin">

                    <label for = "inputEmailUtente">Email</label> <br>
                    <input type = "email" id = "inputEmailUtente" required>

                    <br> <br>

                    <label for = "inputPasswordUtente">Password</label> <br>
                    <input type = "password" id = "inputPasswordUtente" required>

                    <br> <br>

                    <a href = "./registration.php">Non hai ancora un account?</a>

                    <br> <br>

                    <button type = "submit" id = "bottoneConfermaLogin">LOGIN</button>
                    
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