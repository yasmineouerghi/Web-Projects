function Random_Range(min, max)
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function Generate(s) 
{
    switch(s)
    {
        case "easy": 
            alert("Range is 1-10");
            return Number(Random_Range(1, 10));
        case "medium" : 
            alert("Range is 1-100");
            return Number(Random_Range(1, 100));
        case "hard":
            alert("Range is 1-1000");
            return Number(Random_Range(1, 1000));   
    }
    return -1 ; 
}

function Play() 
{
    let s = document.getElementById("level").value ; 
    let x = Generate(s);
    let nb_tries = 5 ; 
    while (nb_tries--)
    {
        let guess = prompt("Enter your guess");
        if (guess > x)
        {
            alert("Your guess is too high");
        
        }
        else if (guess < x)
        {
            alert("Your guess is too low");
         
        }
        else
        {
            alert("Congratulations! You have guessed the number");
            break;
        }
        if (nb_tries == 0) alert("You have Lost ! The number was " + x);
        else alert("You have " + nb_tries + " tries left");
    }
}