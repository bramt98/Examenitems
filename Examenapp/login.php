<?php
require('./includes/php/header.inc.php');
require('./includes/php/login.inc.php');
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Inloggen</h5>
                        <form action="login.php" method="POST">
                            <div class="form-floating mb-3">
                                <!--If user fills in a wrong email or password they get the error message: "Het ingevulde wachtwoord of email is fout"-->
                                <?php if (isset($inputFields)) { ?>
                                    <p class="text-danger"><?php echo $inputFields ?></p>
                                <?php } ?>
                                <!--If user fills in a wrong email or password they get the error message: "Het ingevulde wachtwoord of email is fout"-->
                                <?php if (isset($wrongLogin)) { ?>
                                    <p class="text-danger"><?php echo $wrongLogin ?></p>
                                <?php } ?>
                                <label for="userEmail">Email</label>
                                <input type="email" class="form-control" name="userEmail"
                                       placeholder="@rijnijssel.nl">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="password">Wachtwoord</label>
                                <input type="password" class="form-control" name="password"
                                       placeholder="wachtwoord">
                            </div>
                            <div class="d-grid">
                                <button name="login" class="btn btn-success btn-block text-uppercase fw-bold"
                                        type="submit">
                                    Log in
                                </button>
                            </div>
                        </form>
                        <hr class="my-4">
                        <div class="d-grid">
                            <a class="btn btn-danger btn-block text-uppercase fw-bold" href="register.php">
                                Registreer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require('./includes/php/footer.inc.php'); ?>