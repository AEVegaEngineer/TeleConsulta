jQuery(function($){
	/*
	$.datepicker.regional['es'] = {
	 	dateFormat: 'dd/mm/yy',
		closeText: 'Cerrar',
		prevText: '< Ant',
		nextText: 'Sig >',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		weekHeader: 'Sm',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	}; 
	*/
});

//$.datepicker.setDefaults($.datepicker.regional['es']);
//$.datepicker.setDefaults({ changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy'});

$(document).ready(function(){
	// si se han modificado los selects de reserva, se habilita el botón de siguiente
	$('#btn-agendar').attr('disabled',true);
	var especialidadSelected = 0, especialistaSelected = 0, fechaSelected = 0;
	$('#selEspecialidad').change(function(){
		checkSelected();
	});
	$('#selEspecialista').change(function(){
		checkSelected();
	});
	$('#selEspecialista').change(function(){
		checkSelected();
	});
	$('#fechaDisponible').change(function(){
		checkSelected();
	});
	function checkSelected(){
		if ($('#selEspecialidad').val() != null && $('#selEspecialista').val() != null && $('#fechaDisponible').val() != "")
		{
			$('#btn-agendar').attr('disabled',false);
		}
	}

	// modifica el botón de pago
	$('.mercadopago-button').addClass('btn').addClass('btn-block');
	// si se hace clic en el botón de mercadopago se asume que se ha pagado
	var clickEnPago = 0;
	$('#btn-pago').attr('disabled',true);
	$('.mercadopago-button').click(function(){
		$('#btn-pago').attr('disabled',false);
	});


	// Inicializa los tooltips
	$(function () {
	  	$('[data-toggle="tooltip"]').tooltip();
	});


	/*
	$( function() {
	    $( "#tabs" ).tabs();
	} );
	*/
	// datepicker setup
	$('.datepicker').datepicker({
		language: 'es-ES',
	    format: 'dd/mm/yyyy',
	    todayHighlight:'TRUE',
	    autoclose: true,
	    startDate: '-0d'
	});
	$('#calendar > div.fc-view-container > div > table > tbody > tr > td > div > div > div:nth-child(2) > div.fc-highlight-skeleton > table > tbody > tr > td.fc-highlight').click(function(){
		alert("se ha seleccionado un dia");
	});

	//var especialidades = ['Cardiología','Dermatología','Neurología'];
	var especialidades = [{'01':'Cardiología'},{'02':'Dermatología'},{'03':'Neurología'}];
	$.each(especialidades,function(index,value){ 
	    $.each(value, function(index2, value2) {
			$('#selEspecialidad').append('<option value="'+index2+'">'+value2+'</option>').val(index2);
	    }); 
	});
	



	$('#selEspecialidad').change(function(){
		if($('#selEspecialidad').val() == "01")
		{
			$('#selEspecialista')
			.find('option')
			.remove()
			.end()
		    .append('<option value="Luis_Marquez">Luis Marquez</option>').val('Luis_Marquez')
		    .append('<option value="Rebeca_Pino">Rebeca Pino</option>').val('Rebeca_Pino')
		    .append('<option value="Pedro_Lopez">Pedro Lopez</option>').val('Pedro_Lopez');
		}
		else if ( $('#selEspecialidad').val() == "02" )
		{
			$('#selEspecialista')
			.find('option')
			.remove()
			.end()
		    .append('<option value="Luis_Marquez">Luis Marquez</option>').val('Luis_Marquez')
		    .append('<option value="Pedro_Lopez">Pedro Lopez</option>').val('Pedro_Lopez');
		}
		else if ( $('#selEspecialidad').val() == "03" )
		{
			$('#selEspecialista')
			.find('option')
			.remove()
			.end()
	    	.append('<option value="Pedro_Lopez">Pedro Lopez</option>').val('Pedro_Lopez');
		}
		
	});
	if(window.matchMedia("(max-width: 767px)").matches){
		// EL viewport es menor de 768 pixeles de ancho. Esto es un dispositivo móvil.


    } else{
    	// EL viewport es mayor o igual a 768 pixeles de ancho. Esto es una tablet o pc.
    	/***************************ANIMACIONES DE VENTANA****************************/
		var cssBegin = {'max-width' : calcularWidth(8)+"%", 'width' : calcularWidth(8)+"%", 'flex' : calcularWidth(8)+"%"}; 
	
		var cssObj = {'max-width' : calcularWidth(2)+"%", 'width' : calcularWidth(2)+"%", 'flex' : calcularWidth(2)+"%"};

		$("#lbl-agendar").css(cssBegin); 
		$("#lbl-pago").css(cssObj); 
		$("#lbl-ingreso").css(cssObj); 
		$("#lbl-ingresar").css(cssObj); 
		$("#tab-pago").hide();
		$("#tab-ingreso").hide();

		$('#btn-agendar').click(function(){

			$( "#lbl-agendar" ).animate(cssObj, 1000, function() {// Animation complete.
			});
			$( "#lbl-pago" ).animate(cssBegin, 1000, function() {// Animation complete.
			});
			$("#tab-agendar").slideToggle();
	        $("#tab-pago").slideToggle();
			/*
			$( "#lbl-agendar" ).animate({			
			    opacity: 0.25,
			    left: "+=50",
			    height: "toggle",
			    width: calcularWidth(2)+"%"
			}, 1000, function() {
			    // Animation complete.
			});
			*/
		});
		$('#btn-pago').click(function(){
			$( "#lbl-pago" ).animate(cssObj, 1000, function() {// Animation complete.
			});
			$( "#lbl-ingreso" ).animate(cssBegin, 1000, function() {// Animation complete.
			});
			$("#tab-pago").slideToggle();
	        $("#tab-ingreso").slideToggle();
		});
		$('#btn-back-agendar').click(function(){
			$( "#lbl-ingreso" ).animate(cssObj, 1000, function() {// Animation complete.
			});
			$( "#lbl-agendar" ).animate(cssBegin, 1000, function() {// Animation complete.
			});
			$("#tab-ingreso").slideToggle();
	        $("#tab-agendar").slideToggle();
		});
    }
	
});
function calcularWidth(colwidth)
{
	var width = colwidth * 100 / 12;
	return width;
}



		