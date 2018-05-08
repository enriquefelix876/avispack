with(document.direccion){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && document.direccion.address.value.length<=25){
			ok=false;
			alert("Debe escribir una direccion siguiendo el formato pedido");
			address.focus();
		}
		if(ok){ submit(); }
	}
}