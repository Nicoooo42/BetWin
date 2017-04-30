<?php

/**
 * Created by PhpStorm.
 * User: Lamanna
 * Date: 09/04/2017
 * Time: 21:37
 */
class News{

    protected $erreurs = [],
              $id,
              $auteur,
              $titre,
              $contenu,
              $dateAjout,
              $dateModif;



    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
        {
            $this->hydrate($valeurs);
        }
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function hydrate($donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
            $methode = 'set'.ucfirst($attribut);
            if (is_callable([$this, $methode]))
            {
                $this->$methode($valeur);
            }
        }

    }

    /**
     * @return mixed
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * @param mixed $dateModif
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;
    }

    /**
     * @return mixed
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @param mixed $dateAjout
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getErreurs()
    {
        return $this->erreurs;
    }

    /**
     * @param array $erreurs
     */
    public function setErreurs($erreurs)
    {
        $this->erreurs = $erreurs;
    }

}
