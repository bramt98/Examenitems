<?php
require('./includes/php/header.inc.php');
require('./includes/php/profile.inc.php');

?>


    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Gegevens aanpassen</h5>
                        <form action="profile.php" method="POST">
                            <div class="form-floating mb-3">
                                <label for="userName">Gebruikersnaam</label>
                                <input required type="text" name="userName" class="form-control"
                                       value="<?php echo $user->name ?>">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="userEmail">Email</label>
                                <input required type="email" name="userEmail" class="form-control"
                                       value="<?php echo $user->email ?>">
                                <br/>
                                <!--If email already exists users get the error message: "Email is al in gebruik                                -->
                                <?php if (isset($emailTaken)) { ?>
                                    <p class="text-danger"><?php echo $emailTaken ?></p>
                                <?php } ?>
                                <!--If password isn't the same as password repeat users get the error message: "Alle velden moeten zijn ingevuld om te kunnen registreren!"-->
                                <?php if (isset($wrongRepeat)) { ?>
                                    <p class="text-danger"><?php echo $wrongRepeat ?></p>
                                <?php } ?>
                                <!--If password is to short users get the error message: "Je wachtwoord is te klein het moet minimaal 8 characters bevatten" -->
                                <?php if (isset($shortPassword)) { ?>
                                    <p class="text-danger"><?php echo $shortPassword ?></p>
                                <?php } ?>
                                <div class="form-floating mb-3">
                                    <label for="password">Nieuw wachtwoord:</label>
                                    <input required type="password" name="password" class="form-control"
                                           placeholder="Wachtwoord">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="password">Herhaal wachtwoord:</label>
                                    <input required type="password" name="repeatPassword" class="form-control"
                                           placeholder="Herhaal wachtwoord">
                                </div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-danger btn-block text-uppercase fw-bold" type="submit"
                                        name="edit">Pas aan
                                </button>
                            </div>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require('./includes/php/footer.inc.php'); ?>