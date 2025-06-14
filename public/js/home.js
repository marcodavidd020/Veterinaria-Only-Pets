const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

// Aplicar tema inmediatamente para evitar parpadeo
(function() {
    const savedTheme = localStorage.getItem('darkMode');
    if (savedTheme === 'true') {
        document.body.classList.add('dark-theme-variables');
    }
})();

// abrir desplegable
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

// cerrar desplegable
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

// Función para aplicar el tema
function applyTheme(isDark) {
    if (isDark) {
        document.body.classList.add('dark-theme-variables');
        themeToggler.querySelector('span:nth-child(1)').classList.remove('active');
        themeToggler.querySelector('span:nth-child(2)').classList.add('active');
    } else {
        document.body.classList.remove('dark-theme-variables');
        themeToggler.querySelector('span:nth-child(1)').classList.add('active');
        themeToggler.querySelector('span:nth-child(2)').classList.remove('active');
    }
}

// Cargar tema guardado al iniciar la página y sincronizar iconos
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('darkMode');
    const isDark = savedTheme === 'true';
    
    // Solo actualizar los iconos, el tema ya se aplicó arriba
    if (themeToggler) {
        if (isDark) {
            themeToggler.querySelector('span:nth-child(1)').classList.remove('active');
            themeToggler.querySelector('span:nth-child(2)').classList.add('active');
        } else {
            themeToggler.querySelector('span:nth-child(1)').classList.add('active');
            themeToggler.querySelector('span:nth-child(2)').classList.remove('active');
        }
    }
});

// cambiar tema y guardarlo
themeToggler.addEventListener('click', () => {
    const isDarkMode = document.body.classList.contains('dark-theme-variables');
    const newTheme = !isDarkMode;
    
    // Aplicar el nuevo tema
    applyTheme(newTheme);
    
    // Guardar en localStorage
    localStorage.setItem('darkMode', newTheme.toString());
})