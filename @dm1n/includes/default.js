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
	$("#logout-link").click();
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

function tab1(pageId,div) {
	loadingstart();	
	if(cekzzz()) {
		var a = div.parentNode.getElementsByTagName("li");
		for (var j = 0, len = a.length; j < len; j++ ) {a[ j ].className = '';}
		div.className = 'selected';
		if(pageId!='') $('#the_content').load(pageId+'.php',function() {loadingend();});
		else loadingend();
		event.stopPropagation();
	}
	else  clogout ();
}


function tab2(pageId,div) {
	loadingstart();	
	if(cekzzz()) {	
		var b = div.parentNode.getElementsByTagName("li");
		for (var i = 0, len = b.length; i < len; i++ ) {b[ i ].className = '';}
		div.className = 'selected';
//		alert(pageId);
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
		$('#dialog5').dialog({
		title: chPassword(),
		width: 400,
		height: 200,
		closed: false,
		cache: false,
		href: 'password.php?id='+ziz,
		modal: true  
		});
		loadingend ();
	}
	else  clogout ();
}

function ckNumber(zval) {
	var valz = zval.value;
	if(isNaN(valz) && valz!='' ) {
		$.messager.alert( errProc(), onlyNumber (), 'error' );
		zval.value='';
		zval.focus();
		return false;
	}
	else {
		if(valz=='') zval.value='';
	}
}

function cNumber(zval, decz) {
	var valz = zval.value.replace(/\,/g, '');
	if(isNaN(valz) && valz!='' ) {
		$.messager.alert( errProc(), onlyNumber (), 'error' );
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

function loadpagez(zlink) {
	loadingstart ();
	
	if(cekzzz()) {
		if(zlink!='') $('#c_content').load(zlink,function() {
			loadingend ()
			});
		else loadingend ();
	}
	else  clogout ();		
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
