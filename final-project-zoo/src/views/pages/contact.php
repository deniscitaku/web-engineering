<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link href="../css/basic.css" rel="stylesheet" type="text/css">
    <link href="../css/page-header.module.css" rel="stylesheet" type="text/css">
    <link href="../css/nav-menu.module.css" rel="stylesheet" type="text/css">
    <link href="../css/parallax.module.css" rel="stylesheet" type="text/css">
    <link href="../css/divider.module.css" rel="stylesheet" type="text/css">
    <link href="../css/backgrounds.module.css" rel="stylesheet" type="text/css">
    <link href="../css/wood-header.css" rel="stylesheet" type="text/css">
    <link href="../css/utility.module.css" rel="stylesheet" type="text/css">
    <link href="../css/form.module.css" rel="stylesheet" type="text/css">
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
<main class="bg-stone--bottom-animals">
    <div class="wood-header">
        <img src="../../static/images/work-hours-bg.png">
        <div class="wood-header__content">
            <h2 class="primary-color">Contact Us</h2>
        </div>
    </div>
    <div>
        <form class="form" style="margin: 2em auto 30vh;">
            <div id="full-name-input" class="input-group">
                <input class="valid-name" type="text" required/>
                <label>Name</label>
                <span class="bar"></span>
                <span class="error"></span>
            </div>
            <div id="email-input" class="input-group">
                <input class="valid-email" type="text" required/>
                <label>Email</label>
                <span class="bar"></span>
                <span class="error"></span>
            </div>
            <div id="message-input" class="input-group">
                <textarea type="textarea" rows="5" required></textarea>
                <label>Message</label>
                <span class="bar"></span>
                <span class="error"></span>
            </div>
            <div class="btn-box">
                <button id="submit"
                        class="btn btn-submit"
                        type="button"
                        onclick="
                            validateName('full-name-input');
                        validateEmail('email-input');
                        validateLength('message-input', 10, 255);
                        ">submit
                </button>
            </div>
        </form>
    </div>
</main>
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
<script src="../../js/form-validation.js"></script>
</body>
</html>