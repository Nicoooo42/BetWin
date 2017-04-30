<?php
class MatchManager
{
    /**
     * Attribut contenant l'instance représentant la BDD.
     * @type PDO
     */
    protected $db;

    /**
     * Constructeur étant chargé d'enregistrer l'instance de PDO dans l'attribut $db.
     * @param $db PDO Le DAO
     * @return void
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM Tournois')->fetchColumn();
    }

    public function getListWin()
    {
        $listeMatch = [];

        $sql = "SELECT Winner, Loser FROM Tournois WHERE Winner LIKE 'NAD%'";

        $requete = $this->db->query($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Match');

        $listeMatch = $requete->fetchAll();

        return $listeMatch;

    }

    public function getListLose()
    {
        $listeMatch = [];

        $sql = "SELECT Winner, Loser FROM Tournois WHERE Loser LIKE 'NAD%'";

        $requete = $this->db->query($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Match');

        $listeMatch = $requete->fetchAll();

        return $listeMatch;

    }
    
        public function getListJoueur()
    {
        $listeJoueur = [];

        $sql = "SELECT DISTINCT Winner FROM Tournois";

        $requete = $this->db->query($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Match');

        $listeJoueur = $requete->fetchAll();
        
        return $listeJoueur;

    }
    
    

}