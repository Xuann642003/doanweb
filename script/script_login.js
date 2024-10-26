const input = document.getElementById("myInput");

input.addEventListener("mouseover", function() {
    input.style.setProperty('--placeholder-color', 'red');
    input.style.color = 'red'; 
});

input.addEventListener("mouseout", function() {
    input.style.setProperty('--placeholder-color', 'gray');
    input.style.color = 'black'; 
});

document.styleSheets[0].insertRule(`
  #myInput::placeholder {
    color: var(--placeholder-color, gray);
  }
`, 0);





