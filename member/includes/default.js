function cekzzz () {
	var result = null;
     $.ajax({
        url: 'cekzzz.php',
        type: 'get',
        dataType: 'html',
        async: false,
        success: function(data) {
            chasil = data.trim();
			if(chasil=='yes') result = true;
			else result = false;
        } 
     });
     return result;
}

function clogout () {
	location.reload();
//	$("#logout-link").click();
}



function loadingstart () {
	$.messager.progress({
		title: loadingtitle(),
		msg: loadingmsg()
	});	
}

function loadingend () {
	$.messager.progress('close');
}

$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window, .moxman-window").length) {
		e.stopImmediatePropagation();
	}
});

function tcontentheight() {
				var h = window.innerHeight;
				var hw = window.innerWidth;
//				var d = $("#the_content").prop('scrollHeight')- $("#the_content").position().top;
				var scroller = $("#the_content");
				var contents = scroller.wrapInner('<div>').children(); // wrap a div around the contents
				var d = contents.outerHeight(); // read the inner divs height
//				contents.replaceWith( contents.html() ); // unwrap the inner div
				if(h>d) {
					$("#the_content").height(h); //alert('h='+h); 
				}
				else {
					$("#the_content").height(d); //alert('d='+d); 
					}
				if(hw>768 && $("#left-menu").css("display") == "none") $(".toggle-nav").click();
}

function tcontentheightz() {
				var h = window.innerHeight - 55;
				var hw = window.innerWidth;
//				var d = $("#the_content").prop('scrollHeight')- $("#the_content").position().top;
				var scroller = $("#the_contentx");
				var contents = scroller.wrapInner('<div>').children(); // wrap a div around the contents
				var d = contents.outerHeight(); // read the inner divs height
//				contents.replaceWith( contents.html() ); // unwrap the inner div
				if(h>d) $("#the_contentx").height(h);
				else $("#the_contentx").height(d);
//				if(hw>768 && $("#left-menu").css("display") == "none") $(".toggle-nav").click();
}

function loadpagez(zlink) {
	loadingstart ();
	if(cekzzz()) {
//		alert(zlink);
		if(zlink!='') $('#the_content').load(zlink,function() {
			tcontentheight();
			$("html, body").animate({ scrollTop: 0 }, "fast");
			loadingend ()
			});
		else loadingend ();
	}
	else  clogout ();		
}


function logAccount(sAcc) {
	loadingstart ();
	if(cekzzz()) {
//		alert(zlink);
		$.get("logAccount.php?id="+sAcc, function(data){
    	    location.reload();
	    });
	}
	else  clogout ();		
}

function loadpagez2(zlink) {
	loadingstart ();
	if(cekzzz()) {
//		alert(zlink);
		if(zlink!='') $('#the_content').load(zlink,function() {
			tcontentheight();
			loadingend ()
			});
		else loadingend ();
	}
	else  clogout ();		
}

function cekWidth() {
	var cWidth =window.innerWidth;
	if(cWidth<=768) $(".toggle-nav").click();
}

function tab1( pageId, div, xid ) {
	loadingstart();	
	if(cekzzz()) {
		$('.selected').removeClass('selected');	
		
		if( xid != '' ) var prmId = '?id='+xid; else var prmId='';
		div.className = 'selected';
		if(pageId!='') $('#the_content').load(pageId+'.php'+prmId,function() {
			$('#the_content').ready(function()
			{
				tcontentheight();
				
				$("html, body").animate({ scrollTop: 0 }, "fast");
				cekWidth();
				loadingend();
			});
			}).fadeIn('normal');
		else loadingend();
		event.stopPropagation();
	}
	else  clogout ();
}

function tab2(pageId,div) {

	loadingstart();	
	if(cekzzz()) {
		$('.selected').removeClass('arrow_carrot-down');	
		var b = div.parentNode.getElementsByTagName("li");
		for (var i = 0, len = b.length; i < len; i++ ) {b[ i ].className = '';}
		div.className = 'selected';
		if(pageId!='') $('#c_content').load(pageId,function() {loadingend();});
		else loadingend();
		event.stopPropagation();
	}
	else  clogout ();
}

function tab3(pageId,div) {
	loadingstart();	
	if(cekzzz()) {	
		var b = div.parentNode.getElementsByTagName("li");
		for (var i = 0, len = b.length; i < len; i++ ) {b[ i ].className = '';}
		div.className = 'selected';
		if(pageId!='') $('#x_content').load(pageId+'.php',function() {loadingend();});
		else loadingend();
		event.stopPropagation();
	}
	else  clogout ();
}

function tab4(x1,div) {
	var b = div.parentNode.getElementsByTagName("li");
	for (var i = 0, len = b.length; i < len; i++ ) {b[ i ].className = '';}
	div.className = 'selected';
	$('.tab4').hide();
	$('#tab4_'+x1).show();
	event.stopPropagation();
}


function l_profile(ziz) {
	loadingstart ();
	if(cekzzz()) {
		$('#dialog').dialog({
		title: 'Your Profile',
    width: 600,
    height: 500,
		closed: false,
		cache: false,
		href: 'profil.php?id='+ziz,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();
}

function l_password(ziz) {
	loadingstart ();
	if(cekzzz()) {
		$('#dialog').dialog({
		title: 'Your Profile',
		width: 400,
		height: 200,
		closed: false,
		cache: false,
		href: 'password.php',
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();
}

function cPhone (x) {
	var handphone = (x.value).trim();
	var cek	= handphone.replace(/\ /g, '').replace(/\-/g, '');
	if(isNaN(cek) && cek!='' ) {
		alert('The value is not valid!!!');
		x.value='';
		x.focus();
		return false;
	}

	else {
/*
		if(handphone.indexOf('62')=='-1') {
			var tstart0 = handphone.substr(0,1);
			var tstart1 = handphone.substr(0,2);
			if(tstart0=='0') handphone = '62'+handphone.substr(1);
			else handphone = '62'+handphone;
		}
*/
		x.value=handphone;	
	}
}


function cNumber(zval, decz) {
	var valz = zval.value.replace(/\,/g, '');
	if(isNaN(valz) && valz!='' ) {
		$.messager.alert( errProc(), onlyNumber(), "error" );
		zval.value='';
		zval.focus();
		return false;
	}
	else {
		if(valz=='') zval.value='';
		else {
			zval.value=parseFloat(valz).toFixed(decz).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");	
		}
	}
}

function get_jaringan (z) {
	loadingstart ();
	$('#li-gjaringan').click();
	loadpagez('gjaringan.php?id='+z+'&a1=dashboard.php');
	
}


function batal() { $("#dialog").dialog("close"); }
function batal1() { $("#dialog1").dialog("close"); }
function batal2() { $("#dialog2").dialog("close"); }
function batal3() { $("#dialog3").dialog("close"); }
function batal4() { $("#dialog4").dialog("close"); }
function batal5() { $("#dialog5").dialog("close"); }
function batal6() { $("#dialog6").dialog("close"); }
function batal7() { $("#dialog7").dialog("close"); }
function batal8() { $("#dialog8").dialog("close"); }
function batal9() { $("#dialog9").dialog("close"); }


function initializeJS() {

    //tool tips
//    $('.tooltips').tooltip();

    //popovers
//    $('.popovers').popover();

    //custom scrollbar
        //for html
    $("html").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '6', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: '', zindex: '1000'});
        //for sidebar
    $("#sidebar").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
        // for scroll panel
    $(".scroll-panel").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
    
    //sidebar dropdown menu
	$('#sidebar .mAlone').click(function () {
			$(".sub").slideUp(200);
			$('.menu-arrow').removeClass('arrow_carrot-down');
			$('.menu-arrow').removeClass('arrow_carrot-right');
			$('.menu-arrow').addClass('arrow_carrot-right');
	});

    $('#sidebar .sub-menux').click(function () {
//		alert('x');
//		var tparent = $(this).parent();
//		var tsub	= tparent.children('ul');
//		$(tsub).hide();
//        var last = $('.sub-menu.open', $('#sidebar'));  
//		alert(last.id);      
//        $('.menu-arrow').removeClass('arrow_carrot-right');
//        $('.menu-arrow').removeClass('arrow_carrot-down');
//		$().hide();
//        $('.sub', last).slideUp(200);
        var subx = $(this).parent().children(".sub");
		var arrow = $(this).parent().children(".menu-arrow");
//		alert(subx.id);
        if (subx.is(":visible")) {
//            $('.menu-arrow').addClass('arrow_carrot-right');  
			$(arrow).removeClass('arrow_carrot-down');
			$(arrow).addClass('arrow_carrot-right');
            subx.slideUp(200);
        } else {
			$(".sub").slideUp(200);
			$('.menu-arrow').removeClass('arrow_carrot-down');
			$('.menu-arrow').removeClass('arrow_carrot-right');
			$('.menu-arrow').addClass('arrow_carrot-right');
			$(arrow).removeClass('arrow_carrot-right');
			$(arrow).addClass('arrow_carrot-down');
            subx.slideDown(200);
        }
		$('#sidebar .sub-menu > .sub').click(
    function(e) {
        e.stopPropagation();
    }
);
//        var ox = ($(this).offset());
//        var diff = 200 - ox.top;
//		alert(diff);
/*        if(diff>0)
            $("#sidebar").scrollTo("-="+Math.abs(diff),500);
        else
            $("#sidebar").scrollTo("+="+Math.abs(diff),500);
			*/
    });

    // sidebar menu toggle
    $(function() {
        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('#container').addClass('sidebar-close');
                $('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                $('#container').removeClass('sidebar-close');
                $('#sidebar > ul').show();
            }
        }
        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });

    $('.toggle-nav').click(function () {
        if ($('#sidebar > ul').is(":visible") === true) {
            $('#main-content').css({
                'margin-left': '0px'
            });
            $('#sidebar').css({
                'margin-left': '-100%'
            });
            $('#sidebar > ul').hide();
            $("#container").addClass("sidebar-closed");
        } else {
            $('#main-content').css({
                'margin-left': '180px'
            });
            $('#sidebar > ul').show();
            $('#sidebar').css({
                'margin-left': '0'
            });
            $("#container").removeClass("sidebar-closed");
        }
    });

    //bar chart
    if ($(".custom-custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }

}

function isMobile() {
  try{ document.createEvent("TouchEvent"); return true; }
  catch(e){ return false; }
}