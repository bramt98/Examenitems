<?php
require('./includes/php/adddocent.inc.php');
?>

<!-- Modal -->
<div class="modal fade" id="docentModal" tabindex="-1" role="dialog" aria-labelledby="docentModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registreren</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="adddocent.php" method="POST">
                    <!--                            If input fields are empty users get the error message: "Alle velden moeten zijn ingevuld om te kunnen registreren!"-->
                    <?php if (isset($inputFields)) { ?>
                        <p class="text-danger"><?php echo $inputFields ?></p>
                    <?php } ?>
                    <div class="form-floating mb-3">
                        <label for="userName">Gebruikersnaam</label>
                        <input required type="text" name="userName" class="form-control" placeholder="@rijnijssel.nl">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="userEmail">Email</label>
                        <input required type="email" name="userEmail" class="form-control" placeholder="email">
                        <br/>
                        <!--                        If email already exists users get the error message: "Email is al in gebruik"    -->
                        <?php if (isset($emailTaken)) { ?>
                            <p class="text-danger"><?php echo $emailTaken ?></p>
                        <?php } ?>
                    </div>
                    <!--If password isn't the same as password repeat users get the error message: Alle velden moeten zijn ingevuld om te kunnen registreren!-->
                    <?php if (isset($wrongRepeat)) { ?>
                        <p class="text-danger"><?php echo $wrongRepeat ?></p>
                    <?php } ?>
                    <!--If password is to short users get the error message: "Je wachtwoord is te klein het moet minimaal 8 characters bevatten" -->
                    <?php if (isset($shortPassword)) { ?>
                        <p class="text-danger"><?php echo $shortPassword ?></p>
                    <?php } ?>
                    <div class="form-floating mb-3">
                        <label for="password">Wachtwoord:</label>
                        <input required type="password" name="password" class="form-control"
                               placeholder="Wachtwoord">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="password">Herhaal wachtwoord:</label>
                        <input required type="password" name="repeatPassword" class="form-control"
                               placeholder="Herhaal wachtwoord">
                    </div>
                    <div class="d-grid">
                        <button class="d-none" id="addDocentForm" name="addDocent" type="submit"></button>
                    </div>
                    <hr class="my-4">
                </form>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="addDocentModal" type="button" class="btn btn-primary">Voeg docent toe</button>
            </div>
        </div>
    </div>
</div>