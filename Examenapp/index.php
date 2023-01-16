<?php
require('./includes/php/header.inc.php');
require('./includes/html/delwarnmodal.inc.html');
$counter = 0;
?>


<div class="container p-5">
    <div class="card bg-light mb-3">
        <div class="card-header">
<!--            Shows username if user is logged in-->
            <?php if (isset($user)) { ?>
                <h5>Welkom <?php echo $user->name ?></h5>
<!--            If user is not logged in     -->
            <?php } else { ?>
                <h5>Welkom Gast</h5>
            <?php } ?>
        </div>
        <div class="card-body">
<!--            $Message gives a message with the role of the user only for student(1) or docent(2)-->
            <?php if (isset($message)) { ?>
                <h3><?php echo $message; ?></h3>
            <?php } elseif (isset($users)) { ?>
<!--                Only if user is a admin(1)-->
                <?php if ($user->role_id == "1") { ?>
                    <div class="container p-1">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#docentModal">
                            Voeg docent toe
                        </button>
                    </div>
                <?php } ?>
<!--                foreach so you can show the data from database users-->
                <?php foreach ($users as $loopUser) { ?>
                    <form action="adminupdate.php" method="POST">
                        <ul class="list-group">
                            <?php if ($loopUser->email != $user->email) { ?>
                                <li class="list-group-item">
                                    <?php echo $loopUser->name ?>
                                    <select name="userInfo">
<!--                                        docent=2-->
                                        <?php if ($loopUser->role_id == "2") { ?>
                                            <option selected="selected" value="2">Docent</option>
                                            <option value="3">Student</option>
<!--                                            student=3-->
                                        <?php } elseif ($loopUser->role_id == "3") { ?>
                                            <option selected="selected" value="3">Student</option>
                                            <option value="2">Docent</option>
                                        <?php } ?>
                                    </select>
                                    <button class="btn btn-primary" type="submit" name="superEdit">Update</button>
                                    <button name="superDelete" type="submit" id="btnDeleteForm"
                                            class="d-none delete<?php echo $counter ?>"></button>
                                    <button type="button" class="btn btn-danger btnModal" data-toggle="modal"
                                            data-target="#exampleModal">Verwijder
                                    </button>
                                    <input type="hidden" value="delete<?php echo $counter ?>"/>
                                </li>
                                <input type="hidden" name="targetUserId" value="<?php echo $loopUser->id ?>"/>
                            <?php } ?>
                        </ul>
                    </form>
                    <?php $counter++ ?>
                <?php } ?>
            <?php } ?>
<!--            Only shows if user is logged in-->
            <?php if (isset($user)) { ?>
                <h5>Gebruik de navigatie balk om verder door de site te navigeren!</h5>
            <?php } else { ?>
                <h4>Als u van deze site gebruik wilt maken moet u inloggen of een account aanmaken</h4>
                <div class="d-grid ml-4 mr-4 mb-4">
                    <a class="p-3 btn btn-success btn-block text-uppercase fw-bold" href="login.php">Login</a>
                </div>
                <div class="d-grid ml-4 mr-4 mb-4">
                    <a class="p-3 btn btn-danger btn-block text-uppercase fw-bold" href="register.php">Registreer</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php require('./includes/php/footer.inc.php'); ?>
