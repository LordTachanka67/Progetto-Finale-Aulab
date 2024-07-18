function updateGreeting() {
    const greetingElement = document.getElementById('greeting')
    const language = document.getElementById('UsedLanguage');

    const currentHour = new Date().getHours();

    let greetingMessage;
    switch (language.textContent) {
        case 'IT':
            if (currentHour >= 5 && currentHour < 12) {
                greetingMessage = 'Buongiorno';
            } else if (currentHour >= 12 && currentHour < 18) {
                greetingMessage = 'Buon pomeriggio ';
            } else {
                greetingMessage = 'Buonasera ';
            }
            break;

        case 'EN':
            if (currentHour >= 5 && currentHour < 12) {
                greetingMessage = 'Good morning';
            } else if (currentHour >= 12 && currentHour < 18) {
                greetingMessage = 'Good afternoon';
            } else {
                greetingMessage = 'Good evening';
            }
            break;

        case 'ES':
            if (currentHour >= 5 && currentHour < 12) {
                greetingMessage = 'Buenos días';
            } else if (currentHour >= 12 && currentHour < 18) {
                greetingMessage = 'Buenas tardes';
            } else {
                greetingMessage = 'Buenas noches';
            }
            break;
    }



    greetingElement.textContent = greetingMessage;


}

// Esegui la funzione per aggiornare il messaggio quando la pagina viene caricata
updateGreeting();

