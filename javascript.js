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

// Alla finestra del browser viene associato un event listener: ad ogni scroll della pagina verrà invocata la funzione "reveal" (definita precedentemente) per creare l'animazione di comparsa degli elementi visualizzati di volta in volta dall'utente.
window.addEventListener("scroll", reveal);

// Per controllare la posizione dello scroll al momento del caricamento della pagina:
reveal();