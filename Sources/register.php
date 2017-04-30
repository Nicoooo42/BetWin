
<?php include('Partials/_header.php'); ?>
<?php include('Partials/_nav.php'); ?>

<?php require "Class/Users.php"; ?>
<?php require "Class/UserManager.php"; ?>



<div class="container">



        <h1>Inscription</h1>

    <form method="post">

        <div class="form-group">
            <label for="">Pseudo</label>
            <input type="text" name="username" class="form-control"/>
        </div>


        <div class="form-group">
        <label class="control-label" for="name">nom:</label>
            <input type="text" id="name" name="name" class="form-control" required/>
        </div>

        <div class="form-group">
            <label class="control-label" for="name">prenom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom"/>
        </div>


        <input type="submit" class="btn btn-primary" value="Inscription" name="register"/>


        <?php
/*
        $perso = new Users([
        'Id' => 3,
        'Nom' => $_POST['name'],
        'Prenom' => $_POST['prenom'],
        ]);


        //echo $_POST['prenom'];
        //echo $_POST['name'];

        //echo $temp = $perso->getNom();

        try
        {
        // On se connecte à MySQL
        $db = new PDO('mysql:host=localhost;dbname=tuto;charset=utf8', 'root', 'root');
        }
        catch(Exception $e)
        {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
        }


        $manager = new UserManager($db);

        //$manager->add($perso);

        $perso1 = $manager ->get(1);
        echo $perso1 ->getNom();
*/

        ?>


    </form>





</div><!-- /.container -->

<?php include('Partials/_foot.php'); ?>