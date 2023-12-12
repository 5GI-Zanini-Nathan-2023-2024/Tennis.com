<!DOCTYPE html>

<html class = "signinPage">

    <head>
        <title>Pagina di Registrazione</title>
        <link rel = "icon" type = "image/x-icon" href = "/Icons/General/favicon.ico"> 
        <link href = "style.css" rel = "stylesheet">
        <script src = "javascript.js"> </script>
    </head>

    <body class = "signinBody">

        <section class = "signinSection">

            <div class = "signin">

                <h2>Registrati</h2>

                <form class = "signinForm" id = "formRegistrazione" name = "formRegistrazione">

                    <label for = "inputNomeUtente">Nome</label> <br>
                    <input type = "text" id = "inputNomeUtente" required>

                    <br> <br>

                    <label for = "inputCognomeUtente">Cognome</label> <br>
                    <input type = "text" id = "inputCognomeUtente" required>

                    <br> <br>

                    <label for = "inputEmailLogin">Email</label> <br>
                    <input type = "email" id = "inputEmailUtente" required>

                    <br> <br>

                    <label for = "inputPasswordLogin">Password</label> <br>
                    <input type = "password" id = "inputPasswordUtente" required>

                    <br> <br>

                    <label for = "inputNumeroTelefonoUtente">Numero di telefono</label> <br>
                    <input type = "text" id = "inputNumeroTelefonoUtente" required>

                    <label for = "inputCittàNascitaUtente">Città di nascita</label> <br>
                    <input type = "text" id = "inputCittàNascitaUtente" required>

                    <br> <br>

                    <label for = "inputViaResidenzaUtente">Via di residenza</label> <br>
                    <input type = "text" id = "inputViaResidenzaUtente" required>

                    <br> <br>

                    <label for = "inputDataNascitaUtente">Data di nascita</label> <br>
                    <input type = "date" id = "inputDataNascitaUtente" required>

                    <br> <br>

                    <p>Accetto la politica sulla privacy per la gestione dei dati sensibili.</p>

                    <input type = "checkbox" id = "inputAccettazionePoliticaPrivacy">

                    <br> <br>

                    <button type = "submit" id = "bottoneConfermaLogin">REGISTRATI</button>
                    
                </form>

                <?php

                    if (!empty($_POST)) {

                        include "connection.php";

                        $maxIDQueryResult = $connection->query("SELECT MAX(ID) FROM Utenti");
                        $IDUtente = mysqli_fetch_array($maxIDQueryResult) + 1;

                        // Dati inseriti dall'utente negli appositi campi input:
                        $nomeUtente = $_POST["inputNomeUtente"];
                        $cognomeUtente = $_POST["inputCognomeUtente"];
                        $emailUtente = $_POST["inputEmailUtente"];
                        $passwordUtente = $_POST["inputPasswordUtente"];
                        $numeroTelefonoUtente = $_POST["inputNumeroTelefonoUtente"];
                        $cittàNascitaUtente = $_POST["inputCittàNascitaUtente"];
                        $viaResidenzaUtente = $_POST["inputViaResidenzaUtente"];
                        $dataNascitaUtente = $_POST["inputDataNascitaUtente"];
                                
                        $emailQueryResult = mysqli_execute_query($connection, "SELECT COUNT(Email) FROM Utenti WHERE Email = ?", [$emailUtente]);
                        $equalEmailFieldsNumber = mysqli_fetch_array($emailQueryResult)[0];

                        $telephoneNumberQueryResult = mysqli_execute_query($connection, "SELECT COUNT(Telefono) FROM Utenti WHERE Telefono = ?", [$numeroTelefonoUtente]);
                        $equalTelephoneNumberFieldsNumber = mysqli_fetch_array($telephoneNumberQueryResult)[0];
                        
                        // Controllo dell'univocità dell'email e del numero di telefono utilizzati:
                        if ($equalEmailFieldsNumber == 0 && $equalTelephoneNumberFieldsNumber == 0) {
                            // Nel caso in cui l'email e il numero di telefono non siano già in uso, si può procedere alla registrazione dell'utente nel database del sito web:                   
                            $statement = $connection->prepare("INSERT INTO Utenti VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                            $statement->bind_param("issssssss", $IDUtente, $nomeUtente, $cognomeUtente, $emailUtente, $passwordUtente, $numeroTelefonoUtente, $cittàNascitaUtente, $viaResidenzaUtente, $dataNascitaUtente);
                            $statement->execute();
                            echo '<br> <p class = "conferme"> Perfetto: Ti sei registrato correttamente nel nostro sito web! </p>';
                        }

                        else {
                            // Nel caso in cui l'email e/o il numero di telefono inseriti siano già in uso, la registrazione viene negata e viene stampato un messaggio di errore:
                            echo '<br> <p class = "avvertimenti"> Attenzione: Il numero di telefono e/o l\'email inserita sono già in uso! </p>';
                        }
                    }
                ?>

            </div>

        </section>

    </body>

</html>