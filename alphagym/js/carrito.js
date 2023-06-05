
function agregar() {
    const overlay=document.querySelector('.overlay');
    overlay.style.display='block';

    const cerrar=document.querySelector('.cerrar');
    cerrar.onclick=function(){
        const body=document.querySelector('body');
        body.classList.remove('fijar');
        overlay.style.display='none';
    }

    const body=document.querySelector('body');
    body.classList.add('fijar');
}

function valor() {
    const slider=document.querySelector('.slider');
    const cantidadL=document.querySelector('.cantidadL');

    cantidadL.textContent="Cantidad: "+slider.value;
}

document.addEventListener('DOMContentLoaded', function() {
    productos_carrito();
})

async function productos_carrito() {
    try {
        const drop=document.querySelector('.productos_carrito');

        const url='http://localhost:3000/includes/config/carrito.php';
        const resultado = await fetch(url);
        const db = await resultado.json();

        let total=0;

        db.forEach( producto => {
            const { imagen, nombre, precio, cantidad } = producto;

            const prod_div=document.createElement('DIV');
            prod_div.classList.add('productoC');
            const img=document.createElement('IMG');
            img.src=`../img/productos/producto/${imagen}`;
            img.classList.add('producto_imagenC');
            const nombreP=document.createElement('P');
            nombreP.textContent=nombre;
            const cantidadP=document.createElement('P');
            cantidadP.textContent=cantidad;
            const precioP=document.createElement('P');
            precioP.textContent=`$${precio*cantidad}`;
            const boton_borrar=document.createElement('BUTTON');
            boton_borrar.onclick = function() {
                borrar_carrito(nombre);
              };
            const img_borrar=document.createElement('IMG');
            img_borrar.src="../img/delete.png";
            boton_borrar.appendChild(img_borrar);
            boton_borrar.classList.add('boton-imagen');
            prod_div.appendChild(img);
            prod_div.appendChild(nombreP);
            prod_div.appendChild(cantidadP);
            prod_div.appendChild(precioP);
            prod_div.appendChild(boton_borrar);
            drop.appendChild(prod_div);

            total+=precio*cantidad;

        })
        const totalP=document.createElement('P');
        totalP.textContent=`Total= $${total}`;
        totalP.classList.add('total');
        const comprar=document.createElement('BUTTON');
        comprar.textContent="Comprar";
        comprar.onclick=function() {
            pedido(total);
        }
        drop.append(totalP);
        drop.appendChild(comprar);

    }catch (error) {
        console.log(error);
    }
    
}

function borrar_carrito(producto) {
    var formData = new FormData();
    formData.append('prod', producto);

    fetch('../includes/delete/delete_carrito.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
    window.location.href = "tienda.php";
}

function pedido(total) {
    var formData = new FormData();
    formData.append('total', total);

    fetch('../includes/hacer_pedido.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
    window.location.href = "tienda.php";
}