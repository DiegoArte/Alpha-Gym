const form=document.getElementById('signF');

form.addEventListener("submit", function (event){
    event.preventDefault();
    const nombre=document.forms["formuSign"]["nombre"].value;
    const apellidos=document.forms["formuSign"]["apellidos"].value;
    const email=document.forms["formuSign"]["email"].value;
    const usuario=document.forms["formuSign"]["usuario"].value;
    const contraseña=document.forms["formuSign"]["contraseña"].value;
    const edad=document.forms["formuSign"]["edad"].value;
    const peso=document.forms["formuSign"]["peso"].value;
    const altura=document.forms["formuSign"]["altura"].value;
    const datos=[nombre, apellidos, email, usuario, contraseña, edad, peso, altura];

    datos.forEach(e => {
        if(e==''){
            alert("Asegurate de llenar todos los campos");
            return false;
        }
    });

    if(contraseña.lenght<8){
        alert("La contraseña debe tener minimo 8 caracteres");
        return false;
    }

    document.forms["formuSign"].submit();

})