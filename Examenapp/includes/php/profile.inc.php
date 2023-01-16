<?php
//Cheat phpstorm so you don't get a error on $userId
/* @var stdClass[] $userId */
//Cheat phpstorm so you don't get a error on $pdo
/* @var PDO $pdo */

//Action if you click button with name="edit"
if (isset($_POST['edit'])) {

    //Filter so you can't do a sql injection
    $userName = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $userEmail = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $repeatPassword = filter_var($_POST["repeatPassword"], FILTER_SANITIZE_STRING);
    $oldPassword = filter_var($_POST["password"], FILTER_SANITIZE_STRING);



    //Check if password isn't to short
    if(strlen($password) < 8){
        $shortPassword = "Je wachtwoord is te klein het moet minimaal 8 characters bevatten";
        return;
    }
    //Check if input fields are empty
    if(empty($username) || empty($userEmail) || empty($password)  || empty($repeatPassword)) {
        $inputFields = "Alle velden moeten zijn ingevuld om te kunnen registreren!";
    }
    //Check if password is the same as password repeat
    if ($password !== $repeatPassword) {
        $wrongRepeat = "De wachtwoorden komen niet overheen";
    }
    //Take email out of database
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare("SELECT * from users WHERE email = ?");
        $stmt->execute([$userEmail]);
        $totalUsers = $stmt->rowCount();

        //Check if email is already taken
        if ($totalUsers > 0) {
            $emailTaken = "Email is al in gebruik";
        } else {
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET name=?, email=?, password=? WHERE id=?");
            $stmt->execute([$userName, $userEmail, $passwordHashed, $userId]);
            header('Location: profile.php');
        }
    }


}




