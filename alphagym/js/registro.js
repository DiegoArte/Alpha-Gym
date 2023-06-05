function imagen(n) {
    const select=document.querySelector('.select');
    const div=document.querySelector('.subir_img');
    select.removeChild(div);
    const subir_img=document.createElement('FORM');
    subir_img.name='formuImg';
    subir_img.method='post';
    subir_img.classList.add('subir_img');
    subir_img.enctype='multipart/form-data';
    select.appendChild(subir_img);

    if (n==1) {
        const video=document.createElement('VIDEO');
        video.width="440";
        video.height="280";
        video.autoplay=true;
        const captureBtn=document.createElement('BUTTON');
        const capture=document.createElement('IMG');
        capture.src='img/capture_icon.png';
        capture.classList.add('boton_captura');
        captureBtn.appendChild(capture);
        const canvas=document.createElement('CANVAS');
        canvas.width="240";
        canvas.height="180";
        subir_img.appendChild(video);
        subir_img.appendChild(captureBtn);
        subir_img.appendChild(canvas);   
        
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                video.srcObject = stream;
            })
            .catch(function(error) {
                console.log('Error al acceder a la cámara: ', error);
            });

        captureBtn.addEventListener('click', function(event) {
            event.preventDefault();
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            canvas.toBlob(function(blob) {
                const file = new File([blob], 'foto.png', { type: 'image/png' });
                const formData = new FormData();
                formData.append('imagen', file);

                const xhr = new XMLHttpRequest();
    
                const url = 'includes/subir_img.php';
                xhr.open('POST', url, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        console.log('Imagen subida exitosamente');
                    } else {
                        console.log('Error al subir la imagen');
                    }
                };
                xhr.send(formData);
              }, 'image/png');
        });

    }else if(n==2) {
        const input_subir=document.createElement('INPUT');
        input_subir.type='file';
        input_subir.name='imagen';
        input_subir.accept='image/jpg, image/png, image/jpeg,';
        subir_img.appendChild(input_subir);
    }

    const submit=document.createElement('INPUT');
    submit.value='Subir';
    submit.type='submit';
    submit.name='Subir';
    submit.classList.add('signup');
    submit.classList.add('botonn');
    subir_img.appendChild(submit);
}