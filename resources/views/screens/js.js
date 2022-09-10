function primerA(){

	$.get('../annexes/primerArea.blade.php',function(mensaje,estado){

		document.getElementById('resultados').innerHTML=mensaje;
	})
}