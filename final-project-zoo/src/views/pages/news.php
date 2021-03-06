<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link href="../css/basic.css" rel="stylesheet" type="text/css">
    <link href="../css/page-header.module.css" rel="stylesheet" type="text/css">
    <link href="../css/nav-menu.module.css" rel="stylesheet" type="text/css">
    <link href="../css/parallax.module.css" rel="stylesheet" type="text/css">
    <link href="../css/divider.module.css" rel="stylesheet" type="text/css">
    <link href="../css/utility.module.css" rel="stylesheet" type="text/css">
    <link href="../css/flex.module.css" rel="stylesheet" type="text/css">
    <link href="../css/news-tile.module.css" rel="stylesheet" type="text/css">
    <link href="../css/backgrounds.module.css" rel="stylesheet" type="text/css">
    <link href="../css/modal.module.css" rel="stylesheet" type="text/css">
</head>
<body>
<header id="header" class="page-header">
    <h1>
        <a href="home.php">Animal ZOO</a>
    </h1>
    <div>We love animals</div>
</header>
<nav class="menu" id="main-menu">
    <button class="menu-toggle" id="toggle-menu"></button>
    <div class="menu-dropdown">
        <ul class="nav-menu">
            <li><a href="news.php">News</a></li>
            <li><a href="population.php">Population</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
</nav>
<div class="divider divider--md-and-lg"></div>
<div class="parallax">
    <div class="parallax__background parallax__background--gorilla-reading"></div>
    <div class="parallax__body">
        <h1>News</h1>
        <p>Latest news and events from the animal world in ZOO</p>
    </div>
</div>
<div class="divider"></div>
<div class="bg-stone">
    <div style="padding: 2em 4em">
        <div id="news-container" class="flex-container">
            <?php
            require_once '../../business/strategy/UserDao.php';

            $userDao = new UserDao();

            $user = $userDao->findByUsernameOrEmailAndPassword('deniscitaku');
            $userName = $user->getUsername();

            echo '<section class="news-tile--flex box-shadow opens-modal">
                <img src="../../static/images/background.jpg"/>
                <div>'.$user->getUsername().'</div>
                <p class="news-tile__date">October 17, 2019</p>
                <p class="display-none">'.$user->getEmail().'</p>
            </section>';
            ?>
            <section class="news-tile--flex box-shadow opens-modal">
                <img src="../../static/images/background.jpg"/>
                <div>Election Decision</div>
                <p class="news-tile__date">October 17, 2019</p>
                <p class="display-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
            </section>
            <section class="news-tile--flex box-shadow opens-modal">
                <img src="../../static/images/background.jpg"/>
                <div>Public announcement</div>
                <p class="news-tile__date">December 10, 2019</p>
                <p class="display-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
            </section>
            <section class="news-tile--flex box-shadow opens-modal">
                <img src="../../static/images/background.jpg"/>
                <div>Zoo - Financial Report</div>
                <p class="news-tile__date">February 20, 2020</p>
                <p class="display-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                    dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
            </section>
        </div>
    </div>
</div>
<footer>
    <div class="contact">
        <div class="contact__info">
            <div>CONTACT INFO</div>
            <div><b>Email:</b> zoo@animal-zoo.com</div>
            <div><b>Phone:</b> +383 46 180 922</div>
            <div><b>Fax:</b> 3116-657</div>
            <div><b>Address:</b>Some address, City, 10500, Country</div>
        </div>
        <div class="contact__social-media">
            <img src="../../static/images/facebook.png">
            <img src="../../static/images/twitter.png">
            <img src="../../static/images/you-tube.png">
        </div>
    </div>
</footer>
<div class="modal" id="modal">
    <div class="modal__backdrop"></div>
    <div class="modal__body">
        <button class="modal__close" id="close">close</button>
        <h2 class="modal__header"></h2>
        <h5></h5>
        <p></p>
    </div>
</div>
<script src="../../js/toggleMenu.js"></script>
<script src="../../js/modal.js"></script>
</body>
</html>
