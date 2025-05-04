// Agregar evento a todos los botones de "Ver más"
document.querySelectorAll('.acordeon').forEach(button => {
  button.addEventListener('click', function() {
    // Obtenemos el contenido asociado al botón
    var content = this.nextElementSibling;

    // Alternamos la visibilidad del contenido
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
});




































