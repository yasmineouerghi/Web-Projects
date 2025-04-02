function getRandomColor() {
    return '#' + Math.floor(Math.random() * 16777215).toString(16);
}


var items = document.getElementsByName("item");


for (var i = 0; i < items.length; i++) {
    items[i].onclick = function() {
        this.style.backgroundColor = getRandomColor(); 
    }
}