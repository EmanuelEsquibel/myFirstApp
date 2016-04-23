(function () {
//Asocio el button con id boton a una variable boton.
var boton = document.getElementById('boton');
//El numero del contador se asocia con un nombre predeterminado, esto diferencia a los inputs que vayamos agregando.
var contador = 0;
//Declaramos la funcion que sera llamada por el evento onclick del boton mas adelante.
var crearobjeto = function () {
//Tomamos la id de los input text..
var text = document.getElementById('texto');
var text2 = document.getElementById('texto2');
var text3= document.getElementById('texto3');
var text4 = document.getElementById('texto4');
//y tomamos sus valoreres. Si hay alguno vacia se mostrara un alert avisandonos.
if (text.value == '' || text2.value == '' || text3.value == ''|| text4.value == '') {
    alert("Ingrese un valor");
    return 0;
} else {
    var valor = text.options[text.selectedIndex].text;
    var valor2 = text2.value;
    var valor3 = text3.value;
    var valor4 = text4.value;
}
//PRIMER INPUT TEXT
//Creamos el input text y lo asociamos a una variable input.
var input = document.createElement('input');
//Al boton creado le asignamos atributos.
input.setAttribute('type', 'text');
//Asignamos un atributo name con una id, compuesta por la palabra input mas el numero del contador.
contador = contador + 1;
var id = "item1" + contador;
input.setAttribute('name', id);
//Asignamos un atributo valor al input.
input.setAttribute('value', valor);
//Insertamos el elemento que acabamos de crear al documento.
document.body.appendChild(input);
//El valor ingresado se pasara al input y la caja de texto se vacía
text.value = '';
//SEGUNDO INPUT TEXT, Procedimiento igual al anterior pero con diferentes ids.
var input2 = document.createElement('input');
input2.setAttribute('type', 'text');
var id2 = "item2" + contador;
input2.setAttribute('name', id2);
input2.setAttribute('value', valor2);
document.body.appendChild(input2);
text2.value = '';
 //TERCER INPUT TEXT, Procedimiento igual al anterior pero con diferentes ids.
var input3 = document.createElement('input');
input3.setAttribute('type', 'text');
var id3 = "srvitem3" + contador;
input3.setAttribute('name', id3);
input3.setAttribute('value', valor3);
document.body.appendChild(input3);
text3.value = '';
 //CUARTO INPUT TEXT, Procedimiento igual al anterior pero con diferentes ids.
var input4 = document.createElement('input');
input4.setAttribute('type', 'text');
var id4 = "srvitem4" + contador;
input4.setAttribute('name', id4);
input4.setAttribute('value', valor4);
document.body.appendChild(input4);
text4.value = '';
//Creamos celdas filas para poner los inputs
var tabla = document.getElementById('tabla');
var tr = document.createElement('tr');
var td = document.createElement('td');
var td2 = document.createElement('td');
var td3 = document.createElement('td');
var td4 = document.createElement('td');
var tdEliminar = document.createElement('td');
var botonEliminar = document.createElement('input');
botonEliminar.setAttribute("type", "button");
botonEliminar.setAttribute("value", "Eliminar");
botonEliminar.setAttribute("id","botonsito");
//Asigno jerarquia
var form = document.forms[0];
var tbody = document.getElementById('cuerpo');
//TABLA ES HIJO DE FORM
//Asigno que DIV sera hijo de TABLA
tabla.appendChild(tbody);
tbody.appendChild(tr);
//A todos un TR le asignos lo hijos TD que creamos
tr.appendChild(td);
tr.appendChild(td2);
tr.appendChild(td3);
tr.appendChild(td4);
//TD para el boton eliminar
tr.appendChild(tdEliminar);
//Todos los inputs que creamos los hacemos hijos de los td que creamos.
td.appendChild(input);
td2.appendChild(input2);
td3.appendChild(input3);
td4.appendChild(input4);
//Asigno BOTON al td anterior.
tdEliminar.appendChild(botonEliminar);
//Remover filas
//Esta funcion va calculando el padre del hijo ingresado, hasta llegar a un nodo que contenga todo el contenido que queramos eliminar.
var remover = function(){
var td = botonEliminar.parentNode;
var tr = td.parentNode;
//var div = tr.parentNode;
var table = tr.parentNode;
table.removeChild(tr);
contador = contador - 1;
document.getElementById('maximo').value = contador;
}
document.getElementById('maximo').value = contador;
//Asocio evento Click con funcion remover al todos los botones elimar que creemos.
botonEliminar.addEventListener("click", remover);
};
boton.addEventListener("click", crearobjeto);
}());
