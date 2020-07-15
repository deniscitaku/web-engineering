<?php

require_once __DIR__ . '/../business/strategy/UserDao.php';
require_once __DIR__ . '/../utils/Redirect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_destroy();
    $redirectionUrl = htmlspecialchars(get_url('admin/dashboard.php'));
    root_redirect($redirectionUrl);
} else {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $desiredLocation = htmlspecialchars($_GET['location']);

    if (isset($username) && isset($password)) {
        $userDao = new UserDao();
        $user = $userDao->findByUsernameOrEmailAndPassword($username, $password);

        if ($user && isset($user)) {
            $_SESSION['user'] = serialize($user);
            if (!empty($desiredLocation)) {
                root_redirect($desiredLocation);
            } else {
                redirect('home.php');
            }
        } else {
            $_SESSION['user'] = null;
            redirect("login-register.php");
        }
    }
}