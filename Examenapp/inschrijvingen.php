<?php
/* @var stdClass[] $userId */
/* @var PDO $pdo */

require('./includes/php/header.inc.php');
require('./includes/html/uitschrijvenwarn.inc.html');

$stmt = $pdo->prepare("SELECT s.id, s.sport, s.docent, s.deelnemers FROM sport s JOIN inschrijvingen i ON s.id=i.idsport");
$stmt->execute([]);
$ins = $stmt->fetchALL();


if (empty($ins)) {
    $emptyIns = "Je staat nog niet ingeschreven voor een sport!";
}

if (isset($_POST['deleteIns'])) {
    $stmt = $pdo->prepare("DELETE FROM inschrijvingen WHERE idusers = ?");
    $stmt->execute([$userId]);
    header('Location: sport.php');
}

?>

<div class="container">
    <?php if (isset($emptyIns)) { ?>
        <div class="p-3">
            <div class="card">
                <div class="card-header bg-light mb-3 text-danger"><?php echo $emptyIns ?></div>
                <div class="card-body">
                    <a class="btn btn-success btn-block" href="sport.php">Klik hier voor de pagina met alle sporten</a>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php foreach ($ins

                   as $inschrijving) { ?>
        <div class="p-3">
            <div class="card">
                <div class="card-header bg-light mb-3"><?php echo $inschrijving->sport ?></div>
                <div class="card-body">
                    <p>Docent: <?php echo $inschrijving->docent ?></p>
                    <?php if ($inschrijving->deelnemers > 0) { ?>
                        <p>Aantal deelnemers: <?php echo $inschrijving->deelnemers ?></p>
                    <?php } ?>
                    <button type="button" class="btn btn-danger btn-block btnModal" data-toggle="modal"
                            data-target="#Uitschrijven">Uitschrijven
                    </button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php require('./includes/php/footer.inc.php'); ?>
