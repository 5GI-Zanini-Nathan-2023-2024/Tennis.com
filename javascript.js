function indexPageLoading () {
    
}

function indexScroll (x, y) {
    window.scroll(x, y);
}

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

window.addEventListener("scroll", reveal);

// Per controllare la posizione dello scroll al momento del caricamento della pagina:
reveal();