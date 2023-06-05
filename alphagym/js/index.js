document.addEventListener('DOMContentLoaded', function() {
    recomendados();
    navegacion();
    codeQR();
})

async function recomendados() {
    try {
        const lista=document.querySelector('.carousel__lista');

        const url='http://localhost:3000/llamar.php';
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


function navegacion() {
  const barra=document.querySelector('.barra');
  const sobre=document.querySelector('.main');
  const body=document.querySelector('body');

  window.addEventListener('scroll', function(){
      if(sobre.getBoundingClientRect().top<0){
          barra.classList.add('fijo');
          body.classList.add('fijo-body');
      }else{
          barra.classList.remove('fijo');
          body.classList.remove('fijo-body');
      }
  });

  const enlaces=document.querySelectorAll('.navegacion a');
    enlaces.forEach(enlace=>{
        enlace.addEventListener('click', function(e){
            e.preventDefault();
            const seccionScroll=e.target.attributes.href.value;
            const seccion=document.querySelector(seccionScroll);
            seccion.scrollIntoView({behavior: "smooth"});
        });
    });
}

function openModal(plan) {
    document.getElementById("overlay").style.display = "flex";
    const body=document.querySelector('body');
    body.classList.add('fijar');
    const formulario=document.querySelector('.modal');
    const diasInput=document.createElement('input');
    diasInput.type="number";
    diasInput.name="plan";
    diasInput.value=plan;
    diasInput.style.visibility="hidden";
    formulario.appendChild(diasInput);
}

function closeModal() {
    document.getElementById("overlay").style.display = "none";
    const body=document.querySelector('body');
        body.classList.remove('fijar');
}

function codeQR() {
    const image=document.querySelector('.qr'),
    input=document.querySelector('.qrcode'),
    api='https://api.qrserver.com/v1/',
    api2='create-qr-code/?size=150x150&data=';

    image.src=`${api}${api2}${input.value}`;
}

function descargarImagen() {
    var img = document.querySelector('.qr');
    var src = img.src;
  
    var canvas = document.createElement('canvas');
    canvas.width = img.naturalWidth;
    canvas.height = img.naturalHeight;
  
    var ctx = canvas.getContext('2d');
    ctx.drawImage(img, 0, 0);
  
    var link = document.createElement('a');
    link.href = canvas.toDataURL();
    link.download = 'qr_code.png';
  
    link.click();
  }