<?php include('Partials/_header.php'); ?>
<?php require "Class/DBFactory.php"; ?>
<?php require "Class/Match.php"; ?>
<?php require "Class/MatchManager.php"; ?>
<?php require "Fonction.php"; ?>
<?php include('Partials/_nav.php'); ?>

<?php

$db = DBFactory::getMysqlConnexionWithPDO();

$manager = new MatchManager($db);

?>

<form method="post" action="http://www.monsite.net/redirection_navigation.php">
<p>

<SELECT NAME="Liste" onChange="Lien()">
<OPTION VALUE="">Choisir une option
<?php
    foreach ($manager->getListJoueur() as $Joueur)
    {
        echo '<OPTION VALUE="index.php"/>', $Joueur->getWinner(),'</option>';
    }
?>
</SELECT>
    
<input type="submit" value="Go" title="valider pour aller à la page sélectionnée" />
</FORM>




<div class="container text-center">
    <h2>% Victoire - 10 derniers matchs : Nadal</h2>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
            <span class="sr-only">70% Complete</span>
        </div>
    </div>
</div>

<div class="container text-center">
    <h2>% Victoire - 10 derniers matchs : federer</h2>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
            <span class="sr-only">40% Complete</span>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <section class="col-md-4">


            <table class="table table-inverse">
                <caption>Match</caption>

                <tr>
                    <th>Winner</th>
                    <th>Loser</th>
                </tr>

                <?php
                foreach ($manager->getListWin() as $Match)
                {
                    echo '<tr><td>', $Match->getWinner(), '</td>
                          <td>', $Match->getLoser(), '</td>';
                }

                ?>
            </table>
        </section>

        <section class="col-md-4">
            <img src="../88.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
        </section>

        <section class="col-md-4">

            <table class="table table-inverse">
                <caption>Match</caption>

                <tr>
                    <th>Winner</th>
                    <th>Loser</th>
                </tr>

            <?php
            foreach ($manager->getListLose() as $Match)
            {
                echo '<tr><td>', $Match->getWinner(), '</td>
                  <td>', $Match->getLoser(), '</td>';
            }

            ?>

            </table>

        </section>
    </div>
</div>
