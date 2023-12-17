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

var path = window.location.pathname;
var page = path.split("/").pop();

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

// Funzione utile per realizzare l'animazione associata alla barra di caricamento della pagina:
function progressBarAnimation () {
    
    let progressBar = document.getElementById("progressBar");
    
    let currentProgressBarWidth = parseInt(progressBar.style.width.replace("%",""));
    let newProgressBarWidth = currentProgressBarWidth + 20;

    progressBar.style.width = (String(newProgressBarWidth) + "%");
    progressBar.setAttribute("aria-valuenow", newProgressBarWidth);

    let firstLoadingSentence, secondLoadingSentence, thirdLoadingSentence, fourthLoadingSentence, fifthLoadingSentence;

    if (page == "tennisShop.php") {
        firstLoadingSentence = SHOP_FIRST_LOADING_SENTENCE;
        secondLoadingSentence = SHOP_SECOND_LOADING_SENTENCE;
        thirdLoadingSentence = SHOP_THIRD_LOADING_SENTENCE;
        fourthLoadingSentence = SHOP_FOURTH_LOADING_SENTENCE;
        fifthLoadingSentence = SHOP_FIFTH_LOADING_SENTENCE;
    }

    else if (page == "dashboard.php") {
        firstLoadingSentence = DASHBOARD_FIRST_LOADING_SENTENCE;
        secondLoadingSentence = DASHBOARD_SECOND_LOADING_SENTENCE;
        thirdLoadingSentence = DASHBOARD_THIRD_LOADING_SENTENCE;
        fourthLoadingSentence = DASHBOARD_FOURTH_LOADING_SENTENCE;
        fifthLoadingSentence = DASHBOARD_FIFTH_LOADING_SENTENCE;
    }

    switch (newProgressBarWidth) {

        case 20:
            document.getElementById("progressBarDescription").innerHTML = firstLoadingSentence;
            break;
            
        case 40:
            document.getElementById("progressBarDescription").innerHTML = secondLoadingSentence;
            break;

        case 60:
            document.getElementById("progressBarDescription").innerHTML = thirdLoadingSentence;
            break;

        case 80:
            document.getElementById("progressBarDescription").innerHTML = fourthLoadingSentence;
            break;

        case 100:
            document.getElementById("progressBarDescription").innerHTML = fifthLoadingSentence;
            window.clearInterval(progressBarAnimationSetInterval);
            setTimeout(clearPage, 1500);
    }
}

// Funzione richiamata alla fine dell'animazione associata alla barra di avanzamento per eliminare quest'ultima e la relativa descrizione:
function clearPage () {
    document.getElementById("progressBarContainerDiv").remove();
    document.getElementById("progressBarDescription").remove();
}

/* Funzione utile per assegnare gli attributi identificativi "id" e "name" ai : */
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
    document.getElementById("articlesContainer").remove();
    document.getElementById("emptyFavouritesButton").remove();
}