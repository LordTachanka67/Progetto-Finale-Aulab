import './bootstrap';
import 'bootstrap';
import './greetingMessage';
import './preferiti.js';

document.addEventListener("DOMContentLoaded", function() {
    // Genera una chiave univoca basata sull'URL della pagina
    const scrollKey = `scrollPosition_${window.location.pathname}`;

    // Ripristina la posizione di scorrimento quando la pagina viene caricata
    if (sessionStorage.getItem(scrollKey) !== null) {
        window.scrollTo(0, parseInt(sessionStorage.getItem(scrollKey)));
        sessionStorage.removeItem(scrollKey); // Rimuove la posizione di scorrimento dopo averla usata una volta
    }

    // Salva la posizione di scorrimento quando viene cliccato il button con id favourites
    document.getElementById("favourites").addEventListener("click", function() {
        sessionStorage.setItem(scrollKey, window.scrollY);
    });
});






import 'aos/dist/aos.css'; // Importa il file CSS di AOS


AOS.init();