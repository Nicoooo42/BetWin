<?php
/**
 * Created by PhpStorm.
 * User: Lamanna
 * Date: 28/03/2017
 * Time: 23:13
 */
class UserManager
{
    private $_db; // Instance de PDO
    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Users $perso)
    {
        echo $perso->getNom();
        $q = $this->_db->prepare('INSERT INTO Personne(Nom, Prenom) VALUES(:Nom, :Prenom)');
        $q->bindValue(':Nom', $perso->getNom());
        $q->bindValue(':Prenom', $perso->getPrenom(), PDO::PARAM_INT);
        $q->execute();
        //echo "\nPDO::errorCode(): ", $q->errorCode();
    }

    public function getList()
    {
        $persos = [];

        $q = $this->_db->query('SELECT Id, Nom, Prenom FROM Personne ORDER BY nom');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $persos[] = new Users($donnees);
        }

        return $persos;
    }

    public function get($Id)
    {
        $id = (int)$Id;

        $q = $this->_db->query('SELECT Id, Nom, Prenom FROM Personne WHERE Id='.$Id);

        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Users($donnees);

    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}