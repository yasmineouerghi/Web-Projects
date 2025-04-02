<?php


    include ('Pokemon.php');
    include ('PokemonEau.php');
    include ('PokemonFeu.php');
    include ('PokemonPlante.php');
  



    $pikachu = new PokemonPlante('Pikachu', 'images/pikachu.png', 1000, new AttackPokemon(10, 15,25,0.3));
    $carapuce = new PokemonEau('Carapuce', 'images/carapuce.png', 1000, new AttackPokemon(5, 10,20,0.4));
    $dracofeu = new PokemonFeu('Dracofeu', 'images/draco.png', 1000, new AttackPokemon(10, 20,40,0.3));


    $pikachu -> fight($carapuce);
    $pikachu -> fight($dracofeu);
    $carapuce -> Regen();
    $carapuce -> fight($dracofeu);












?>