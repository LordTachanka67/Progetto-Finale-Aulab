function updateGreeting() {
    const greetingElement = document.getElementById('greeting');
    const currentHour = new Date().getHours();
    
    let greetingMessage;
    
    if (currentHour >= 5 && currentHour < 12) {
        greetingMessage = 'Buongiorno';
    } else if (currentHour >= 12 && currentHour < 18) {
        greetingMessage = 'Buon pomeriggio ';
    } else {
        greetingMessage = 'Buonasera ';
    }
    
    greetingElement.textContent = greetingMessage;
}

// Esegui la funzione per aggiornare il messaggio quando la pagina viene caricata
updateGreeting();

