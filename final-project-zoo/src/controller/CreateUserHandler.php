<?php
require_once '../business/strategy/UserDao.php';
require_once '../utils/Redirect.php';

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['password'];
$user = new User();
$user->setEmail($email);
$user->setFullName($fullName);
$user->setPassword($password);

$userDao = new UserDao();
$foundUser = $userDao->findByUsernameOrEmail($email);

$usernameFoundErrorMsg = '';

if (isset($foundUser)) {
    $usernameFoundErrorMsg = 'A user with this email already exists';
    echo "<script type='text/javascript'>alert('$usernameFoundErrorMsg');
                window.location.href='/web-engineering/final-project-zoo/src/views/pages/login-register.php'</script>";
    redirect('login-register.php');
} else {
    $userDao->insert($user);
    session_start();
    $_SESSION['user'] = serialize($userDao->findByUsernameOrEmail($email));
    redirect('home.php');
}
