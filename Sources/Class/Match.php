<?php

class Match{

    protected $Winner,
              $Loser;



    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
        {
            $this->hydrate($valeurs);
        }
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
    public function getWinner()
    {
        return $this->Winner;
    }

    /**
     * @param mixed $Winner
     */
    public function setWinner($Winner)
    {
        $this->Winner = $Winner;
    }

    /**
     * @return mixed
     */
    public function getLoser()
    {
        return $this->Loser;
    }

    /**
     * @param mixed $Loser
     */
    public function setLoser($Loser)
    {
        $this->Loser = $Loser;
    }


}

