document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.contenidoNavInferior li a');
    const ventanas = document.querySelectorAll('.ventana');

    links.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const section = link.getAttribute('data-section');
            mostrarVentana(section);
        });
    });

    function mostrarVentana(seleccion) {
        ventanas.forEach(ventana => {
            if (ventana.classList.contains(seleccion)) {
                ventana.classList.add('active');
            } else {
                ventana.classList.remove('active');
            }
        });
    }
});
