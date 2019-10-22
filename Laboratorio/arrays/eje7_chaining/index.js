let array = ["juan", "ana", "julia", "adrian", "lucia"];
let numeros =[1,2,3,4,5,6,7];

let personas = [
    {nombre : "pepe", edad : 20,sexo:'m'},
    {nombre : "carlos", edad : 30, sexo:'m'},
    {nombre : "julia", edad : 40, sexo:'f'},
    {nombre : "rigoberta", edad : 45 ,sexo:'f'}
];

 let promedioEdad = personas.filter( persona => persona.sexo === 'm')
                                    .map(hombre => hombre.edad )
                                        .reduce((suma, edad, indice, array)=> suma + edad/array.length, 0);

console.log(promedioEdad);