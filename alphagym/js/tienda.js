document.addEventListener('DOMContentLoaded', function() {
    productos();
})

function productos() {
    categoria('1', 'http://localhost:3000/includes/config/proteinas.php');
    categoria('2', 'http://localhost:3000/includes/config/preentrenos.php');
    categoria('3', 'http://localhost:3000/includes/config/creatinas.php');
}

async function categoria(listaC, url) {
    try {
        const lista=document.querySelector(`.carousel__lista${listaC}`);

        const resultado = await fetch(url);
        const db = await resultado.json();

        db.forEach( producto => {
            const { id, nombre, precio, foto} = producto;

            const elementoA=document.createElement('A');
            elementoA.href=`detalles_producto.php?id=${id}`
            const elemento=document.createElement('DIV');
            elementoA.appendChild(elemento);
            elementoA.classList.add('carousel__elemento');
            const imagen=document.createElement('IMG');
            imagen.src=`../img/productos/producto/${foto}`;
            const nombreP=document.createElement('P');
            nombreP.textContent=nombre;
            nombreP.classList.add('descripcion');
            const precioP=document.createElement('P');
            precioP.textContent=`$${precio}`;
            precioP.classList.add("precio_rec")
            elemento.appendChild(imagen);
            elemento.appendChild(nombreP);
            elemento.appendChild(precioP);
            
            lista.appendChild(elementoA);
        })

        new Glider(document.querySelector(`.carousel__lista${listaC}`), {
            slidesToShow: 2,
            slidesToScroll: 2,
            draggable: true,
            dots: `.carousel__indicadores${listaC}`,
            arrows: {
                prev: `.carousel__anterior${listaC}`,
                next: `.carousel__siguiente${listaC}`
            },
            responsive: [
                {
                  breakpoint: 610,
                  settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                  }
                },{
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
