<?php
//Cheat phpstorm so you don't get a error on $sport
/* @var stdClass[] $sport */
//Cheat phpstorm so you don't get a error on $pdo
/* @var PDO $pdo */

//Creating variable $idSport with input value="$viewsport->id" meaning of value is the id of sport in the database
$idSport = (int)($_POST['submit'] ?? null);
//Creating variable $idUser with input value="$user->id" meaning of value is the id of user in the database
$idUser = (int)($_POST['idUser'] ?? null);


foreach ($sport as $viewsport) {
    //Check if the id of sport is equal to the id sport of input value="$viewsport->id"
    if ($idSport === $viewsport->id) {
        $stmt = $pdo->prepare("SELECT * from inschrijvingen WHERE idusers = ?");
        $stmt->execute([$idUser]);
        $totalUsers = $stmt->rowCount();
        //Check if user already registered for a sport
        if ($totalUsers > 0) {
            $errorIns = "Je kunt maar op een sport staan ingeschreven!";
            //If user didn't already registered for a sport put registration into the database
        } else {
            $stmt = $pdo->prepare("INSERT into inschrijvingen(idsport, idusers) VALUES(?, ?)");
            $stmt->execute([$idSport, $idUser]);
            header('Location: inschrijvingen.php');
        }
    }
}



