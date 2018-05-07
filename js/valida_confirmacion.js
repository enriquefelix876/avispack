with(document.confirmar){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && valor.value==""){
			ok=false;
			alert("Escriba el valor del pedido");
			username.focus();
		}
		if(ok && detalle.value==""){
			ok=false;
			alert("Escriba los detalles del producto a enviar");
			password.focus();
		}
		if(ok){ submit(); }
	}
}