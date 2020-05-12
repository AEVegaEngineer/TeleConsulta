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
});



		