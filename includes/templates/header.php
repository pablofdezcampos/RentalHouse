<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rental House</title>
        <link rel="stylesheet" href="build/css/app.css">
    </head>

    <body>

        <header class="header <?php echo isset($start) ? 'start' : ''; ?>">
            <div class="container container-header">
                <div class="bar">
                    <a href="/">
                        <img src="build/img/logo.svg" alt="Logo of Rental House">
                    </a>

                    <!-- Menu for mobile screen -->
                    <div class="mobile-menu">
                        <img src="build/img/barras.svg" alt="Icon Responsive Menu">
                    </div>

                    <div class="rigth">
                        <img class="dark-mode-button" src="build/img/dark-mode.svg" alt="Icon of dark mode">
                        <nav class="navigation">
                            <a href="us.php">About Us</a>
                            <a href="adverts.php">Adverts</a>
                            <a href="blog.php">Blog</a>
                            <a href="contact.php">Contact</a>
                        </nav>
                    </div>
                </div>
            </div>
        </header>