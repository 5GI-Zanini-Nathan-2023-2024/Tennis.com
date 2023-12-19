<!DOCTYPE html>

<html class = "signinPage">

    <head>
        <title>Pagina di Registrazione</title>
        <link rel = "icon" type = "image/x-icon" href = "/Icons/General/favicon.ico"> 
        <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity = "sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin = "anonymous" referrerpolicy = "no-referrer">
        <link href = "style.css" rel = "stylesheet">
        <script src = "javascript.js"> </script>
    </head>

    <body id = "registrationBody">

        <nav>
            <a href = "./index.html"><img src = "Icons/General/home.ico"></a>
        </nav>

        <section class = "signinSection">

            <div id = "registrationContainer">

                <h2 style = "padding-top: 30px">REGISTRATI</h2>

                <form id = "formRegistrazioneUtente" class = "formPersonalizzato" method = "POST" action = "registration.php">

                    <div class = "gruppoInput" style = "position: absolute; top: 15%; right: 55%">

                        <label for = "inputNomeUtente"> Nome </label>
                        <br>
                        <div class = "contenitoreInputIcona">

                            <i class = "fa fa-user inputIcon"> </i>
                            <input type = "text" id = "inputNomeUtente" name = "inputNomeUtente" pattern = "[A-Z a-z]{1,20}" title = "Non sono ammessi numeri o caratteri speciali; Lunghezza massima: 20 caratteri" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Nome" required>
                            <i class="fa fa-check"></i>

                        </div>

                    </div>

                    <div class = "gruppoInput" style = "position: absolute; top: 15%; left: 55%">

                        <label for = "inputCognomeUtente"> Cognome </label>
                        <br>
                        <div class = "contenitoreInputIcona">

                            <i class = "fa fa-user inputIcon"> </i>
                            <input type = "text" id = "inputCognomeUtente" name = "inputCognomeUtente" pattern = "[A-Z a-z]{1,20}" title = "Non sono ammessi numeri o caratteri speciali; Lunghezza massima: 20 caratteri" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Cognome" required>
                            <i class = "fa fa-check"></i>
                        
                        </div>

                    </div>

                    <br> <br>

                    <div class = "gruppoInput" style = "position: absolute; top: 27%; left: 55%">

                        <label for = "inputEmailUtente"> Email </label>
                        <br>
                        <div class = "contenitoreInputIcona">

                            <i class = "fa fa-envelope inputIcon"> </i>
                            <input type = "email" id = "inputEmailUtente" name = "inputEmailUtente" pattern = "[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title = "Formato email valido: user@mail.com" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Email" required>
                            <i class = "fa fa-check"> </i>

                        </div>

                    </div>

                    <div class = "gruppoInput" style = "position: absolute; top: 27%; right: 55%">

                        <label for = "inputNumeroTelefonoUtente"> Numero di telefono </label>
                        <br>    
                        <div class = "contenitoreInputIcona">
                            <i class = "fa fa-phone inputIcon" style = "transform: rotate(180deg)"> </i>
                            <input type = "text" id = "inputNumeroTelefonoUtente" name = "inputNumeroTelefonoUtente" pattern = "[0-9]{10}" title = "Non sono ammesse lettere o caratteri speciali" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Numero di telefono" required>
                            <i class = "fa fa-check"> </i>
                        </div>

                    </div>

                    <br>

                    <div class = "gruppoInput" style = "position: absolute; top: 39%; right: 55%; width: 380px">

                        <label for = "inputPasswordUtente"> Password </label>
                        <br>
                        <div class = "contenitoreInputIcona">
                            <i class = "fa fa-key inputIcon"> </i>
                            <input type = "password" id = "inputPasswordUtente" name = "inputPasswordUtente" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title = "La password deve contenere almeno 8 caratteri, una lettera maiuscola, una minuscola ed un numero" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Password" oninput = "checkPasswordsEquality()" required>
                            <i class = "fa fa-check" style = "position: absolute; right: 9%"> </i>
                            <i class = "far fa-eye" id = "toggleUserPassword" style = "position: absolute; right: 6%; cursor: pointer" onclick = "togglePasswordVisibility()"> </i>
                        </div>
                        <p id = "avvertimentoPasswordUtente" class = "avvertimenti" style = "position: absolute; margin-top: 120px; margin-left: 10px"> </p>
                                
                    </div>

                    <div class = "gruppoInput" style = "position: absolute; top: 39%; left: 55%; width: 380px">

                        <label for = "inputConfermaPasswordUtente"> Conferma password </label>
                        <br>                        
                        <div class = "contenitoreInputIcona">
                            <i class = "fa fa-key inputIcon"> </i>    
                            <input type = "password" id = "inputConfermaPasswordUtente" name = "inputConfermaPasswordUtente" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title = "La password deve contenere almeno 8 caratteri, una lettera maiuscola, una minuscola ed un numero" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Conferma password" oninput = "checkPasswordsEquality()" required>
                            <i class = "fa fa-check" style = "position: absolute; right: 9%"> </i>
                            <i class = "far fa-eye" id = "toggleUserConfirmPassword" style = "position: absolute; right: 6%; cursor: pointer" onclick = "togglePasswordVisibility()"> </i>    
                        </div>
                        <p id = "avvertimentoConfermaPasswordUtente" class = "avvertimenti" style = "position: absolute; margin-top: 120px; margin-right: 10px"> </p>

                    </div>

                    <br>

                    <div class = "gruppoInput" style = "position: absolute; top: 55%; left: 55%">

                        <label for = "inputCittàNascitaUtente"> Città di nascita </label>
                        <br>
                        <div class = "contenitoreInputIcona">

                            <i class = "fa fa-globe inputIcon"> </i>
                            <input type = "text" id = "inputCittàNascitaUtente" name = "inputCittàNascitaUtente" pattern = "[A-Z a-z]{1,30}" title = "Inserisci qui la tua città di nascita" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Città" required>
                            <i class = "fa fa-check"> </i>

                        </div>

                    </div>

                    <div class = "gruppoInput" style = "position: absolute; top: 55%; right: 55%">
                        <label for = "inputViaResidenzaUtente"> Via di residenza </label>
                        <br>
                        <div class = "contenitoreInputIcona">
                            <i class = "fa fa-location-arrow inputIcon"> </i>
                            <input type = "text" id = "inputViaResidenzaUtente" name = "inputViaResidenzaUtente" pattern = "[A-Z a-z0-9/]{1,50}" title = "Inserisci qui la tua via di residenza" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" placeholder = "Residenza" required>
                            <i class = "fa fa-check"> </i>
                        </div>
                    </div>

                    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

                    <div class = "gruppoInput" style = "position: absolute; top: 68%; left: 36.5%">

                        <label for = "inputDataNascitaUtente"> Data di nascita </label>
                        <br>
                        <div class = "contenitoreInputIcona">
                            <i class = "fa fa-calendar inputIcon"> </i>
                            <input type = "date" id = "inputDataNascitaUtente" name = "inputDataNascitaUtente" title = "Inserisci qui la tua data di nascita" oninvalid = "styleInputFieldError()" onchange = "checkInputFieldValidity()" required>
                            <i class = "fa fa-check"> </i>
                        </div>

                    </div>

                    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

                    <div class = "gruppoInput">

                        <label for = "inputAccettazionePoliticaPrivacy" style = "font-size: 18px"> Accetto la politica di gestione della privacy </label>
                        <span class = "verySmallBr"> </span>
                        <input type = "checkbox" id = "inputAccettazionePoliticaPrivacy" name = "inputAccettazionePoliticaPrivacy" style = "margin-top: 10px; margin-left: 390px" required>

                    </div>

                    <br>

                    <button type = "submit" id = "bottoneRegistrazioneUtente" name = "bottoneRegistrazioneUtente" class = "bottoniInvioForm"> Registrazione </button>

                </form>

                <?php

                    if (!empty($_POST)) {

                        include "connection.php";       // Importazione del file "connection.php" utile per permettere la connessione al database.

                        // Dati inseriti dall'utente negli appositi campi input del form:
                        $nomeUtente = $_POST["inputNomeUtente"];                            // Nome dell'utente.
                        $cognomeUtente = $_POST["inputCognomeUtente"];                      // Cognome dell'utente.
                        $emailUtente = $_POST["inputEmailUtente"];                          // Indirizzo email dell'utente.
                        $passwordUtente = $_POST["inputPasswordUtente"];                    // Password scelta dall'utente.
                        $numeroTelefonoUtente = $_POST["inputNumeroTelefonoUtente"];        // Conferma della password scelta.
                        $cittàNascitaUtente = $_POST["inputCittàNascitaUtente"];            // Città di nascita dell'utente.
                        $viaResidenzaUtente = $_POST["inputViaResidenzaUtente"];            // Via di residenza dell'utente.
                        $dataNascitaUtente = $_POST["inputDataNascitaUtente"];              // Data di nascita dell'utente.
                                
                        $emailQueryResult = mysqli_execute_query($connection, "SELECT COUNT(Email) FROM Utenti WHERE Email = ?", [$emailUtente]);       // Query utile per ottenere il numero di righe del database aventi come email la stringa contenuta all'interno della variabile "$userEmail" (ovvero l'email inserita dall'utente nell'apposito campo input del form): tale numero potrà essere pari solamente a 0, nel caso in cui l'email inserita dall'utente non sia ancora registrata nel database, oppure a 1 (nel caso in cui essa sia già in uso), dal momento che tale informazione costituisce la chiave primaria della tabella "Utenti" del database.
                        $equalEmailFieldsNumber = mysqli_fetch_array($emailQueryResult)[0];                                                             // Assegnazione del numero ottenuto dalla query "$emailQueryResult" (ovvero 1 o 0, a seconda che l'email dell'utente sia o non sia già registrata all'interno del database) alla variabile "$equalEmailFieldsNumber".
                        
                        // Controllo dell'univocità dell'email utilizzata:
                        if ($equalEmailFieldsNumber == 0) {
                            // Nel caso in cui l'email non sia già in uso, si può procedere alla registrazione dell'utente nel database del sito web:                   
                            $statement = $connection->prepare("INSERT INTO Utenti VALUES (?, ?, ?, ?, ?, ?, ?, ?)");        // Preparazione della query di inserimento da eseguire sul database (utile per registrare un nuovo utente all'interno di esso). 
                            $statement->bind_param("ssssssss", $emailUtente, $passwordUtente, $nomeUtente, $cognomeUtente, $numeroTelefonoUtente, $cittàNascitaUtente, $viaResidenzaUtente, $dataNascitaUtente);        // Bind dei parametri (corrispondenti alle credenziali inserite dall'utente negli appositi campi input del form) per evitare attacchi di tipo "SQL Injection".
                            $statement->execute();      // Esecuzione vera e propria della query appositamente preparata.
                            echo '<br><p class = "conferme" style = "font-size: 35px; position: absolute; margin-top: 24px"> Perfetto: Ti sei registrato correttamente nel nostro sito web!</p>';  // Creazione di un paragrafo di conferma utile per informare l'utente che la registrazione è avvenuta correttamente.
                        }

                        // Caso in cui l'email è già in uso (ovvero la query eseguita ha restituito 1 riga):
                        else {
                            // Nel caso in cui l'email inserita sia già in uso, la registrazione viene negata e viene stampato un messaggio di errore:
                            echo '<br><p class = "avvertimenti" style = "position: absolute; margin-top: 20px"> Attenzione: L\'email inserita è già in uso!</p>';     // Creazione di un paragrafo di errore utile per informare l'utente che la registrazione non è andata a buon fine.
                        }
                    }
                ?>

            </div>

        </section>

    </body>

</html>