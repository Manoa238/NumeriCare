const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

// Vérifie si l'écran est en mode mobile (largeur maximale de 767px)
if (window.innerWidth <= 767) {
    container.classList.add("active"); // Affiche le formulaire d'inscription par défaut
} else {
    // Ajoute les listeners pour la bascule sur les écrans plus grands
    if (registerBtn && loginBtn && container) {
        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    }
}