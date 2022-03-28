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
    //Preferences
    const themePreferences = window.matchMedia('(prefers-color-scheme: dark)');
    if (themePreferences) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.remove('dark-mode');
    }

    //Read user preferences and put the mode
    themePreferences.addEventListener('change', function() {
        if (themePreferences) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.remove('dark-mode');
        }
    });

    //Login Button
    const darkModeButton = document.querySelector('.dark-mode-button');
    darkModeButton.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}