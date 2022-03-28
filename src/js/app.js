document.addEventListener('DOMContentLoaded', function() {
    eventListener();
    darkMode();
});

function eventListener() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', responsiveNavegation);
}

function responsiveNavegation() {
    const navigation = document.querySelector('.navigation');
    //Toogle add and delete
    navigation.classList.toggle('show');
}

function darkMode() {
    const darkModeButton = document.querySelector('.dark-mode-button');
    darkModeButton.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}