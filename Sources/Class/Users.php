<?php
class Users
{

    private $_Id;
    private $_Nom;
    private $_Prenom;

    public function __construct(array $donnees)
    {

        $this->hydrate($donnees);

        echo 'dans constructeur';
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            echo $method;

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_Id;
    }

    /**
     * @param mixed $id
     */
    public function setId($Id)
    {
        $this->_id = $Id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        echo 'dans get nom';
        return $this->_Nom;

    }

    /**
     * @param mixed $nom
     */
    public function setNom($Nom)
    {
        $this->_Nom = $Nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {

        return $this->_Prenom;
    }

    /**
     * @param mixed $degats
     */
    public function setPrenom($Prenom)
    {
        $this->_Prenom = $Prenom;
    }




}

