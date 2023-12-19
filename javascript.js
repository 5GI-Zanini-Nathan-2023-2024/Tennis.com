// Funzione che permette di scrollare la pagina di un certo numero di pixel in orizzontale e in verticale (in base ai due numeri passati come parametri alla funzione stessa):
function indexScroll (x, y) {
    window.scroll(x, y);
}

// Funzione necessaria per aggiungere la classe "displayed" agli elementi visualizzati di volta in volta dall'utente scrollando la pagina, in modo tale da creare l'animazione di comparsa:
function reveal () {
  
    let reveals = document.querySelectorAll(".reveal");

    for (let i = 0; i < reveals.length; i++) {

        let windowHeight = window.innerHeight;
        let elementTop = reveals[i].getBoundingClientRect().top;
        let elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("displayed");
        } else {
            reveals[i].classList.remove("displayed");
        }
    }
}

// Funzione necessaria per controllare se la password inserita dall'utente nel campo input identificato dall'ID "inputConfermaPasswordUtente" corrisponde a quella inserita nel campo input identificato dall'ID "inputPasswordUtente", e in caso negativo, mostrare un opportuno messaggio di avvertimento:
function checkPasswordsEquality () {

    let password = document.getElementById("inputPasswordUtente").value
    let confirmPassword = document.getElementById("inputConfermaPasswordUtente").value;
    let callerInputField = event.target;
    let callerInputFieldID = callerInputField.id;

    let warningText = "Attenzione! Le due password devono corrispondere!";

    if (callerInputFieldID == "inputConfermaPasswordUtente") {
        if (password.length > 0 && confirmPassword != password) {
            document.getElementById("avvertimentoConfermaPasswordUtente").innerHTML = warningText;
        }
        else {
            document.getElementById("avvertimentoConfermaPasswordUtente").innerHTML = "";
        }
    }

    else if (callerInputFieldID == "inputPasswordUtente") {
        if (confirmPassword.length > 0 && password != confirmPassword) {
            document.getElementById("avvertimentoPasswordUtente").innerHTML = warningText;
        }
        else {
            document.getElementById("avvertimentoPasswordUtente").innerHTML = "";
        }
    }
}

// Funzione necessaria per attivare/disattivare la visibilità della password inserita nell'apposito campo input:
function togglePasswordVisibility () {

    var callerID = event.target.id;
    var password;

    if (callerID == "toggleUserPassword") {
        password = document.getElementById("inputPasswordUtente");
    }
    else if (callerID == "toggleUserConfirmPassword") {
        password = document.getElementById("inputConfermaPasswordUtente");
    }
    else if (callerID == "toggleLoanUserPassword") {
        password = document.getElementById("inputPasswordUtentePrestito");
    }

    var parentDiv = password.parentNode;
    var currentEyeIcon = parentDiv.querySelector(':nth-child(4)');

    if (password.type == "password") {

        password.type = "text";

        currentEyeIcon.classList.remove("fa-eye");
        currentEyeIcon.classList.add("fa-eye-slash");
    }

    else if (password.type == "text") {

        password.type = "password";

        currentEyeIcon.classList.remove("fa-eye-slash");
        currentEyeIcon.classList.add("fa-eye");
    }
}

// Funzione richiamata dall'evento "onchange" e necessaria per modificare lo stile dei campi input nel caso in cui le informazioni inserite al loro interno siano errate:
function checkInputFieldValidity () {

    var callerInputField = event.target;
    var parentDiv = callerInputField.parentNode;
    var icon = parentDiv.getElementsByClassName("fa")[1];

    if (callerInputField.checkValidity()) {
        if (parentDiv.classList.contains("errore")) {
            parentDiv.classList.remove("errore");
        }
        if (icon.classList.contains("fa-times")) {
            icon.classList.remove("fa-times");
            icon.classList.add("fa-check");
        }
    }

    else {
        if (!(parentDiv.classList.contains("errore"))) {
            parentDiv.classList.add("errore");
        }
        if (icon.classList.contains("fa-check")) {
            icon.classList.remove("fa-check");
            icon.classList.add("fa-times");
        }
    }
}

// Funzione richiamata dall'evento "oninvalid" e necessaria per modificare lo stile dei campi input nel caso in cui le informazioni inserite al loro interno siano errate:
function styleInputFieldError () {

    var callerInputField = event.target;
    var parentDiv = callerInputField.parentNode;
    var icon = parentDiv.getElementsByClassName("fa")[1];

    if (!(parentDiv.classList.contains("errore"))) {
        parentDiv.classList.add("errore");
    }
    if (icon.classList.contains("fa-check")) {
        icon.classList.remove("fa-check");
        icon.classList.add("fa-times");
    }
}

var path = window.location.pathname;        // Variabile contenente il percorso della pagina visualizzata dall'utente.
var page = path.split("/").pop();           // Variabile contenente il nome (compresa l'estensione) della pagina visualizzata dall'utente.

// Istruzioni da eseguire nel caso in cui la pagina visualizzata dall'utente sia quella nominata "index.html":
if (page == "index.html") {

    // Alla finestra del browser viene associato un event listener: ad ogni scroll della pagina verrà invocata la funzione "reveal" (definita precedentemente) per creare l'animazione di comparsa degli elementi visualizzati di volta in volta dall'utente.
    window.addEventListener("scroll", reveal);

    // Per controllare la posizione dello scroll al momento del caricamento della pagina:
    reveal();
}

// Istruzioni da eseguire nel caso in cui la pagina visualizzata dall'utente sia quella nominata "tennisShop.php":
else if (page == "tennisShop.php") {
    var SHOP_FIRST_LOADING_SENTENCE = "Scopri i migliori articoli sportivi per tennisti...";
    var SHOP_SECOND_LOADING_SENTENCE = "Articoli di tutti i tipi: Racchette, palline, polsini, fasce, cappellini, scarpe, borse, overgrip... ecc.";
    var SHOP_THIRD_LOADING_SENTENCE = "Scegli gli articoli più adatti alle tue esigenze...";
    var SHOP_FOURTH_LOADING_SENTENCE = "Scopri come dare il meglio di te stesso sul campo!";
    var SHOP_FIFTH_LOADING_SENTENCE = "Salva gli articoli che ti interessano maggiormente nel tuo carrello per ritrovarli!";
}

// Istruzioni da eseguire nel caso in cui la pagina visualizzata dall'utente sia quella nominata "dashboard.php":
else if (page == "dashboard.php") {
    var DASHBOARD_FIRST_LOADING_SENTENCE = "Salva i tuoi prodotti dal negozio per ritrovarli qui!";
    var DASHBOARD_SECOND_LOADING_SENTENCE = "Se un prodotto non ti piace più puoi rimuoverlo dalla tua area personale!";
    var DASHBOARD_THIRD_LOADING_SENTENCE = "Caricamento dei tuoi prodotti preferiti in corso...";
    var DASHBOARD_FOURTH_LOADING_SENTENCE = "Ci siamo quasi...";
    var DASHBOARD_FIFTH_LOADING_SENTENCE = "Caricamento completato!";
}

// Funzione necessaria per nascondere tutti gli elementi all'interno dell'article della pagina per consentire la corretta visualizzazione dell'animazione della barra di caricamento:
function hideAll () {
    let article = document.body.getElementsByTagName("article")[0];
    article.setAttribute("style", "display: none");
}

// Funzione utile per realizzare l'animazione associata alla barra di caricamento della pagina:
function progressBarAnimation () {
    
    let progressBar = document.getElementById("progressBar");
    
    let currentProgressBarWidth = parseInt(progressBar.style.width.replace("%",""));
    let newProgressBarWidth = currentProgressBarWidth + 20;

    progressBar.style.width = (String(newProgressBarWidth) + "%");
    progressBar.setAttribute("aria-valuenow", newProgressBarWidth);

    let firstLoadingSentence, secondLoadingSentence, thirdLoadingSentence, fourthLoadingSentence, fifthLoadingSentence;

    // Istruzioni da eseguire nel caso in cui la pagina visualizzata dall'utente sia "tennisShop.php":
    if (page == "tennisShop.php") {
        firstLoadingSentence = SHOP_FIRST_LOADING_SENTENCE;             // Prima frase di descrizione della barra di caricamento della pagina.
        secondLoadingSentence = SHOP_SECOND_LOADING_SENTENCE;           // Seconda frase di descrizione della barra di caricamento della pagina.
        thirdLoadingSentence = SHOP_THIRD_LOADING_SENTENCE;             // Terza frase di descrizione della barra di caricamento della pagina.
        fourthLoadingSentence = SHOP_FOURTH_LOADING_SENTENCE;           // Quarta frase di descrizione della barra di caricamento della pagina.
        fifthLoadingSentence = SHOP_FIFTH_LOADING_SENTENCE;             // Quinta ed ultima frase di descrizione della barra di caricamento della pagina.
    }

    // Istruzioni da eseguire nel caso in cui la pagina visualizzata dall'utente sia "dashboard.php":
    else if (page == "dashboard.php") {
        firstLoadingSentence = DASHBOARD_FIRST_LOADING_SENTENCE;        // Prima frase di descrizione della barra di caricamento della pagina.
        secondLoadingSentence = DASHBOARD_SECOND_LOADING_SENTENCE;      // Seconda frase di descrizione della barra di caricamento della pagina.
        thirdLoadingSentence = DASHBOARD_THIRD_LOADING_SENTENCE;        // Terza frase di descrizione della barra di caricamento della pagina.
        fourthLoadingSentence = DASHBOARD_FOURTH_LOADING_SENTENCE;      // Quarta frase di descrizione della barra di caricamento della pagina.
        fifthLoadingSentence = DASHBOARD_FIFTH_LOADING_SENTENCE;        // Quinta ed ultima frase di descrizione della barra di caricamento della pagina.
    }

    // Switch case in base allo stato di avanzamento della barra di caricamento della pagina:
    switch (newProgressBarWidth) {

        // La barra di caricamento della pagina ha raggiunto il 20%:
        case 20:
            document.getElementById("progressBarDescription").innerHTML = firstLoadingSentence;
            break;
            
        // La barra di caricamento della pagina ha raggiunto il 40%:
        case 40:
            document.getElementById("progressBarDescription").innerHTML = secondLoadingSentence;
            break;

        // La barra di caricamento della pagina ha raggiunto il 60%:
        case 60:
            document.getElementById("progressBarDescription").innerHTML = thirdLoadingSentence;
            break;

        // La barra di caricamento della pagina ha raggiunto l'80%:
        case 80:
            document.getElementById("progressBarDescription").innerHTML = fourthLoadingSentence;
            break;

        // La barra di caricamento della pagina ha raggiunto il 100%:
        case 100:
            document.getElementById("progressBarDescription").innerHTML = fifthLoadingSentence;
            window.clearInterval(progressBarAnimationSetInterval);      // Interruzione dell'invocazione periodica della funzione "progressBarAnimation".
            setTimeout(clearPage, 1000);                                // Invocazione della funzione "clearPage" con un ritardo di 1000 millisecondi (ovvero 1 secondo).
    }
}

// Funzione richiamata alla fine dell'animazione associata alla barra di avanzamento per eliminare quest'ultima e la relativa descrizione e mostrare tutti gli elementi precedentemente nascosti per consentire l'animazione:
function clearPage () {
    document.getElementById("progressBarContainerDiv").remove();
    document.getElementById("progressBarDescription").remove();
    viewAll();
}

// Funzione necessaria per riattivare la visualizzazione di tutti gli elementi contenuti all'interno dell'article della pagina dopo l'animazione della barra di caricamento:
function viewAll () {
    let article = document.body.querySelector("article");   // Estrapolazione dell'elemento "article" dalla pagina.
    let footer = document.body.querySelector("footer");     // Estrapolazione dell'elemento "footer" dalla pagina.
    article.setAttribute("style", "display: block");        // Visualizzazione dell'elemento "article".
    footer.setAttribute("style", "display: block");         // Visualizzazione dell'elemento "footer".
}

/* Funzione utile per assegnare gli attributi identificativi "id" e "name" ai vari bottoni utilizzabili dall'utente per aggiungere o rimuovere un prodotto dai preferiti: */
function assignIds (className, productCodes) {

    let querySelectorAllparameter = "." + className;
    let elements = document.querySelectorAll(querySelectorAllparameter);

    for (let i = 0; i < elements.length; i++) {
        let currentString = className + "-" + productCodes[i];
        elements[i].setAttribute("id", currentString);
        elements[i].setAttribute("name", currentString);
    }
}

/* Funzione utile per modificare il colore dell'icona a forma di cuore corrispondente al prodotto che l'utente intende aggiungere o rimuovere dai preferiti: */
function addToFavourites (addToFavouritesIconClicked) {

    let classList = addToFavouritesIconClicked.classList;

    if (!classList.contains("favourite")) {
        addToFavouritesIconClicked.classList.add("favourite");
    }
    else if (classList.contains("favourite")) {
        addToFavouritesIconClicked.classList.remove("favourite");
    }
}

/* Funzione utile per rimuovere dalla pagina "dashboard.php" la sezione contenente gli articoli salvati nei preferiti e il bottone utile per rimuovere tutti gli articoli salvati non appena l'utente preme quest'ultimo pulsante: */
function emptyFavourites () {
    document.getElementById("articlesContainer").remove();          // Eliminazione dell'elemento con id "articlesContainer" (ovvero il contenitore di tutti i prodotti dello shop visualizzabili e salvabili dall'utente) dalla pagina.
    document.getElementById("emptyFavouritesButton").remove();      // Eliminazione dell'elemento con id "emptyFavouritesButton" (ovvero il bottone utile per permettere all'utente di rimuovere contemporaneamnete tutti i prodotti dai preferiti) dalla pagina.
}