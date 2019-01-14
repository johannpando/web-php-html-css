
(function () {

    //JavScript en modo estricto
    "use strict";

})();


$(function () {

//Agregar clase a menú
    $('body.index header.site-header nav a:contains("Inicio")').addClass('activo');
    $('body.sobremi .site-header nav a:contains("Acerca")').addClass('activo');
    $('body.precios header.site-header nav a:contains("Precios")').addClass('activo');
    $('body.contacto header.site-header nav a:contains("Contacto")').addClass('activo');

    /**Dejar la barra de menú fijada

    css:

    .fixed {
      position: fixed;
      width: 100%;
      top: 0;
      left: 0;
      z-index: 2;
    }
    */

    //var windowHeight = $(window).height();
    var windowHeight = 0;
    var barraAltura = $('.barra').innerHeight();

    $(window).scroll(menuFijo);

    function menuFijo() {
        var scroll = $(window).scrollTop();
        // console.log(scroll);
        // console.log(windowHeight);
        // console.log(barraAltura);
        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({
                'margin-top': barraAltura + 'px'
            });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({
                'margin-top': '0px'
            });
        }
    }

    menuFijo();

    /**FIN - Dejar la barra de menú fijada**/

    /** Añadiendo mapa **/
    if (document.querySelector('#mapa')) {
        var map = L.map('mapa', {
          // true by default, false if you want a wild map
          sleep: true,
          // time(ms) for the map to fall asleep upon mouseout
          sleepTime: 750,
          // time(ms) until map wakes on mouseover
          wakeTime: 750,
          // defines whether or not the user is prompted oh how to wake map
          sleepNote: true,
          // allows ability to override note styling
          sleepNoteStyle: { color: 'red' },
          // should hovering wake the map? (clicking always will)
          hoverToWake: true,
          // opacity (between 0 and 1) of inactive map
          sleepOpacity: .7
        }).setView([28.140231, -15.431417], 17);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([28.140231, -15.431417]).addTo(map)
            .bindPopup('Johan Pando - 2019')
            .openPopup()
            .bindTooltip('Mi casa')
            .openTooltip();

    }
    /** Fin mapa **/

});

eventListeners();

function eventListeners() {
    if(document.querySelector('#formulario')) {
      document.querySelector('#formulario').addEventListener('submit', validarRegistro);
    }
}

function validarRegistro(e) {

    document.querySelector('.boton').disabled = true;

    e.preventDefault();

    var nombre = document.querySelector('input[name="nombre"]').value,
        telefono = document.querySelector('input[name="telefono"]').value,
        correo = document.querySelector('input[name="correo"]').value,
        mensaje = document.querySelector('textarea[name="mensaje"]').value;


    if(nombre === '' || telefono === '' || correo === '' || mensaje === ''){
        // la validación falló
        swal({
          type: 'error',
          title: 'Error!',
          text: 'Todos los campos son obligatorios!'
        })
        document.querySelector('.boton').disabled = false;
    } else if (!validateEmail(correo)) {
      swal({
        type: 'error',
        title: 'Error!',
        text: 'El correo no es válido!'
      })
      document.querySelector('.boton').disabled = false;
    } else {
      var xhr = new XMLHttpRequest();

      // Creamos el FormData
      var datos = new FormData();
      datos.append('nombre', nombre);
      datos.append('telefono', telefono);
      datos.append('correo', correo);
      datos.append('mensaje', mensaje);

      // Abrimos la conexión
      xhr.open('POST', 'correo.php', true);

      // Ejecutamos respuesta
      xhr.onload = function() {
        if(this.status === 200){
          var respuesta = xhr.responseText;

          //console.log(respuesta);

          if(respuesta === 'correcto') {
            swal({
              type: 'success',
              title: 'Correo Enviado',
              text: 'El correo se ha enviado correctamente, se le contestará en breve'
            }).then((result) => {
              document.querySelector('#formulario').reset();
              window.location.replace("index.php");
            });

          }  else {
              // hubo un error
              swal({
                type: 'error',
                title: 'Error!',
                text: 'No se ha podido enviar el correo, inténtelo más tarde'
              }).then((result) => {
                document.querySelector('#formulario').reset();
                window.location.replace("index.php");
              });
          }
        }
      } // onload

      // Enviamos la consulta
      xhr.send(datos);
    }
}

function validateEmail(email)
{
    var re = /\S+@\S+/;
    return re.test(email);
}
