const preferiti = document.getElementById('preferiti');

function addFavorite() {
    preferiti.classList.toggle('bi-heart-fill')
    preferiti.classList.toggle('bi-heart')
}

preferiti.addEventListener('click', addFavorite);