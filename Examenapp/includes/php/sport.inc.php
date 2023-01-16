<?php
//Cheat phpstorm so you don't get a error on $pdo
/* @var PDO $pdo */

$stmt = $pdo->prepare("SELECT * FROM sport");
$stmt->execute([]);
$sport = $stmt->fetchALL();


//Action if you click button with name="createPost"
if (isset($_POST['createPost'])) {
    $sport = filter_var($_POST["postSport"], FILTER_SANITIZE_STRING);
    $docent = filter_var($_POST["postDocent"], FILTER_SANITIZE_STRING);
    $deelnemers = filter_var($_POST["postDeelnemers"], FILTER_SANITIZE_STRING);

    //Inserting input into database
    $stmt = $pdo->prepare('INSERT INTO sport(sport, docent, deelnemers) VALUES(?, ?, ?)');
    $stmt->execute([$sport, $docent, $deelnemers]);
    header('Location: sport.php');
}
