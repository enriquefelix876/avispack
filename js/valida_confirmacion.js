with(document.confirmar){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && valor.value==""){
			ok=false;
			alert("Escriba el valor del pedido");
			username.focus();
		}if(ok && isNaN(valor.value)){
			alert("Debe ingresar un valor numerico");
			username.focus();
		}if(ok && document.confirmar.detalle.value.length<=10){
			ok=false;
			alert("Debe proporcionar información clara y detallada de la compra");
			password.focus();
		}
		if(ok){ submit(); }
	}
}