<?php
//Cheat phpstorm so you don't get a error on $user
/* @var stdClass[] $user */
//Cheat phpstorm so you don't get a error on $pdo
/* @var PDO $pdo */

require('./includes/php/header.inc.php');

//Action only possible if user is admin(1)
if ($user->role_id == "1") {
    $role_id = $_POST['userInfo'];
    $targetUserId = $_POST['targetUserId'];

    //Action if you click button with name="superEdit"
    if (isset($_POST['superEdit'])) {
        $stmt = $pdo->prepare('UPDATE users SET role_id = ? WHERE id = ?');
        $stmt->execute([$role_id, $targetUserId]);

    //Action if you click button with name="superDelete"
    } elseif (isset($_POST['superDelete'])) {
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$targetUserId]);
    }

    header('Location: index.php');
}


