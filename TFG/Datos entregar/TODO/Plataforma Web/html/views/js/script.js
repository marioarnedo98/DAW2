/*=============================================
SLIDE            
=============================================*/
var numeroSlide = 1;
var formatearLoop = false;
var cantidadImg = $("#slide ul li").length;

$("#slide ul").css({"width": (cantidadImg*100) + "%"})
$("#slide ul li").css({"width": (100/cantidadImg) + "%"})

/* INDICADORES */

for(var i= 0; i < cantidadImg; i++){

	$("#indicadores").append('<li role-slide="'+(i+1)+'"><span class="fa fa-circle"></span></li>');

}


$("#indicadores li").click(function(){

	 var roleSlide = $(this).attr("role-slide");
			
	 $("#slide ul li").css({"display":"none"});
			
	 $("#slide ul li:nth-child("+roleSlide+")").fadeIn();
			
	 $("#indicadores li").css({"opacity":".5"});
			
	 $("#indicadores li:nth-child("+roleSlide+")").css({"opacity":"1"});

	 formatearLoop = true;

	numeroSlide = roleSlide;

})

/* FLECHA AVANZAR */

function avanzar(){

	if(numeroSlide >= cantidadImg){numeroSlide = 1;}

	else{numeroSlide++}

	$("#slide ul li").css({"display":"none"});
			
	$("#slide ul li:nth-child("+numeroSlide+")").fadeIn();
			
	$("#indicadores li").css({"opacity":".5"});
			
	$("#indicadores li:nth-child("+numeroSlide+")").css({"opacity":"1"});
}


$("#slideDer").click(function(){

	avanzar();

	formatearLoop = true;

})

/* FLECHA RETROCEDER */

$("#slideIzq").click(function(){

	if(numeroSlide <= 1){numeroSlide = cantidadImg;}

	else{numeroSlide--}


	$("#slide ul li").css({"display":"none"});
			
	$("#slide ul li:nth-child("+numeroSlide+")").fadeIn();
			
	$("#indicadores li").css({"opacity":".5"});
			
	$("#indicadores li:nth-child("+numeroSlide+")").css({"opacity":"1"});

	formatearLoop = true;

})

/* LOOP */

setInterval(function(){

	if(formatearLoop == true){

		formatearLoop = false;
	}

	else{

	avanzar();

	}

},5000);

/*=====  Fin de SLIDE  ======*/

/*=============================================
GALERÍA         
=============================================*/
$("#galeria .imagen a").fancybox({
	openEffect  : 'elastic',
	closeEffect  : 'elastic',
	openSpeed  : 150,
	closeSpeed : 150,
	helpers : {title :{type : 'inside'}}

});

/*=====  Fin de GALERÍA   ======*/

/*=============================================
SCROLL      
=============================================*/

$("#main-menu ul li a").click(function(e){
	e.preventDefault();

	var href = $(this).attr("href");

	$(href).animatescroll({

		scrollSpeed:2000,
		easing:"easeOutSine"

	});

});

$.scrollUp({

	scrollText:"",
	scrollSpeed: 1500,
	easingType: "easeOutSine"

});

/*=====  Fin de SCROLL   ======*/

/*=============================================
VALIDAR MENSAJES
=============================================*/

function validarMensaje(){

	nombre = $("#nombre").val();
	mensaje = $("#mensaje").val();

	if(nombre != ""){

	

			$("#nombre").after('<div class="alert alert-warning">No se permite que el nombre esté vacio.</div>');


	}

	else if(mensaje != ""){

		var caracteres = mensaje.length;
		var expresion = /^[a-zA-Z0-9\s]*$/;

		if(!expresion.test(mensaje)){

			$("#mensaje").after('<div class="alert alert-warning">No se permiten caracteres especiales.</div>');

			return false;

		}


	}

	return true;

}
if ($('#nav-menu-container').length) {
	var $mobile_nav = $('#nav-menu-container').clone().prop({
		id: 'mobile-nav'
	});
	$mobile_nav.find('> ul').attr({
		'class': '',
		'id': ''
	});
	$('body .main-menu').append($mobile_nav);
	$('body .main-menu').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-code"></i><span class="menu-title">Menu</span> </button>');
	$('body .main-menu').append('<div id="mobile-body-overly"></div>');
	$('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

	$(document).on('click', '.menu-has-children i', function (e) {
		$(this).next().toggleClass('menu-item-active');
		$(this).nextAll('ul').eq(0).slideToggle();
		$(this).toggleClass("lnr-chevron-up lnr-chevron-down");
	});

	$(document).on('click', '#mobile-nav-toggle', function (e) {
		$('body').toggleClass('mobile-nav-active');
		$('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
		$('#mobile-body-overly').toggle();
	});

	$(document).on('click', function (e) {
		var container = $("#mobile-nav, #mobile-nav-toggle");
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			if ($('body').hasClass('mobile-nav-active')) {
				$('body').removeClass('mobile-nav-active');
				$('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
				$('#mobile-body-overly').fadeOut();
			}
		}
	});
} else if ($("#mobile-nav, #mobile-nav-toggle").length) {
	$("#mobile-nav, #mobile-nav-toggle").hide();
}


//------- Sticky Main Menu js --------//  


window.onscroll = function () {
	stickFunction()
};

var navbar = document.getElementById("main-menu");
var sticky = navbar.offsetTop;

function stickFunction() {
	if (window.pageYOffset >= sticky) {
		navbar.classList.add("sticky");
		$(".top-post-area").css("margin-top", "80px");
	} else {
		navbar.classList.remove("sticky");
		$(".top-post-area").css("margin-top", "0px");
	}
}
