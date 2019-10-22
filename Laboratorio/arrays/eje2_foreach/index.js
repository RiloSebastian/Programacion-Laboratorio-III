let array = ["juan", "ana", true, 24, [1, 2, 3], { nombre: "jorge", edad: 30 }];

//foreach recibe un callback de una funcion que envia por parametros el elemento el indice y 
//la direccion del array en la que se encuentra. usualmente solo se usa el primer paramtero para poder
//interactuar con cada elemento del array. 

/* array.forEach(x => console.log(x)); */

array.forEach((a,b,c) => {
    console.log(a);
    console.log(b);
    console.log(c);
});