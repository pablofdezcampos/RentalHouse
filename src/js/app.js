document.addEventListener('DOMContentLoaded', function() {
    eventListener();
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