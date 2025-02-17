

function Ajouter()
{
    let name = document.getElementById("name").value;   
    let content = document.getElementById("content").value;
    let todo = document.getElementById("todoList");
    let arr = new Array() ; 
    arr.push(name + " " + content);
   
    let li = document.createElement("li");
    li.textContent = name + ' ' + content;
    todo.appendChild(li);

    let r = Math.random() *100 ; 
    let g = Math.random() *100 ;
    let b = Math.random() *100 ;

    li.style.color = `rgb(${r},${g},${b})`;



} 
function Clear()
{
    let todo = document.getElementById("todoList");
    todo.innerHTML = '';

}