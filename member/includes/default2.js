function loadingtitle () { return 'Please Wait!!!' }
function loadingmsg () { return 'Loading Page...' }

function loadingstart () {
	$.messager.progress({
		title: loadingtitle(),
		msg: loadingmsg()
	});	
}

function loadingend () {
	$.messager.progress('close');
}