with(document.home){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && paquete.value==""){
			ok=false;
			alert("Debe proporcionar información de su pedido");
			paquete.focus();
		}

		if(ok){ submit(); }
	}
}
