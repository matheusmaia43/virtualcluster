

var editor = ace.edit("editor");
editor.setTheme("ace/theme/twilight");
editor.getSession().setMode("ace/mode/c_cpp"); 

/*function exibe(cod){	
	editor.setValue(cod);
}*/
function exibe(form, func){	


}

function codigo(){
	var code = editor.getValue();
	document.getElementById('code').value = code;	
}


