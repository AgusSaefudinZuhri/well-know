$(document).ready(function(){
//	var datepicker = $.fn.datepicker.noConflict(); // return $.fn.datepicker to previously assigned value
// var datepicker = $.fn.datepicker.noConflict(); // return $.fn.datepicker to previously assigned value
// $.fn.bootstrapDP = datepicker;   
    initializeJS();
	tcontentheight();

        $(window).resize(function(){if( !isMobile()) {tcontentheight();}});      
});