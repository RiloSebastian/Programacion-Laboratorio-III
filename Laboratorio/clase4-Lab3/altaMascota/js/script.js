var frm;
let Mascotas= Array();

window.addEventListener("load",inicializarManejadores);

function inicializarManejadores(){

    frm= document.forms[0];

    frm.addEventListener("submit",manejadorSubmit);

    
}

function manejadorSubmit(e){
    e.preventDefault();

    let nuevaMascota= obtenerMascota(e.target);
    Mascotas.push(nuevaMascota);  
    document.getElementById("tabla").innerHTML = "";
    document.getElementById("tabla").appendChild(crearTabla(Mascotas));
    console.log(Mascotas);
}


function obtenerMascota(frm){
    let nombre;
    let edad;
    let tipo;
    let vacunado;
    let castrado;
    let desparacitado;
    let alimento;

    for(elemento of frm.elements){

        switch(elemento.name){

            case "nombre":
                nombre = elemento.value;
                break;

            case "edad":
                edad = parseInt(elemento.value);
                break;

            case "tipo":
                if(elemento.checked){

                    tipo = elemento.value;
                }
                break;

            case "vacunado":
                vacunado = elemento.checked;
                break;

            case "castrado":
                castrado = elemento.checked;
                break;

            case "desparasitado":
                desparacitado = elemento.checked;
                break;

            case "alimento":
                alimento = elemento.value;
                break;

        }
        
    }
    return new Mascota(nombre,edad,tipo,castrado,vacunado,desparacitado,alimento);
}