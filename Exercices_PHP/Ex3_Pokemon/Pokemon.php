<?php

    include 'attackPokemon.php' ;
    class Pokemon
    {
        public $name ; 
        public $url ; 
        public $hp ; 
        public $attack ;

        // Getters
        public function getName() {
            return $this->name;
        }

        public function getUrl() {
            return $this->url;
        }

        public function getHp() {
            return $this->hp;
        }

        public function getAttack() {
            return $this->attack;
        }

        // Setters
        public function setName($name) {
            $this->name = $name;
        }

        public function setUrl($url) {
            $this->url = $url;
        }

        public function setHp($hp) {
            $this->hp = $hp;
        }

        public function setAttack($attack) {
            $this->attack = $attack;
        }

        function __construct ($name, $url, $hp, $attack) {
            $this->name = $name;
            $this->url = $url;
            $this->hp = $hp;
            $this->attack = $attack;
        }
        function isDead() {
            return $this->hp <= 0;
        }
        function attack($p , $atkpoints , $special)
        {
            if ($special )
            {
                $atk = $this->attack->getSpecialAttack();
                $p -> hp -= $atk * $atkpoints;

                return $atk * $atkpoints ;
            }
            else 
            {
                //$atk = rand($this->attack->getAttackMinimal(), $this->attack->getAttackMaximal());
                $p -> hp -= $atkpoints;
                return $atkpoints ;
            }
        }

        function whoAmI()
        {
            return "My name is " . $this->name . " and I have " . $this->hp . " hp <br>";
        }
        function printPokemonCard($E2 , $i ) 
        {
            $minim = $this->attack->getAttackMinimal();
            $maxim = $this->attack->getAttackMaximal();
            $special = $this->attack->getSpecialAttack();
            $prob = $this->attack->getProbabilitySpecialAttack();
           
            $minim1 = $E2->attack->getAttackMinimal();
            $maxim1 = $E2->attack->getAttackMaximal();
            $special1 = $E2->attack->getSpecialAttack();
            $prob1 = $E2->attack->getProbabilitySpecialAttack();
            echo " 
            <div class = 'same'> 
            <div class='card' style='width: 25rem;'>
            <img src='{$this -> url}' class='card-img-top' alt='{$this -> name}'>
            <div class='card-body'>
                <h5 class='card-title' style = 'text-align : center'>{$this -> name}</h5>
                
            </div>
            <ul class='list-group list-group-flush'>
                <li class='list-group-item'>Points : {$this -> hp}</li>
                <li class='list-group-item'>Min Attack Points : {$minim} </li>
                <li class='list-group-item'>Max Attack Points : {$maxim}</li>
                <li class='list-group-item'>Special Attack Points : {$special}</li>
                <li class='list-group-item'>Proability Special Attack : {$prob}</li>

            </ul>
            
            </div> "; 
            echo " <div class='card  ' style='width: 25rem;' >
            <img src='{$E2->url}' class='card-img-top' alt='{$E2 -> name}'>
            <div class='card-body'>
                <h5 class='card-title' style = 'text-align : center'>{$E2 -> name}</h5>
                
            </div>
            <ul class='list-group list-group-flush'>
                <li class='list-group-item'>Points : {$E2 -> hp}</li>
                <li class='list-group-item'>Min Attack Points : {$minim1} </li>
                <li class='list-group-item'>Max Attack Points : {$maxim1}</li>
                <li class='list-group-item'>Special Attack Points : {$special1}</li>
                <li class='list-group-item'>Proability Special Attack : {$prob1}</li>

            </ul>
            
            </div> </div>"; 


            ; 
        }

        function fight ($E2)
        {
            $i =  0 ; 
            $deg1 =0 ; 
            $deg2 = 0 ; 
            while (!($this -> isDead() || $E2 -> isDead() ))
            {
                // Random attack points { atk12 ==> Attack de ce pokemon , atk21 ==> Attack de l'autre pokemon(E2) }
                $atk12 = rand($this->attack->getAttackMinimal(),$this->attack->getAttackMaximal()); 
                $atk21 = rand ($E2->attack->getAttackMinimal(),$E2->attack->getAttackMaximal()); 
                // Random Special attack { Condition : probbilitySpecialAttack > 0.5 }
                $special12 = rand(0,1) > $this->attack->getProbabilitySpecialAttack();
                $special21 = rand(0,1) > $E2->attack->getProbabilitySpecialAttack();
                // Degats
            
                
                // Affichage des cartes Pokemon
                $this -> printPokemonCard($E2 , $i) ;
                // Ajout de la case des degats
                echo "<div style = 'border: 2px solid black ;  margin : 0 2.5em ;  list-style-type : none ; padding : 1em ; background-color : #DB7474 ; '> 
                <h1 style = 'color : Black ;'> Round $i </h1> 
                <ul style = 'display : flex ; justify-content : space-around ; list-style-type : none ; background-color : #8D7878; height : 5em ;  '>
                    <li style = 'padding : 2em  0; '> {$deg1}  </li> 
                    <li style = 'padding : 2em 0; '> {$deg2}</li>
                </ul>
                </div> ";
                // Attaque
                $deg1 += $this -> attack($E2 , $atk12 , false);
                $deg2 += $E2 -> attack($this , $atk21 , false);

                
                
                
                
                $i++ ;
                

            }
           
            if ($this -> isDead())
            {
                echo " <div style = 'background-color :rgb(116, 219, 121) ; padding : 1em ; margin : 0 2.5em ; '> 
                <ul  style = 'display : flex ; justify-content : space-around ; list-style-type : none ; height : 5em ;  '>
                    <li style = 'padding : 2em  0; '> {$E2->name} a gagné   </li>
                    <li class = ''> <img src='{$E2 -> url}' alt='win' style = 'width : 5em ; height : 5em ; '> </li>
                </ul>
                </div> ";
               
            }
            else 
            {
                echo " <div style = 'background-color :rgb(116, 219, 121) ; padding : 1em ; margin : 0 2.5em ; '> 
                <ul  style = 'display : flex ; justify-content : space-around ; list-style-type : none ; height : 5em ;  '>
                    <li style = 'padding : 2em  0; '> {$this->name} a gagné   </li>
                    <li class = ''> <img src='{$this -> url}' alt='win' style = 'width : 5em ; height : 5em ; '> </li>
                </ul>
                </div> ";
            }

            
        } 

        function Regen()
        {
            $this -> hp = 1000 ; 
        }

    }

    /*$E1 = new Pokemon("Pikachu", "images\pikachu.png", 100, new attackPokemon(10, 20, 30, 0.1));
    $E2 = new Pokemon("Dracofeu", "images\draco.png", 100, new attackPokemon(5, 25, 35, 0.2));
    
   // echo $E1 -> whoAmI() ; 
   // echo $E2 -> whoAmI() ;
    $E1 -> fight($E2) ; 
    

    */
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .same{
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    
</body>
</html>