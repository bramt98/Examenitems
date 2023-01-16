<?php
/* @var stdClass[] $user */
/* @var stdClass[] $sport */

require('./includes/php/header.inc.php');
require('./includes/php/sport.inc.php');

// Only requires if user role is admin(1) or docent(2)
if ($user->role_id == "1" || $user->role_id == "2") {
    require('./includes/html/newsport.inc.html');
}

// Only requires if user role is student(1)
if ($user->role_id == "3") {
    require('./includes/php/registersport.inc.php');
    require('./includes/html/inschrijvenwarn.inc.html');
}

?>


<div class="container p-5">
    <div class="row">
        <div class="col-sm-12 ml-2 ">
            <?php if (isset($errorIns)) { ?>
                <div class="card text-white bg-danger mr-3">
                    <div class="card-header">Fout!</div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $errorIns ?></p>
                    </div>
                </div>
            <?php } ?>
            <!--            Is only visibile for users with a role of admin(1) or docent(2)-->
            <?php if ($user->role_id == "1" || $user->role_id == "2") { ?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Nieuwe
                    sport
                </button>
            <?php } ?>
        </div>
    </div>
    <!--    foreach so you can show the data from database sport-->
    <?php foreach ($sport as $viewsport) { ?>
        <div class="p-3">
            <div class="card">
                <div class="card-header bg-light mb-3"><?php echo $viewsport->sport ?></div>
                <div class="card-body">
                    <p>Docent: <?php echo $viewsport->docent ?></p>
                    <?php if ($viewsport->deelnemers > 0) { ?>
                        <p>Maximaal aantal deelnemers: <?php echo $viewsport->deelnemers ?></p>
                    <?php } ?>
                </div>
                <!--                Is only visibile for users with a role of student(3)-->
                <?php if ($user->role_id == "3") { ?>
                    <form action="sport.php" method="post">
                        <input type="hidden" id="idUser" name="idUser" value="<?= $user->id ?>"/>
                        <input type="hidden" type="submit" name="submit"
                               value="<?= $viewsport->id ?>"/>
                        <button class="btn btn-success btn-block">Inschrijven</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>


<?php require('./includes/php/footer.inc.php'); ?>
