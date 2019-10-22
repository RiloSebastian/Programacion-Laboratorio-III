let array = ["juan", "ana", "julia", "adrian", "lucia"];
//some (recive callback, lo que retorna es un booleano)y every(si para todos los elementos fue true)
/* let numeros = [1,2,3,4,5,6];
let cuadrados;
cuadrados = numeros.map(elemento => elemento * elemento);
console.log(cuadrados);
pares = cuadrados.filter(elemento => elemento % 2 == 0);
console.log(pares);
let prueba = numeros
.map(elemento => elemento * elemento )
.filter(elemento => elemento % 3 == 0);
console.log(prueba); */

//filter justamente filtra los elementos de un array a otro a partir de los resultados de un condicional.
//si devuelve true el elemento entra al nuevo array de lo contrario no lo hace.

// includes devuelve un valor booleano indicando si el elemento en cuestion contiene 'x'.

let nombres = array.filter(elemento => elemento.includes('u'));

console.log(nombres);