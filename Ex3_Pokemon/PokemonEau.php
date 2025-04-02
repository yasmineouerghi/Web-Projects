<?php


    class PokemonEau extends Pokemon{
        public $atkfeu = 2 ; 
        public $atkplante = 0.5; 
        public $atkeau = 0.5 ; 
        public function __construct ($name, $url, $hp, $attack) {
            parent::__construct($name, $url, $hp, $attack);
        }
        function attack($p , $atkpoints , $special)
        {
            if ($special )
            {
                $atk = $this->attack->getSpecialAttack();
                $p -> hp -= $atk * $atkpoints;
                return $atk * $atkpoints;
            }
            else
            {
                if ($p instanceof PokemonFeu)
                {
                    $p -> hp -= $this->attack->getAttackMaximal() * $atkpoints * $this->atkfeu;
                    return $this->attack->getAttackMaximal() * $atkpoints * $this->atkfeu;
                }
                else if ($p instanceof PokemonPlante)
                {
                    $p -> hp -= $this->attack->getAttackMaximal() * $atkpoints * $this->atkplante;
                    return $this->attack->getAttackMaximal() * $atkpoints * $this->atkplante;
                }
                else
                {
                    $p -> hp -= $this->attack->getAttackMaximal() * $atkpoints * $this->atkeau;
                    return $this->attack->getAttackMaximal() * $atkpoints * $this->atkeau;
                }
            }
        }

    }










?>