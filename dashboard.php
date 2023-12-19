<!DOCTYPE html>

<html>

    <head>
        <title>Area riservata</title>
        <meta name = 'viewport' content = 'width=device-width, initial-scale=1'>
        <link rel = "icon" type = "image/x-icon" href = "/Icons/General/favicon.ico"> 
        <link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel = "stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href = 'style.css' rel = 'stylesheet'>
        <script src = "./javascript.js"></script>
    </head>

    <body>

        <nav>
            <a href = "./index.html"><img style = "display: inline; float: left" src = "Icons/General/home.ico"></a>
        </nav>

        <article id = "dashboardArticle">

            <script>

                hideAll();      // Invocazione della funzione Javascript "hideAll", utile per nascondere tutti gli elementi attualmente visibili nella pagina in modo tale da consentire la corretta visualizzazione della barra di avanzamento nella schermata di caricamento della pagina.
                
                document.body.setAttribute("style", "background-color: #000000");           // Impostazione del colore nero per lo sfondo dell'elemento "body" della pagina.

                let progressBarContainerDiv = document.createElement("div");                // Creazione del blocco "progressBarContainerDiv", successivamente necessario per contenere il blocco corrispondente alla barra di caricamento della pagina.
                progressBarContainerDiv.setAttribute("id", "progressBarContainerDiv");      // Assegnazione dell'id "progressBarContainerDiv" al blocco "progressBarContainerDiv" (ovvero il blocco necessario per contenere il sottoblocco corrispondente alla barra di caricamento della pagina). 
                progressBarContainerDiv.className = "progress";                             // Assegnazione della classe "progress" al blocco "progressBarContainerDiv" (ovvero il blocco necessario per contenere il sottoblocco corrispondente alla barra di caricamento della pagina).
                progressBarContainerDiv.setAttribute("style", "position: absolute; top: 43%; left: 15%; width: 70%; height: 8%");       // Definizione dell'attributo "style" del blocco "progressBarContainerDiv" (ovvero il blocco necessario per contenere il sottoblocco corrispondente alla barra di caricamento della pagina).

                let progressBarDiv = document.createElement("div");                         // Creazione del blocco "progressBarDiv", successivamente necessario per costituire la barra di caricamento della pagina. 
                progressBarDiv.setAttribute("id", "progressBar");                           // Assegnazione dell'id "progressBar" al blocco "progressBarDiv" (ovvero il blocco necessario per costituire la barra di caricamento della pagina).
                let progressBarClasses = ["progress-bar", "progress-bar-striped", "bg-success", "progress-bar-animated"];       

                // Ciclo for necessario per assegnare al blocco "progressBarDiv" (ovvero il blocco corrispondente alla barra di caricamento della pagina) tutte le classi contenute nell'array "progressBarClasses" come stringhe:
                for (let i = 0; i < progressBarClasses.length; i++) {
                    progressBarDiv.classList.add(progressBarClasses[i]);    // Aggiunta della classe corrente (in posizione "i" all'interno dell'array "progressBarClasses") al blocco "progressBarDiv" (ovvero il blocco corrispondente alla barra di caricamento della pagina).
                }

                progressBarDiv.setAttribute("role", "progressbar");         // Impostazione dell'attributo "role" del blocco "progressBarDiv" (ovvero il blocco corrispondente alla barra di caricamento della pagina), a cui viene assegnata come valore la stringa "progressbar".
                progressBarDiv.setAttribute("style", "width: 0%");          // Impostazione della larghezza del blocco "progressBarDiv" (ovvero il blocco corrispondente alla barra di caricamento della pagina) a 0%.
                progressBarDiv.setAttribute("aria-valuenow", "0");          // Impostazione dell'attributo "aria-valuenow" del blocco "progressBarDiv" (ovvero il blocco corrispondente alla barra di caricamento della pagina) a 0.
                progressBarDiv.setAttribute("aria-valuemin", "0");          // Impostazione dell'attributo "aria-valuemin" del blocco "progressBarDiv" (ovvero il blocco corrispondente alla barra di caricamento della pagina) a 0.
                progressBarDiv.setAttribute("aria-valuemax", "100");        // Impostazione dell'attributo "aria-valuemax" del blocco "progressBarDiv" (ovvero il blocco corrispondente alla barra di caricamento della pagina) a 100.

                let progressBarDescription = document.createElement("p");                                           // Creazione del paragrafo di testo "progressBarDescription", successivamente necessario per costituire la descrizione della barra di caricamento della pagina.
                progressBarDescription.setAttribute("id", "progressBarDescription");                                // Assegnazione dell'id "progressBarDescription" al paragrafo "progressBarDescription" (ovvero il paragrafo corrispondente alla descrizione della barra di caricamento della pagina).
                progressBarDescription.setAttribute("style", "position: absolute; top: 55%; font-size: 30px");      // Impostazione dello stile del paragrafo "progressBarDivDescription" (ovvero il paragrafo corrispondente alla descrizione della barra di caricamento della pagina), utile per definirne il posizionamento all'interno della pagina e la dimensione del font.
                progressBarDescription.innerHTML = "La tua area personale è in fase di caricamento...";             // Impostazione del contenuto testuale del paragrafo "progressBarDescription" (ovvero il paragrafo corrispondente alla descrizione della barra di caricamento della pagina).

                progressBarContainerDiv.appendChild(progressBarDiv);        // Aggiunta del blocco "progressBarDiv" (ovvero il blocco corrispondente alla barra di caricamento della pagina) al blocco "progressBarContainerDiv" (ovvero il blocco necessario per contenere la barra di caricamento della pagina). 
                document.body.appendChild(progressBarContainerDiv);         // Aggiunta del blocco "progressBarContainerDiv" (ovvero il blocco contenente la barra di caricamento della pagina) all'elemento "body" della pagina per permetterne la visualizzazione effettiva (nonchè la successiva animazione della barra di caricamento contenuta al suo interno).
                document.body.appendChild(progressBarDescription);          // Aggiunta del paragrafo "progressBarDescription" (ovvero il paragrafo corrispondente alla descrizione della barra di caricamento della pagina) all'elemento "body" della pagina per permetterne la visualizzazione effettiva.

                var progressBarAnimationSetInterval = setInterval(progressBarAnimation, 1000);      // Invocazione periodica (ogni 1000 millisecondi, ovvero ogni secondo) della funzione Javascript "progressBarAnimation", utile per consentire il progressivo avanzamento della barra di caricamento fino al 100% (una volta raggiunta la fine l'animazione della barra di caricamento lascerà il posto alla visualizzazione del contenuto vero e proprio della pagina).

            </script>

            <?php

                include "connection.php";       // Importazione del file "connection.php" utile per permettere la connessione al database.
                session_start();                // Apertura della sessione PHP.

                // Controllo di sessione: le istruzioni contenute all'interno di queste parentesi graffe verranno eseguite solamente nel caso in cui la variabile di sessione "loggedin" sia stata settata e contenga il valore booleano true:
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $statement = $connection->prepare("SELECT Email, Nome, Cognome, Telefono, Città, Via, Nascita FROM Utenti WHERE Email = ?");
                    $statement->bind_param("s", $_SESSION["session_user_email"]);       // Bind del parametro (ovvero l'indirizzo email dell'utente, recuperato dalla variabile di sessione "session_user_login" settata al momento del login dell'utente) per evitare attacchi di tipo "SQL Injection".
                    $statement->execute();              // Esecuzione vera e propria della query.
                    $statement->store_result();         // Salvataggio del risultato ottenuto dall'esecuzione della query.
                    $statement->bind_result($userEmail, $userName, $userSurname, $userTelephone, $userCity, $userStreet, $userBirthDate);       // Bind dei parametri (ovvero indirizzo email, nome, cognome, numero di telefono, città di nascita, via di residenza e data di nascita dell'utente che ha effettuato il login) per evitare attacchi di tipo "SQL Injection".
                    $statement->fetch();                // Estrapolazione dei risultati e assegnazione di essi alle variabili appena specificate per il bind del risultato.
                    $statement->close();                // Chiusura e deallocazione dello statement.
                }

                // Caso in cui l'utente non ha precedentemente eseguito l'accesso attraverso la pagina di login ("login.php").
                else {
                    header('Location: login.php');      // Reindirizzamento alla pagina di login ("login.php").
                }
                
            ?>

            <h1 style = "font-size: 60px; padding-top: 15px; color: #ffffff">Benvenuto nella tua area riservata, <?php echo $userName ?>!</h1>

            <h2 style = "font-size: 40px; padding-top: 20px; color: #00ff00">I tuoi dati personali:</h2>

            <?php

                $html_out = '<div id = "personalInformationContainer">';                            // Creazione di un blocco di classe "personalInformationContainer" (ovvero il blocco necessario per contenere le infromazioni personali dell'utente che verranno mostrate sulla pagina).

                $html_out .= '<p><b>Nome:</b> ' . $userName . '</p><br><br>';                       // Creazione di un paragrafo di testo contenente il nome dell'utente.
                $html_out .= '<p><b>Cognome:</b> ' . $userSurname . '</p><br><br>';                 // Creazione di un paragrafo di testo contenente il cognome dell'utente.
                $html_out .= '<p><b>Email:</b> ' . $userEmail . '</p><br><br>';                     // Creazione di un paragrafo di testo contenente l'indirizzo email dell'utente.
                $html_out .= '<p><b>Numero di telefono:</b> ' . $userTelephone . '</p><br><br>';    // Creazione di un paragrafo di testo contenente il numero di telefono dell'utente.
                $html_out .= '<p><b>Città:</b> ' . $userCity . '</p><br><br>';                      // Creazione di un paragrafo di testo contenente la città di nascita dell'utente.
                $html_out .= '<p><b>Via di residenza:</b> ' . $userStreet . '</p><br><br>';         // Creazione di un paragrafo di testo contenente la via di residenza dell'utente.
                $html_out .= '<p><b>Data di nascita:</b> ' . $userBirthDate . '</p><br><br>';       // Creazione di un paragrafo di testo contenente la data di nascita dell'utente.

                $html_out .= '</div>';      // Chiusura del blocco di classe "personalInformationContainer" (ovvero il blocco necessario per contenere le infromazioni personali dell'utente che verranno mostrate sulla pagina).

                echo $html_out;             // Inserimento nella pagina del codice html opportnamente preparato e concatenato all'interon della stringa "html_out".

            ?>

            <h2 style = "font-size: 40px; padding-top: 20px; color: #00ff00">I tuoi prodotti salvati:</h2>

            <?php

                $query = "SELECT * FROM Salvataggi WHERE EmailUtente = ?";          // Preparazione della query da eseguire sul database, utile per ottenere i salvataggi dell'utente identificato dall'email contenuta nella variabile "$userEmail".
                $queryResult = $connection->execute_query($query, [$userEmail]);    // Bind del parametro (ovvero l'indirizzo email dell'utente) ed esecuzione effettiva della query, utile per ottenere i salvataggi dell'utente identificato dall'email contenuta nella variabile "$userEmail"..

                if (mysqli_num_rows($queryResult) > 0) {                            // Iterazione attraverso le righe ottenute dalla query (ovvero tutti i prodotti salvati dall'utente nei propri preferiti):

                    $html_out = '<div class = "articlesContainer">';                // Apertura del blocco di classe "articlesContainer" (ovvero il blocco utile per contenere tutti i sottoblocchi con al loro interno i prodotti salvati nei preferiti dall'utente).
                    $rowArticleNumber = 0;                                          // Inizializzazione a 0 della variabile "rowArticleNumber", utile per memorizzare il numero del prodotto sulla riga (la pagina è infatti organizzata per righe, ognuna delle quali contiene 3 prodotti al massimo).
                    $productCodes = array();                                        // Inizializzazione della variabile "$productCodes", un array utile per contenere i codici di tutti i prodotti salvati nei preferiti dall'utente.

                    while ($row = mysqli_fetch_array($queryResult)) {               // Iterazione attraverso le righe ottenute dalla query (ovvero tutti i prodotti salvati nei preferiti dall'utente):

                        $rowArticleNumber++;                                        // Incremento della variabile "$rowArticleNumber", utile per contenere il numero (da 1 a 3) del prodotto sulla riga (la pagina è infatti organizzata per righe, ognuna delle quali contiene 3 prodotti al massimo).

                        $productCode = htmlspecialchars($row["CodiceProdotto"]);    // Assegnazione alla variabile "$productCode" del codice del prodotto correntemente analizzato.
                        $statement = $connection->prepare("SELECT Nome, Marca, Descrizione, Peso, Prezzo, Immagine FROM Prodotti WHERE Codice = ?");        // Preparazione della query da eseguire sul database, utile per ottenere tutte le informazioni associate al prodotto correntemente analizzato.
                        $statement->bind_param("s", $productCode);      // Bind del parametro (ovvero il codice del prodotto corrente).
                        $statement->execute();          // Esecuzione vera e propria della query appositamente preparata.
                        $statement->store_result();     // Salvataggio del risultato ottenuto dall'esecuzione della query.
                        $statement->bind_result($productName, $productBrand, $productDescription, $productWeight, $productPrice, $productImage);
                        $statement->fetch();            // Estrapolazione dei risultati ottenuti dall'esecuzione della query e salvataggio di essi all'interno delle variabili appositamente preparate.

                        $html_out .= '<div class = "shopArticle">';                                     // Apertura del blocco "shopArticle" (ovvero il blocco utile per contenere ovvero il blocco utile per contenere tutti gli elementi necessari per presentare le varie informazioni relative ad un singolo prodotto).
                        $html_out .= '<img src = "' . $productImage . '">';                             // Creazione del paragrafo di descrizione contenente l'immagine del prodotto corrente.
                        $html_out .= '<p><b>Nome:</b> ' . $productName . '</p><br>';                    // Creazione del paragrafo di descrizione contenente il nome del prodotto corrente.
                        $html_out .= '<p><b>Marca:</b> ' . $productBrand . '</p><br>';                  // Creazione del paragrafo di descrizione contenente la marca del prodotto corrente.
                        $html_out .= '<p><b>Descrizione:</b> ' . $productDescription . '</p><br>';      // Creazione del paragrafo di descrizione contenente la descrizione del prodotto corrente.
                        $html_out .= '<p><b>Peso:</b> ' . $productWeight . 'g</p><br>';                 // Creazione del paragrafo di descrizione contenente il peso del prodotto corrente.
                        $html_out .= '<p><b>Prezzo:</b> ' . $productPrice . '€</p><br>';                // Creazione del paragrafo di descrizione contenente il prezzo del prodotto corrente.
                        $html_out .= '<form method = "POST"><button class = "removeFromFavouritesButton">Rimuovi dai preferiti</button></form><br>';        // Creazione del bottone utile per permettere all'utente di rimuovere il prodotto corrente dai preferiti.
                        $html_out .= '</div>';                                                          // Chiusura del blocco "shopArticle" (ovvero il blocco utile per contenere tutti gli elementi necessari per presentare le varie informazioni relative ad un singolo prodotto).

                        // Controllo del numero contenuto all'interno della variabile "$rowArticleNumber":
                        if ($rowArticleNumber == 3) {
                            // Nel caso in cui il prodotto correntemente analizzato sia il 3° sulla riga, viene inserito un blocco di classe "break" utile per andare a capo all'interno del blocco contenitore "articlesContainer".
                            $html_out .= '<div class = "break"></div>';         // Creazione di un blocco di classe "break" utile per andare a capo all'interno del blocco di classe "articlesContainer".
                            $rowArticleNumber = 0;                              // Azzeramento della variabile "$rowArticleNumber": dopo la creazione di un blocco di classe "articlesContainer", infatti, inizierà una nuova riga.
                        }

                        $formattedProductCode = ltrim($productCode, "0");       // Assegnazione alla variabile "formattedProductCode" della stringa ottenuta dalla rimozione degli zeri antecedenti al valore vero e proprio del codice del prodotto.
                        array_push($productCodes, $formattedProductCode);       // Inserimento della stringa contenuta all'interno della variabile "$formattedProductCode" all'interno dell'array "productCodes".
                    }

                    $html_out .= '</div>';                                              // Chiusura del blocco di classe "articlesContainer" (ovvero il blocco utile per contenere tutti i sottoblocchi con al loro interno i prodotti salvati nei preferiti dall'utente).

                    $html_out .= '<div id = "emptyFavouritesButtonContainer">';         // Apertura del blocco con id "emptyFavouritesButtonContainer" (ovvero il blocco contenente il bottone utile per permettere all'utente di rimuovere contemporaneamente tutti i prodotti dai preferiti).
                    $html_out .= '<form method = "POST" action = "dashboard.php">';     // Apertura del form associato al bottone utile per permettere all'utente di rimuovere contemporaneamente tutti i prodotti dai preferiti.
                    $html_out .= '<button id = "emptyFavouritesButton" name = "emptyFavouritesButton" onclick = "emptyFavourites()">Rimuovi tutti i preferiti</button>';        // Creazione del bottone utile per permettere all'utente di rimuovere contemporaneamente tutti i prodotti dai preferiti.
                    $html_out .= '</form>';         // Chiusura del form associato al bottone utile per permettere all'utente di rimuovere contemporaneamente tutti i prodotti dai preferiti.
                    $html_out .= '</div>';          // Chiusura del blocco con id "emptyFavouritesButtonContainer" (ovvero il blocco contenente il bottone utile per permettere all'utente di rimuovere contemporaneamente tutti i prodotti dai preferiti).
                    
                    // Le istruzioni contenute all'interno di queste parentesi graffe verranno eseguite solamente dopo il click sul pulsante identificato dal nome "emptyFavouritesButton" (a cui è collegato un form):
                    if (isset($_POST["emptyFavouritesButton"])) {
                        $query = "DELETE FROM Salvataggi WHERE EmailUtente = ?";    // Preparazione della query utile per rimuovere dalla tabella "Salvataggi" del database tutti le righe in cui compare l'email dell'utente corrente.
                        $connection->execute_query($query, [$userEmail]);           // Bind del parametro (ovvero l'indirizzo email dell'utente, contenuto nella variabile "$userEmail") ed esecuzione effettiva della query.
                    }

                    echo $html_out;     // Inserimento nella pagina del codice html opportunamente preparato e formattato sotto forma di stringa all'interno della variabile "$html_out". 
                }

                else {
                    $html_out = '<div style = "height: 200px"><p style = "font-size: 25px; padding-top: 20px">Non hai nessun preferito salvato.</p></div>';     // Creazione di un blocco con all'interno un paragrafo di testo utile per informare l'utente che nei i suoi preferiti non è presente alcun prodotto dello shop.
                    echo $html_out;    // Inserimento nella pagina del codice html opportunamente preparato e formattato sotto forma di stringa all'interno della variabile "$html_out". 
                }
                
            ?>

            <script>
                // Invocazione della funzione Javascript utile per assegnare gli ID a ciascun bottone che permette all'utente di rimuovere un prodotto dai preferiti:
                assignIds("removeFromFavouritesButton", <?php echo json_encode($productCodes) ?>);
            </script>

            <?php

                // Ciclo for necessario per definire le operazioni di interazione con il database che dovranno essere automaticamente eseguite al momento del click su uno dei bottoni che permettono all'utente di rimuovere un prodotto dai preferiti:
                for ($i = 0; $i < mysqli_num_rows($queryResult); $i++) {

                    $currentButtonName = "removeFromFavouritesButton-" . $productCodes[$i];     // Assegnazione del nome del bottone corrente (formato dalla stringa fissa "removeFromFavouritesButton-" più il codice del prodotto corrispondente) alla variabile "$currentButtonName".

                    // Le istruzioni contenute all'interno di queste parentesi graffe verranno eseguite solamente al momento dell'invio del form, ovvero al momento del click su uno dei bottoni (uno per ogni prodotto) che permettono all'utente di rimuovere un prodotto dai preferiti:
                    if (isset($_POST[$currentButtonName])) {
                        $currentProductCode = intval(substr($currentButtonName, 27));                                           // Assegnazione del numero corrispondente al codice del prodotto (ottenuto dalla stringa contenuta nella variabile "$currentButtonName") alla variabile "currentProductCode".
                        $deleteQuery = "DELETE FROM Salvataggi WHERE EmailUtente = ? AND CodiceProdotto = ?";                   // Preparazione della query utile per eliminare dalla tabella "Salvataggi" del database la coppia "utente-prodotto salvato" (unica all'interno della tabella, in quanto queste due informazioni costituiscono, insieme, la chiave primaria della tabella "Salvataggi", nonchè le uniche due colonne di essa).
                        $deleteQueryResult = $connection->execute_query($deleteQuery, [$userEmail, $currentProductCode]);       // Bind dei parametri (ovvero email dell'utente e codice del prodotto corrente) ed esecuzione effettiva della query utile per eliminare dalla tabella "Salvataggi" del database la coppia "utente-prodotto salvato" (unica all'interno della tabella, in quanto queste due informazioni costituiscono, insieme, la chiave primaria della tabella "Salvataggi", nonchè le uniche due colonne di essa).
                    }
                }

            ?> 

            <div id = "onlineShopLinkContainer">
                <h2 class = "linkHeading">Visita il negozio online!</h2>
                <a href = "tennisShop.php"><img src = "Icons/General/shop.ico"></a>
            </div>

        </article>

        <footer style = "display: none">
            <p> Autore: Zanini Nathan</p>
            <br> <br>
            <p> Classe: 5GI </p>
            <br> <br>
            <p style = "display: inline">
                Email:
                <a href = "mailto:19636@studenti.marconiverona.edu.it"> 19636@studenti.marconiverona.edu.it</a>
            </p>
        </footer>
        
    </body>

</html>