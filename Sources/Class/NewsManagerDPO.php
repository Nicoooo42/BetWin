<?php
class NewsManagerDPO
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
        return $this->db->query('SELECT COUNT(*) FROM news')->fetchColumn();
    }

    public function getList($debut = -1, $limite = -1)
    {
        $listeNews = [];

        $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM news ORDER BY id DESC';

        // On vérifie l'intégrité des paramètres fournis.
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }

        $requete = $this->db->query($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');

        $listeNews = $requete->fetchAll();

        return $listeNews;
    }

    public function getUnique($id)
{

    $requete = $this->db->prepare('SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM news WHERE id = :id');

    $requete->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $requete->execute();

    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');

    $New = $requete->fetch();
    return $New;
}

    public function Update(News $News)
    {

        $requete = $this->db->prepare('Update news SET auteur=:auteur, titre=:titre, contenu=:contenu, dateModif= NOW() WHERE id = :id');

        $requete->bindValue(':auteur',  $News->getAuteur());
        $requete->bindValue(':titre', $News->getTitre());
        $requete->bindValue(':contenu', $News->getContenu());
        $requete->bindValue(':id', $News->getId());
        $requete->execute();

    }

    public function Insert(News $News)
    {

        $requete = $this->db->prepare('INSERT INTO news(auteur, titre, contenu, dateAjout, dateModif) VALUES(:auteur, :titre, :contenu, NOW(), NOW())');

        $requete->bindValue(':auteur',  $News->getAuteur());
        $requete->bindValue(':titre', $News->getTitre());
        $requete->bindValue(':contenu', $News->getContenu());

        $requete->execute();


    }

    public function Delete($id)
    {

        $requete = $this->db->prepare('DELETE From news WHERE id = :id');

        $requete->bindValue(':id', $id);

        $requete->execute();


    }

}
