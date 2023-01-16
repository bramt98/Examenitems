<?php

session_start();

if (isset($_SESSION['userId'])) {
    require('./config/db.php');

    $userId = $_SESSION['userId'];

    require('./includes/php/role.inc.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Title</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-purple">
    <a class="navbar-brand" href="#"><b class="text-orange">RIJN</b><b class="text-white">IJSSEL</b></a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
<!--        Only visible if user is logged in-->
        <?php if (isset($user)) { ?>
            <li class="nav-item"><a class="nav-link text-white" href="sport.php">Overzicht sporten</a></li>
<!--            Only visible if user is logged in as student(3)-->
            <?php if ($user->role_id == "3") { ?>
                <li class="nav-item"><a class="nav-link text-white" href="inschrijvingen.php">Overzicht
                        inschrijvingen</a></li>
            <?php }
//            Only visible if user is logged in as docent(3)
            if ($user->role_id == "2") { ?>
                <li class="nav-item"><a class="nav-link text-white" href="profile.php">Profiel</a></li>
            <?php } ?>
            <li class="nav-item"><a class="nav-link text-white" href="./includes/php/logout.inc.php">Uitloggen</a></li>
<!--        Only visible if user is logged out    -->
        <?php } else { ?>
            <li class="nav-item"><a class="nav-link text-white" href="register.php">Registreer</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="login.php">Login</a></li>
        <?php } ?>
    </ul>
</nav>

