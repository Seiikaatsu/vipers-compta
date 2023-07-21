<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="https://ballas.gtarp.ovh/img/favicons/favicon-32x32.png">
    	<link rel="icon" type="image/png" sizes="96x96" href="https://ballas.gtarp.ovh/img/favicons/favicon-96x96.png">
    	<link rel="icon" type="image/png" sizes="16x16" href="https://ballas.gtarp.ovh/img/favicons/favicon-16x16.png">
    <title>Vipers Compta - Connexion</title>
</head>
<body>

<div class="login-form">
    <?php
    if (isset($_GET['login_err'])) {
        $err = htmlspecialchars($_GET['login_err']);

        switch ($err) {
            case 'password':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur</strong> mot de passe incorrect
                </div>
                <?php
                break;

            case 'email':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur</strong> email incorrect
                </div>
                <?php
                break;

            case 'already':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur</strong> compte non existant
                </div>
                <?php
                break;
        }
    }
    ?>

    <form action="connexion.php" method="post">
        <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 10px;">
            <h2 class="text-center">Connexion</h2>
            <img class="vipers-image" src="img/Vipers%20PNG.png" alt="Vipers Image" style="width: 200px; height: auto;">
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
        </div>
    </form>
    <p class="text-center"><a href="inscription.php">Inscription</a></p>
</div>
<style>
    .login-form {
        width: 340px;
        margin: 100px auto;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {
        font-size: 15px;
        font-weight: bold;
    }
</style>
</body>
</html>
