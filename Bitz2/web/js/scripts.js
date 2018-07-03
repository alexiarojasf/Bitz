$(document).ready(function(){
  $('.modal').modal();
});

//-- Script de Slider -->
$(document).ready(function(){
$('.slider').slider({full_width: true});
});
//-- Script de Menu lateral -->
$(".button-collapse").sideNav();
//--Script de Paralax-->

$(document).ready(function(){
$('.parallax').parallax();
});
//--Script de Menu desplegable movil-->
$(".button-collapse").sideNav();


//--Script de idiomas
$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false,
      hover: true,
      gutter: 0,
      belowOrigin: false,
      alignment: 'left',
      stopPropagation: false 
    }
  );

//--Script de SideNav Usuario
$(".button-collapse").sideNav();


//--Script de Carrousel
$('.carousel.carousel-slider').carousel({fullWidth: true});

//--Script de Autocompletar
$('input.autocomplete').autocomplete({
    data: {
      "Apple": null,
      "Microsoft": null,
      "Google": 'https://placehold.it/250x250'
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
  });
      

  function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

    