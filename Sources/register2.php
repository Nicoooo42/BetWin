
<?php include('Partials/_header.php'); ?>
<?php include('Partials/_nav.php'); ?>

<?php require "Class/Users.php"; ?>
<?php require "Class/UserManager.php"; ?>
<?php require "Fonction.php"; ?>


<?php



$errors = array();


if(!empty($_POST)){



    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9]+$/',$_POST['username']))
    {

        $errors['username'] = "Votre pseudo est vide";

    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {

        $errors['email'] = "Votre email est invalide";

    }

        if(empty($_POST['password']) || $_POST['password'] != $_POST['confirm-password'])
    {

        $errors['password'] = "Password non valide";

    }


debug($errors);


}
?>



<div class="container">



    <h1>Inscription</h1>

    <form action="" method="post">


        <div class="form-group">
            <label class="control-label" for="name">Peusdo:</label>
            <input type="text" id="username" name="username" class="form-control" required/>
        </div>

        <div class="form-group">
            <label class="control-label" for="name">Email:</label>
            <input type="text" class="form-control" id="email" name="email"/>
        </div>

        <div class="form-group">
            <label class="control-label" for="name">Mot de Passe:</label>
            <input type="text" class="form-control" id="password" name="password"/>
        </div>

        <div class="form-group">
            <label class="control-label" for="name">Confirmer votre mot de passe:</label>
            <input type="text" class="form-control" id="confirm-password" name="confirm-password"/>
        </div>

        <input type="submit" class="btn btn-primary" value="Inscription" name="register"/>


    </form>





</div><!-- /.container -->

<?php include('Partials/_foot.php'); ?>