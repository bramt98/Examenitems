<?php
//Cheat phpstorm so you don't get a error on $userId
/* @var stdClass[] $userId */
//Cheat phpstorm so you don't get a error on $pdo
/* @var PDO $pdo */

if (isset($_SESSION['userId'])) {

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();


//role name's: 1 = Admin , 2 = Docent, 3 = Student
    if ($user->role_id == "3") {
        $message = "Je bent ingelogd als student";
    } elseif ($user->role_id == "2") {
        $message = "Je bent ingelogd als docent";
    } elseif ($user->role_id == "1") {
//Only a admin(1) can add a docent(2)
        require('adddocent.php');
        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute([]);
        $users = $stmt->fetchAll();
    }
}


