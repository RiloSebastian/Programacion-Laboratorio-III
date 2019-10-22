let array = ["juan", "ana", "julia", "adrian", "lucia"];
//some (recive callback, lo que retorna es un booleano)y every(si para todos los elementos fue true)
//map modifica todos los elementos del array, pero el cambio solo es temporal a no ser que estos elementos
//se guarde en otro array como el siguiente caso:
let numeros = [1,2,3,4,5,6];

let cuadrados;

cuadrados = numeros.map(elemento => elemento * elemento);

console.log(cuadrados);


let personas = [
    {nombre : "pepe", edad : 20},
    {nombre : "carlos", edad : 30},
    {nombre : "jose", edad : 40},
    {nombre : "talanga", edad : 45}
]

let nombres = personas.map(elemento => elemento.nombre);

console.log(nombres);

nombres.forEach(nombre=> {
    let item = document.createElement('li');
    item.textContent = nombre;
    document.getElementById('listaNombres').appendChild(item);

});