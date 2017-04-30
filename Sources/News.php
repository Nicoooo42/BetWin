<?php include('Partials/_header.php'); ?>
<?php require "Class/DBFactory.php"; ?>
<?php require "Class/NewsManagerDPO.php"; ?>
<?php require "Class/News.php"; ?>
<?php require "Fonction.php"; ?>
<?php include('Partials/_nav.php'); ?>

<?php

$db = DBFactory::getMysqlConnexionWithPDO();

$manager = new NewsManagerDPO($db);


if(isset($_POST['auteur']))
{

    $temp = new News(
        [
            'auteur' => $_POST['auteur'],
            'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu']
        ]);

}


if(isset($_POST['id']))
{
$temp->setId($_POST['id']);
$manager->Update($temp);
}

if(isset($_POST['auteur']) && !isset($_POST['id']))
{
    $manager->Insert($temp);
}

if(isset($_GET['supprimer']))
{
    $manager->Delete($_GET['supprimer']);
}

if(isset($_GET['modifier']))
{
$temp = $manager->getUnique($_GET['modifier']);
}

?>


<a href="adminNews.php">Mur de Pronostic !</a><br>



<div class="container text-center">
    <p style="text-align: center">

    <form action="" method="post">

        Auteur : <input type="text" name="auteur" value="<?php if (isset($temp)) echo $temp->getAuteur(); ?>" /><br><br>
        Titre : <input type="text" name="titre" value="<?php if (isset($temp)) echo $temp->getTitre(); ?>" /><br><br>

        Contenu :<br><textarea rows="5" cols="60" name="contenu"><?php if (isset($temp)) echo $temp->getContenu(); ?></textarea><br>

        <?php
        if(isset($temp) && !$temp->isNew())
        {
            ?>
            <input type="hidden" name="id" value="<?= $temp->getId() ?>" />
            <input type="submit" class="btn btn-primary" value="Modifier" name="Modifier"/>
            <?php
        }
        else
        {
            ?>
            <input type="submit" class="btn btn-primary" value="Ajouter" name="Ajouter"/>
            <?php
        }
        ?>


    </p>
</div>

<table class="table table-inverse">
    <caption>Liste des News</caption>

    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Contenu</th>
        <th>Action</th>

    </tr>

    <?php
    foreach ($manager->getList(0, 5) as $News)
    {
    echo '<tr><td>', $News->getTitre(), '</td>
          <td>', $News->getAuteur(), '</td>
          <td>', substr($News->getContenu(),0,50), '</td>
          <td> <a href="?modifier=', $News->getId(), '">Modifier</a> | <a href="?supprimer=', $News->getId(), '">Supprimer</a> </td></tr>';


    }
    ?>

</table>