
<?php

    class Etudiant {
        public $nom ; 
        public $prenom ;
        public $notes = array() ;

        public function __construct($nom, $prenom, $notes) {
            $this->nom = $nom ;
            $this->prenom = $prenom ;
            $this->notes = $notes ;
        }
        public  function AfficheMoyenne()
        {
            for ($i = 0 ; $i < count($this -> notes) ; $i = $i + 1 )
            {
                echo "La $i ème note est : {$this -> notes[$i]} <br>" ;
            }
        }
        public function CalculMoyenne()
        {
            $somme = 0 ;
            for ($i = 0 ; $i < count($this -> notes) ; $i = $i + 1 )
            {
                $somme = $somme + $this -> notes[$i] ;
            }
            $moyenne = $somme / count($this -> notes) ;
            //echo "La moyenne de l'étudiant est : $moyenne <br>" ;
            return $moyenne ; 
        }   
        public function Admissible()
        {
            $moyenne = $this -> CalculMoyenne() ;
            if ($moyenne >= 10)
            {
                echo "L'étudiant est admissible <br> " ;
            }
            else
            {
                echo "L'étudiant n'est pas admissible <br>" ;
            }   
        }
    }

    $E1 = new Etudiant ("Aymen" , "A" , array(11,13,18,7,10,13,2,5,1)) ;
    $E2 = new Etudiant ("Skander" , "S" , array(15,9,8,16)) ;
    /* AFFICHAGE ET CALCUL MOYENNE 
    $E1 -> AfficheMoyenne() ;
    $moyenne = $E1 -> CalculMoyenne() ;
    echo "La moyenne de l'étudiant est : $moyenne <br>" ; 
    $E1 -> Admissible() ;
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

</head>
<body>
<div class="container text-center">
  <div class="row">
    
    <div class="col">
      Aymen 
      <?php
            for ($i = 0 ; $i < count($E1 -> notes) ; $i = $i + 1 )
            {
                
                if ($E1 -> notes[$i] < 10 )
                {
                    echo "<div style='background-color: #DB586E;border : 1px solid grey ; height : 3em;'>   {$E1 -> notes[$i]} </div>" ;
                }
                else if ($E1 -> notes[$i] > 10 ) 
                {
                    echo "<div style='background-color: #A9DC8C;border : 1px solid grey ;height : 3em;'>   {$E1 -> notes[$i]} </div>" ; 
                }
                else
                {
                    echo "<div style='background-color: #F0E68C;border : 1px solid grey ;height : 3em;'>   {$E1 -> notes[$i]} </div>" ;   
                }
            }

            echo "<div style = 'background-color : #65BFCD;border : 1px solid grey ; height : 3em;'> Votre Moyenne est : {$E1 -> CalculMoyenne()} </div>" ;
            ?>
    </div>
    <div class="col">
      Skander
      <?php
            for ($i = 0 ; $i < count($E2 -> notes) ; $i = $i + 1 )
            {
                if ($E2 -> notes[$i] < 10 )
                {
                    echo "<div style='background-color: #DB586E; border : 1px solid grey ; height : 3em;'>   {$E2 -> notes[$i]} </div>" ;
                }
                else if ($E2 -> notes[$i] > 10 ) 
                {
                    echo "<div  style='background-color: #A9DC8C; border : 1px solid grey ;height : 3em;'>   {$E2 -> notes[$i]} </div>" ; 
                }
                else
                {
                    echo "<div  style='background-color: #F0E68C; border : 1px solid grey ;height : 3em;'>   {$E2 -> notes[$i]} </div>" ;   
                }
            }
            echo "<div   style = 'background-color : #65BFCD;border : 1px solid grey ; height : 3em;'> Votre Moyenne est : {$E2 -> CalculMoyenne()} </div>" ;
            ?>
    </div>
    
  </div>
</div>
    
</body>
</html>