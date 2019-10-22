let array = ["juan", "ana", "julia", "adrian", "lucia"];
let numeros =[1,2,3,4,5,6,7];

let personas = [
    {nombre : "pepe", edad : 20,sexo:'m'},
    {nombre : "carlos", edad : 30, sexo:'m'},
    {nombre : "julia", edad : 40, sexo:'f'},
    {nombre : "rigoberta", edad : 45 ,sexo:'f'}
];
//chaining es un metodo para acumular y utilizar de corrido las funciones estipuladas para manejar
//de forma mas eficiente un verctor. escribiendolo de la manera debajo. las funciones se completan
//de arriba hacia abajo. el cahining de abajo esta echo para calcular el promedio de la edad de los hombres.
//primero se filtra el vector hasta que solo queden hombres con filter, luego se obtiene la edad de estos
//con .map y finalmente se saca el promedio de esta con .reduce. la variable promedioEdad va a guardar
// el resultado de este ultimo .reduce del chaining

 let promedioEdad = personas.filter( persona => persona.sexo === 'm')
                                    .map(hombre => hombre.edad )
                                        .reduce((suma, edad, indice, array)=> suma + edad/array.length, 0);

console.log(promedioEdad);