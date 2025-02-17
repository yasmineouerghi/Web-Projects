function Change(event) 
{

    

    let color = document.getElementById("color").value;  
    let font = document.getElementById("font").value;
    let police = document.getElementById("police").value;
   

    let text = document.getElementById("text");
    
    text.style.color = color;
    text.style.fontSize = font;
    text.style.fontFamily = police;

    
}