with(document.pedido){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && document.pedido.paquete.value.length<=10){
			ok=false;
			alert("Debe proporcionar información clara, detallada y suficiente sobre su pedido");
			paquete.focus();
		}

		if(ok){ submit(); }
	}
}
