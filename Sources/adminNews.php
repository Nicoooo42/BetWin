<?php require "Class/DBFactory.php"; ?>
<?php require "Class/NewsManagerDPO.php"; ?>
<?php require "Class/News.php"; ?>
<?php require "Fonction.php"; ?>
<?php include('Partials/_header.php'); ?>
<?php include('Partials/_nav.php'); ?>


<?php


$db = DBFactory::getMysqlConnexionWithPDO();

$manager = new NewsManagerDPO($db);

?>

<a href="News.php">Ajoute un Prono!</a>


<?php

if(isset($_GET['id']))
{

    echo'<a href="adminNews.php" > Retour mur </a>';
    $temp = $manager->getUnique($_GET['id']);

    ?>


    <div class="container">
        <div class="jumbotron">


        <p><?php echo $temp->getAuteur() ?></p><br>
        <h1><?php echo $temp->getTitre() ?></h1><br>
        <p><?php echo nl2br($temp->getContenu()) ?></p>
            </div>
        </div>
    </div>


<?php
}
else
{

    foreach ($manager->getList(0, 5) as $News)
    {
        echo
        '<div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="center-block">
        <div class="panel panel-default">
        <div class="panel-body">
        <h4><a href="?id=', $News->getId(), '">', $News->getTitre(), '</a></h4>', "\n",
        '<p>', nl2br($News->getContenu()), '</p></div></div></div></div></div>';

    }
}


?>

<?php include('Partials/_foot.php'); ?>

