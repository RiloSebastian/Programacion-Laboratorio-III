function Mascota(nombre, edad, tipo, castrado, vacunado, desparacitado, alimento){
    this.nombre= nombre;
    this.edad = edad;
    this.tipo = tipo;
    this.castrado= castrado;
    this.vacunado = vacunado;
    this.desparacitado= desparacitado;
    this.alimento= alimento;

    Mascota.prototype.tostring = function(){
        return `hola soy ${ this.nombre } y tengo ${this.edad}`;
    }
}
