$(document).ready(function() {
	var hash = window.location.hash.substr(1);
	var href = $('#nav li a').each(function(){
		var href = $(this).attr('href');
		if(hash==href.substr(0,href.length-5)){
			var toLoad = hash+'.html #content';
			$('#content').load(toLoad)
		}											
	});
	$('#nav li a').click(function(){
		var toLoad = $(this).attr('href')+' #content';
		$('#content').hide('fast',loadContent);
		$('#load').remove();
		$('#wrapper').append('<span id="load">LOADING...</span>');
		$('#load').fadeIn('normal');
		window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-5);
		function loadContent() {
			$('#content').load(toLoad,'',showNewContent())
		}
		function showNewContent() {
			$('#content').show('normal',hideLoader());
		}
		function hideLoader() {
			$('#load').fadeOut('normal');
		}
		return false;		
	});
});
function ver(){
	document.getElementById('contenido').readOnly = true;
}function editar(){
	document.getElementById('contenido').readOnly = false;
}
function verTip(click_id){
	document.getElementById((click_id)+'Tip').readOnly = true;
    document.getElementById((click_id)+'Consejo').readOnly = true;
}
function editarTip(clicked_id){
	document.getElementById((clicked_id)+'Tip').readOnly = false;
    document.getElementById((clicked_id)+'Consejo').readOnly = false;
}
function verPaypal(click_id){
    document.getElementById((click_id)+'Precio').readOnly = true;
    document.getElementById((click_id)+'Descripcion').readOnly = true;
    document.getElementById((click_id)+'Codigo_paypal').readOnly = true;
}
function editarPaypal(clicked_id){
    document.getElementById((clicked_id)+'Precio').readOnly = false;
    document.getElementById((clicked_id)+'Descripcion').readOnly = false;
    document.getElementById((clicked_id)+'Codigo_paypal').readOnly = false;
}
function verTextoCatalogo(click_id){
	document.getElementById((click_id)+'TextoCatalogo').readOnly = true;
}
function editarTextoCatalogo(clicked_id){
	document.getElementById((clicked_id)+'TextoCatalogo').readOnly = false;
}
function switchProducto() {
	var a = document.querySelectorAll(".tamano");
    var t;
    for (t = 0; t < a.length; t++) {
        a[t].style.display = "none";
    }
    var x = document.getElementById("tamano").selectedIndex;
    var y = document.getElementById("tamano").options;
   	var tamano=(y[x].text);
   	var visible=document.querySelectorAll('.'+tamano);
    var i;
    for (i = 0; i < visible.length; i++) {
        visible[i].style.display = "inline";
    }
}
/*
function mostrar(click){
	var x = document.querySelectorAll(".ocultar");
    var t;
    for (t = 0; t < x.length; t++) {
        x[t].style.display = "none";
    }
	var mostrar=document.getElementById(click).id;
   	var ver=document.querySelectorAll('.'+mostrar+'Terminado');
    var i;
    for (i = 0; i < ver.length; i++) {
        ver[i].style.display = "inline";
    }
}
function cancelar(click){
	var ocultar=document.getElementById(click).id;
	var cancelar = document.querySelectorAll(".Editar"+ocultar+'Terminado');
    var t;
    for (t = 0; t < cancelar.length; t++) {
        cancelar[t].style.display = "none";
    }
}
*/
function switchMaterial() {
	var a = document.querySelectorAll(".material");
    var t;
    for (t = 0; t < a.length; t++) {
        a[t].style.display = "none";
    }
    var x = document.getElementById("material").selectedIndex;
    var y = document.getElementById("material").options;
   	var tamano=(y[x].text);
   	var visible=document.querySelectorAll('.'+tamano);
    var i;
    for (i = 0; i < visible.length; i++) {
        visible[i].style.display = "inline";
    }
}
function switchTamano() {
    var a = document.querySelectorAll(".tamanio");
    var t;
    for (t = 0; t < a.length; t++) {
        a[t].style.display = "none";
    }
    var x = document.getElementById("tamanio").selectedIndex;
    var y = document.getElementById("tamanio").options;
    var tamano=(y[x].text);
    var visible=document.querySelectorAll('.'+tamano);
    var i;
    for (i = 0; i < visible.length; i++) {
        visible[i].style.display = "inline";
    }
}