<?php

require_once(__DIR__ . '/../business/strategy/NewsDao.php');
require_once(__DIR__ . '/../business/entity/News.php');
require_once(__DIR__ . '/../business/entity/User.php');
require_once(__DIR__ . '/../utils/Redirect.php');

session_start();

$user = unserialize($_SESSION['user']);
$newsDao = new NewsDao();

if (isset($_POST['delete'])) {
    handleDelete($newsDao);
} elseif (isset($_POST['insert'])) {
    handleInsertion($newsDao, $user);
} elseif (isset($_POST['update'])) {
    handleUpdate($newsDao, $user);
}

function handleInsertion($newsDao, $user)
{
    $new = new News();
    $imagePath = storeImageAndGetPath();
    $new->setTitle($_POST["title"]);
    $new->setContent($_POST["content"]);
    $new->setImage($imagePath);
    $new->setCreatedBy($user->getId());
    $new->setUpdatedBy($user->getId());

    $newsDao->insert($new);

    redirect('admin/dashboard.php');
}


function handleDelete($newsDao)
{
    $newsDao->delete($_POST['id']);

    redirect('admin/dashboard.php');
}

function handleUpdate($newsDao, $user)
{
    $new = new News();
    $imagePath = storeImageAndGetPath();
    $new->setId($_POST['id']);
    $new->setTitle($_POST["title"]);
    $new->setContent($_POST["content"]);
    $new->setImage(empty($imagePath) ? null : $imagePath);
    $new->setUpdatedBy($user->getId());

    $newsDao->update($new);

    redirect('admin/dashboard.php');
}

function storeImageAndGetPath()
{
    if (empty(basename($_FILES["image"]["name"]))) {
        return null;
    }

    $target_dir = "../static/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file)) {
        return '/web-engineering/final-project-zoo/src/static/' . $target_file;
    }

// Check file size
    if ($_FILES["image"]["size"] > 1000000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        //echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //echo "Sorry, there was an error uploading your file.";
        }
    }

    return $uploadOk == 0 ? null : '/web-engineering/final-project-zoo/src/static/' . $target_file;
}