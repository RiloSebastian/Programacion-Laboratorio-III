let array = ["juan", "ana", "julia", "adrian", "lucia"];
let numeros =[1,2,3,4,5,6,7];
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

/* let nombres = array.filter(elemento => elemento.includes('u'));
console.log(nombres);
*/

//reduce es una funcion que trae el valor anterior provisto por la funcion callback y lo utiliza
//como parametro en la siguiente llamada a esta funcion. especialmente util para acumuladores y contadores
//pero tambien se le puede dar otros usos como sacar un promedio.
//reduce recibe hasta 4 parametros en el orden:
//primero valor anterior, 2do valor actual, indice , vector.

let suma = numeros.reduce((acumulador,elemento)=> acumulador+elemento , 0);
console.log(suma);
let promedio = numeros.reduce((acumulador,elemento)=> acumulador+elemento ) / numeros.length;
console.log(promedio);

let personas = [
    {nombre : "pepe", edad : 20},
    {nombre : "carlos", edad : 30},
    {nombre : "jose", edad : 40},
    {nombre : "talanga", edad : 45}
];

let promEdad = personas.reduce((acumulador, persona)=> acumulador+persona.edad);
