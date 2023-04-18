document.addEventListener('DOMContentLoaded', function() {
    recomendados();
})

async function recomendados() {
    try {
        const lista=document.querySelector('.carousel__lista');

        const url='http://localhost:3000/llamar.php';
        const resultado = await fetch(url);
        const db = await resultado.json();

        db.forEach( producto => {
            const { nombre, precio, foto } = producto;

            const elemento=document.createElement('DIV');
            elemento.classList.add('carousel__elemento');
            const imagen=document.createElement('IMG');
            imagen.src=`../img/productos/${foto}`;
            const nombreP=document.createElement('P');
            nombreP.textContent=nombre;
            const precioP=document.createElement('P');
            precioP.textContent=`$${precio}`;
            precioP.classList.add("precio_rec")
            elemento.appendChild(imagen);
            elemento.appendChild(nombreP);
            elemento.appendChild(precioP);
            
            lista.appendChild(elemento);
        })

        new Glider(document.querySelector('.carousel__lista'), {
            slidesToShow: 2,
            slidesToScroll: 2,
            draggable: true,
            dots: '.carousel__indicadores',
            arrows: {
                prev: '.carousel__anterior',
                next: '.carousel__siguiente'
            },
            responsive: [
                {
                  // screens greater than >= 775px
                  breakpoint: 610,
                  settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 4,
                    slidesToScroll: 4
                  }
                },{
                  // screens greater than >= 1024px
                  breakpoint: 950,
                  settings: {
                    slidesToShow: 8,
                    slidesToScroll: 8
                  }
                }
            ]
        });

    } catch (error) {
        console.log(error);
    }
}