<?php
include_once '../../../business/entity/User.php';
include_once '../../../utils/Redirect.php';

session_start();
$user = unserialize($_SESSION['user']);

if (empty($user)) {
    redirect('login-register.php?location=' . urlencode($_SERVER['REQUEST_URI']));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="../../css/basic.css" rel="stylesheet" type="text/css">
    <link href="../../css/page-header.module.css" rel="stylesheet" type="text/css">
    <link href="../../css/backgrounds.module.css" rel="stylesheet" type="text/css">
    <link href="../../css/divider.module.css" rel="stylesheet" type="text/css">
    <link href="../../css/grid.module.css" rel="stylesheet" type="text/css">
    <link href="../../css/news-tile.module.css" rel="stylesheet" type="text/css">
    <link href="../../css/utility.module.css" rel="stylesheet" type="text/css">
    <link href="../../css/create-new-tile.module.css" rel="stylesheet" type="text/css">
    <link href="../../css/form-modal.css" rel="stylesheet" type="text/css">
    <link href="../../css/form.module.css" rel="stylesheet" type="text/css">
</head>
<body>
<header class="page-header">
    <h1>
        <a href="dashboard.php">Admin Dashboard</a>
    </h1>
    <form method="post" action="../../../controller/UserLoginSession.php">
        <button class="primary-button" style="height: 4em; margin-top: 1.5em">Log uot</button>
    </form>
</header>
<div class="divider"></div>
<div class="bg-stone">
    <div class="grid-container--md">
        <?php
        require_once '../../../business/strategy/NewsDao.php';

        $newsDao = new NewsDao();
        $allNews = $newsDao->findAll();
        foreach ($allNews as $news) {
            echo '<section class="news-tile--grid opens-modal--edit">
            <input hidden name="news-id" value="' . $news->getId() . '" type="text"/>
            <div class="news-tile--grid__edit-overlay">
                <a href="#"><i class="fa fa-pencil fa-5x"></i></a>
            </div>
            <img src="' . $news->getImage() . '"/>
            <div>' . $news->getTitle() . '</div>
            <p>' . $news->getFormattedCreatedOn() . '</p>
            <p>' . $news->getContent() . '</p>
        </section>';
        }
        ?>
        <div id="opens-modal--create" class="create-new-tile--grid">
            <div/>
        </div>
    </div>
</div>
<div class="form-modal" id="form-modal">
    <div class="form-modal__backdrop"></div>
    <div class="form-modal__body">
        <div class="form-modal__header">News</div>
        <button class="form-modal__close" id="form-close">close</button>
        <form id="insert-news-form" action="../../../controller/NewsActionHandler.php" class="form"
              style="margin: 2em auto"
              method="post" enctype="multipart/form-data">
            <input id="id-input" name="id" type="text" hidden/>
            <div id="title-group" class="input-group">
                <input id="title-input" name="title" class="valid-title" type="text" required/>
                <label>Title</label>
                <span class="bar"></span>
                <span class="error"></span>
            </div>
            <div id="content-group" class="input-group">
                <textarea id="content-input" name="content" type="textarea" rows="5" required></textarea>
                <label>Content</label>
                <span class="bar"></span>
                <span class="error"></span>
            </div>
            <div id="image-group">
                <label>Image</label>
                <input name="image" type="file">
            </div>
            <div class="btn-box">
                <input id="btnInsert"
                       name="insert"
                       class="btn btn-submit"
                       type="submit"
                       value="Save"
                       style="display: none"
                       onclick="submitAfterValidation('insert-news-form',
                        [
                            () => validateLength('title-group', 5, 50),
                             () => validateLength('content-group', 5, 255)
                             ])"
                />
                <input id="btnUpdate"
                       name="update"
                       class="btn btn-submit"
                       type="submit"
                       value="Save"
                       style="display: none"
                       onclick="submitAfterValidation('insert-news-form',
                        [
                            () => validateLength('title-group', 5, 50),
                             () => validateLength('content-group', 5, 255)
                             ])"
                />
                <input id="btnDelete"
                       name="delete"
                       class="btn btn-delete"
                       type="submit"
                       value="Delete"
                       style="display: none"
                />
            </div>
        </form>
    </div>
</div>
<script src="../../../js/form-modal.js"></script>
<script src="../../../js/form-validation.js"></script>
</body>
</html>
