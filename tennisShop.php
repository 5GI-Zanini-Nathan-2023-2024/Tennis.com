<!DOCTYPE html>

<html>

    <head>
        <title>Negozio tennistico</title>
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

        <article id = "tennisShopArticle">

            <h1 style = "font-size: 80px; padding-top: 15px; color: #ffffff">Acquista i migliori articoli sportivi!</h1>

            <?php

                include "connection.php";       // Importazione del file "connection.php" utile per permettere la connessione al database.
                session_start();                // Apertura della sessione PHP.

                // Controllo di sessione: le istruzioni contenute all'interno di queste parentesi graffe verranno eseguite solamente nel caso in cui la variabile di sessione "loggedin" sia stata settata e contenga il valore booleano true:
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    
                    $userEmail = $_SESSION['session_user_email'];           // Salvataggio della stringa contenuta all'interno della variabile di sessione "session_user_email" nella variabile "$user_email".

                    $query = "SELECT * FROM Prodotti";                      // Preparazione della query da eseguire sul database.
                    $queryResult = $connection->execute_query($query);      // Esecuzione sul database della query appositamente preparata.

                    $html_out = '<div class = "articlesContainer">';        // Apertura di un blocco di classe "articleContainer" (ovvero il blocco contenente tutti i sottoblocchi con i vari prodotti visualizzabili e salvabili dall'utente).
                    $rowArticleNumber = 0;                                  // Inizializzazione a 0 della variabile "rowArticleNumber", utile per memorizzare il numero del prodotto sulla riga (la pagina è infatti organizzata per righe, ognuna delle quali contiene 3 prodotti al massimo).
                    $articleNumber = 0;                                     // Inizializzazione a '0 della variabile "articleNumber", utile per memorizzare il numero (da 1 a 22) del prodotto correntemente analizzato.
                    $productCodes = array();                                // Inizializzazione della variabile "$productCodes", un array utile per contenere i codici di tutti i prodotti presentati nello shop.

                    while ($row = mysqli_fetch_array($queryResult)) {       // Iterazione attraverso le righe ottenute dalla query (ovvero tutti i prodotti contenuti nella tabella "Prodotti" del database):

                        $articleNumber++;                                   // Incremento della variabile "$articleNumber", utile per contenere il numero (da 1 a 22) del prodotto correntemente analizzato.
                        $rowArticleNumber++;                                // Incremento della variabile "$rowArticleNumber", utile per contenere il numero (da 1 a 3) del prodotto sulla riga (la pagina è infatti organizzata per righe, ognuna delle quali contiene 3 prodotti al massimo).

                        $html_out .= '<div class = "shopArticle">';                                                     // Apertura del blocco "shopArticle" (ovvero il blocco utile per contenere ovvero il blocco utile per contenere tutti gli elementi necessari per presentare le varie informazioni relative ad un singolo prodotto dello shop).
                        $productCode = htmlspecialchars($row["Codice"]);                                                // Assegnazione del codice del prodotto corrente (memorizzato nel database e ottenuto mediante l'esecuzione della query "$query") alla variabile "$productCode".
                        $html_out .= '<img src = "' . htmlspecialchars($row["Immagine"]) . '">';                        // Creazione dell'immagine di esposizione del prodotto corrente.
                        $html_out .= '<p><b>Nome:</b> ' . htmlspecialchars($row["Nome"]) . '</p><br>';                  // Creazione del paragrafo di descrizione contenente il nome del prodotto corrente.
                        $html_out .= '<p><b>Marca:</b> ' . htmlspecialchars($row["Marca"]) . '</p><br>';                // Creazione del paragrafo di descrizione contenente la marca del prodotto corrente.
                        $html_out .= '<p><b>Descrizione:</b> ' . htmlspecialchars($row["Descrizione"]) . '</p><br>';    // Creazione del paragrafo contenente la descrizione del prodotto corrente.
                        $html_out .= '<p><b>Peso:</b> ' . htmlspecialchars($row["Peso"]) . 'g</p><br>';                 // Creazione del paragrafo contenente il peso del prodotto corrente.
                        $html_out .= '<p><b>Prezzo:</b> ' . htmlspecialchars($row["Prezzo"]) . '€</p><br>';             // Creazione del paragrafo contenente il prezzo del prodotto corrente.
                        $html_out .= '<form method = "POST" action = "tennisShop.php">';                                // Apertura del form necessario per permettere successivamente l'inserimento o la rimozione di un prodotto dai preferiti dell'utente (mediante operazioni sulla tabella "Salvataggi" del database) al momento del click sul bottone ad esso corrispondente (a cui è riservato un singolo form).

                        $iconClassList = "fa fa-heart fa-5x";       // Inizializzazione della variabile "$iconClassList" (utile per contenere la classe da assegnare all'icona contenuta all'interno del bottone necessario per permettere all'utente di aggiungere un prodotto ai preferiti) con la stringa "fa fa-heart fa-5x" (questa classe identifica infatti un icona a forma di cuore ingrandita di 5 volte rispetto alla dimensione normale).

                        $favouriteProductsQuery = "SELECT * FROM Salvataggi WHERE EmailUtente = ? AND CodiceProdotto = ?";                  // Preparazione della query necessaria per verificare se il prodotto corrente (identificato univocamente dal proprio codice) è già salvato nei preferiti dell'utente (identificato univocamente dalla propria email).
                        $favouriteProductsQueryResult = $connection->execute_query($favouriteProductsQuery, [$userEmail, $productCode]);    // Bind dei parametri ed esecuzione vera e propria della query.

                        // Istruzioni da eseguire nel caso in cui la query eseguita ("$query") abbia restituito 1 riga (ovvero nel caso in cui il prodotto corrente sia già salvato nei preferiti dall'utente):
                        if (mysqli_num_rows($favouriteProductsQueryResult) == 1) {
                            $iconClassList .= " favourite";     // Concatenazione della stringa " favourite" alla stringa contenuta all'interno della variabile "$iconClassList", utile per permettere all'utente di visualizzare quali prodotti sono già salvati nei preferiti mediante il riempimento (di colore rosso) dell'icona del cuore corrispondente ad esso all'interno della pagina.
                        }

                        $html_out .= '<br><button class = "addToFavouritesButton"><i class = "' . $iconClassList . '" onclick = "addToFavourites(this)"></i></button>';
                        
                        $html_out .= '</form>';         // Chiusura del form.
                        $html_out .= '</div>';          // Chiusura del blocco di classe "shopArticle" (ovvero il blocco utile per contenere tutti gli elementi necessari per presentare le varie informazioni relative ad un singolo prodotto dello shop).

                        // Controllo del numero contenuto all'interno della variabile "$rowArticleNumber":
                        if ($rowArticleNumber == 3) {
                            // Nel caso in cui il prodotto correntemente analizzato sia il 3° sulla riga, viene inserito un blocco di classe "break" utile per andare a capo all'interno del blocco contenitore "articlesContainer".
                            $html_out .= '<div class = "break"></div>';     // Creazione di un blocco di classe "break" utile per andare a capo all'interno del blocco di classe "articlesContainer".
                            $rowArticleNumber = 0;                          // Azzeramento della variabile "$rowArticleNumber": dopo la creazione di un blocco di classe "articlesContainer", infatti, inizierà una nuova riga.
                        }

                        $formattedProductCode = ltrim($productCode, "0");   // Assegnazione alla variabile "formattedProductCode" della stringa ottenuta dalla rimozione degli zeri antecedenti al valore vero e proprio del codice del prodotto.
                        array_push($productCodes, $formattedProductCode);   // Inserimento della stringa contenuta all'interno della variabile "$formattedProductCode" all'interno dell'array "productCodes".
                    }

                    $html_out .= '</div>';              // Chiusura del blocco di classe "articlesContainer" (ovvero il blocco utile per contenere tutti i sottoblocchi con all'interno i vari prodotti dello shop).

                    echo $html_out;                     // Stampa della stringa contenuta all'interno della variabile "$html_out" (ovvero la stringa ottenuta dalla concatenazione di tutte le stringhe necessarie per creare i vari elementi utili per la presentazione di tutti i prodotti all'interno della pagina).
                }

                // Caso in cui l'utente non ha precedentemente eseguito l'accesso attraverso la pagina di login ("login.php").
                else {
                    header('Location: login.php');      // Reindirizzamento alla pagina di login ("login.php").
                }

            ?>

            <script>

                hideAll();      // Invocazione della funzione "hideAll", utile per nascondere tutti gli elementi contenuti nella sezione "article" della pagina in modo tale da consentire la corretta visualizzazione dell'animazione della barra di avanzamento nella schermata di caricamento della pagina.
                
                document.body.setAttribute("style", "background-color: #000000");           // Impostazione del colore nero per lo sfondo dell'elemento "body" della pagina.

                let progressBarContainerDiv = document.createElement("div");                // Creazione del blocco "progressBarContainerDiv", successivamente necessario per contenere il blocco corrispondente alla barra di caricamento della pagina.
                progressBarContainerDiv.setAttribute("id", "progressBarContainerDiv");      // Assegnazione dell'id "progressBarContainerDiv" al blocco "progressBarContainerDiv" (ovvero il blocco necessario per contenere il sottoblocco corrispondente alla barra di caricamento della pagina). 
                progressBarContainerDiv.className = "progress";                             // Assegnazione della classe "progress" al blocco "progressBarContainerDiv" (ovvero il blocco necessario per contenere il sottoblocco corrispondente alla barra di caricamento della pagina).
                progressBarContainerDiv.setAttribute("style", "position: absolute; top: 43%; left: 15%; width: 70%; height: 8%");       // Impostazione dell'attributo "style" del blocco "progressBarContainerDiv" (ovvero il blocco necessario per contenere il sottoblocco corrispondente alla barra di caricamento della pagina), utile per definirne il posizionamento all'interno della pagina.

                let progressBarDiv = document.createElement("div");                         // Creazione del blocco "progressBarDiv", successivamente necessario per costituire la barra di caricamento della pagina. 
                progressBarDiv.setAttribute("id", "progressBar");                           // Assegnazione dell'id "progressBar" al blocco "progressBarDiv" (ovvero il blocco necessario per costituire la barra di caricamento della pagina).
                let progressBarClasses = ["progress-bar", "progress-bar-striped", "bg-success", "progress-bar-animated"];               // Inizializzazione di un array utile per contenere le stringhe corrispondenti a tutte le classi che dovranno essere assegnate al blocco "progressBarDiv" (ovvero il blocco necessario per costituire la barra di caricamento della pagina). 

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
                progressBarDescription.innerHTML = "Lo shop online è in fase di caricamento...";                    // Impostazione del contenuto testuale del paragrafo "progressBarDescription" (ovvero il paragrafo corrispondente alla descrizione della barra di caricamento della pagina).

                progressBarContainerDiv.appendChild(progressBarDiv);        // Aggiunta del blocco "progressBarDiv" (ovvero il blocco corrispondente alla barra di caricamento della pagina) al blocco "progressBarContainerDiv" (ovvero il blocco necessario per contenere la barra di caricamento della pagina). 
                document.body.appendChild(progressBarContainerDiv);         // Aggiunta del blocco "progressBarContainerDiv" (ovvero il blocco contenente la barra di caricamento della pagina) all'elemento "body" della pagina per permetterne la visualizzazione effettiva (nonchè la successiva animazione della barra di caricamento contenuta al suo interno).
                document.body.appendChild(progressBarDescription);          // Aggiunta del paragrafo "progressBarDescription" (ovvero il paragrafo corrispondente alla descrizione della barra di caricamento della pagina) all'elemento "body" della pagina per permetterne la visualizzazione effettiva.

                var progressBarAnimationSetInterval = setInterval(progressBarAnimation, 1000);      // Invocazione periodica (ogni 1000 millisecondi, ovvero ogni secondo) della funzione Javascript "progressBarAnimation", utile per consentire il progressivo avanzamento della barra di caricamento fino al 100% (una volta raggiunta la fine l'animazione della barra di caricamento lascerà il posto alla visualizzazione del contenuto vero e proprio della pagina).

            </script>

            <script>
                // Invocazione della funzione Javascript utile per assegnare gli ID a ciascun bottone che permette all'utente di aggiungere un prodotto ai preferiti:
                assignIds("addToFavouritesButton", <?php echo json_encode($productCodes) ?>);
            </script>

            <?php

                // Ciclo for necessario per definire le operazioni di interazione con il database che dovranno essere automaticamente eseguite al momento del click su uno dei bottoni che permettono all'utente di aggiungere un prodotto ai preferiti:
                for ($i = 0; $i < mysqli_num_rows($queryResult); $i++) {

                    $currentButtonName = "addToFavouritesButton-" . $productCodes[$i];      // Assegnazione del nome del bottone corrente (formato dalla stringa fissa "addToFavouritesButton-" più il codice del prodotto corrispondente) alla variabile "$currentButtonName".
                    $currentProductCode = substr($currentButtonName, 22);                   // Assegnazione del numero corrispondente al codice del prodotto (ottenuto dalla stringa contenuta nella variabile "$currentButtonName") alla variabile "currentProductCode".

                    $productSelectionQuery = "SELECT * FROM Salvataggi WHERE EmailUtente = ? AND CodiceProdotto = ?";                           // Preparazione della query necessaria per verificare se il prodotto corrente (identificato dal proprio codice) è stato già salvato nei preferiti dell'utente (identificato dalla propria e-mail).
                    $productSelectionQueryResult = $connection->execute_query($productSelectionQuery, [$userEmail, $currentProductCode]);       // Bind dei parametri (ovvero l'email dell'utente, memorizzata nella variabile "$userEmail", ed il codice del prodotto corrente, memorizzato nella variabile "$currentProductCode") ed esecuzione effettiva della query appositamente preparata.

                    // Controllo del numero di righe restituito dall'esecuzione della query "$productSelectionQueryResult":
                    if (mysqli_num_rows($productSelectionQueryResult) == 0) {
                        // Caso in cui l'esecuzione della query "$productSelectionQuery" ha restituito 0 righe (ovvero il prodotto corrente non è già salvato nei preferiti dell'utente):
                        $clickCounter = 0;      // Alla variabile "$clickCounter" viene assegnato il numero 0 (numero pari).
                    }
                    else if (mysqli_num_rows($productSelectionQueryResult) == 1) {
                        // Caso in cui l'esecuzione della query "$productSelectionQuery" ha restituito 1 riga (ovvero il prodotto corrente è già salvato nei preferiti dell'utente):
                        $clickCounter = 1;      // Alla variabile "$clickCounter" viene assegnato il numero 1 (numero dispari).
                    }

                    // Le istruzioni contenute all'interno di queste parentesi graffe verranno eseguite solamente al momento dell'invio del form, ovvero al momento del click su uno dei bottoni (uno per ogni prodotto) che permettono all'utente di aggiungere un prodotto ai preferiti:
                    if (isset($_POST[$currentButtonName])) {

                        // Controllo della arità o disparità del numero contenuto nella variabile "$clickCounter":
                        if ($clickCounter % 2 == 0) {
                            // Caso in cui il numero contenuto all'interno della variabile "$clickCounter" è pari, ovvero il prodotto va salvato nei preferiti dell'utente:
                            $insertQuery = "INSERT INTO Salvataggi VALUES (?, ?)";                                  // Preparazione della query utile per registrare all'interno della tabella "Salvataggi" del database la coppia "utente-prodotto salvato" (unica all'interno della tabella, in quanto queste due informazioni costituiscono, insieme, la chiave primaria della tabella "Salvataggi", nonchè le uniche due colonne di essa).
                            $connection->execute_query($insertQuery, [$userEmail, $currentProductCode]);            // Bind dei parametri (ovvero email dell'utente e codice del prodotto corrente) ed esecuzione effettiva della query utile per registrare all'interno della tabella "Salvataggi" del database la coppia "utente-prodotto salvato" (unica all'interno della tabella, in quanto queste due informazioni costituiscono, insieme, la chiave primaria della tabella "Salvataggi", nonchè le uniche due colonne di essa).
                        }
                        
                        else if ($clickCounter % 2 != 0) {
                            // Caso in cui il numero contenuto all'interno della variabile "$clickCounter" è dispari, ovvero il prodotto va rimosso dai preferiti dell'utente:
                            $deleteQuery = "DELETE FROM Salvataggi WHERE EmailUtente = ? AND CodiceProdotto = ?";   // Preparazione della query utile per rimuovere dalla tabella "Salvataggi" del database la coppia "utente-prodotto salvato" (unica all'interno della tabella, in quanto queste due informazioni costituiscono, insieme, la chiave primaria della tabella "Salvataggi", nonchè le uniche due colonne di essa).
                            $connection->execute_query($deleteQuery, [$userEmail, $currentProductCode]);            // Bind dei parametri (ovvero email dell'utente e codice del prodotto corrente) ed esecuzione effettiva della query utile per rimuovere dalla tabella "Salvataggi" del database la coppia "utente-prodotto salvato" (unica all'interno della tabella, in quanto queste due informazioni costituiscono, insieme, la chiave primaria della tabella "Salvataggi", nonchè le uniche due colonne di essa).
                        }

                        $clickCounter++;    // Incremento del numero contenuto nella variabile "$clickCounter" (se è pari diventerà dispari, mentre se è dispari diventerà pari). 

                        $html_out = '<script>';     // Apertura del tag "script".
                        // Inserimento del codice Javascript necessario per impedire il reinvio involontario del form al momento del ricaricamento della pagina:
                        $html_out .= 'if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href)}';
                        $html_out .= '</script>';   // Chiusura del tag "script".

                        echo $html_out;     // Inserimento all'interno della pagina dello script appena definito, utile per impedire il reinvio involontario del form al momento del ricaricamento della pagina.
                    }
                }

            ?>

            <div id = "dashboardLinkContainer">
                <h2 class = "linkHeading">Controlla i prodotti che hai salvato nella tua area riservata!</h2>
                <br>
                <a href = "dashboard.php"><img id = "shoppingCartIcon" src = "Icons/General/shoppingCart.ico"></a>
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