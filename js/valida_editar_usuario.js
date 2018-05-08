with(document.editar){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && fullname.value==""){
			ok=false;
			alert("Debe proporcionar su nombre");
			fullname.focus();
		}
		if(ok && username.value==""){
			ok=false;
			alert("Debe escribir proporcionar un nombre de usuario");
			username.focus();
        }
        if(ok && email.value==""){
			ok=false;
			alert("Debe escribir su email");
			email.focus();
        }
        if(ok && phonenumber.value==""){
			ok=false;
			alert("Debe escribir su numero telefonico");
			phonenumber.focus();
		}
		if(ok){ submit(); }
	}
}