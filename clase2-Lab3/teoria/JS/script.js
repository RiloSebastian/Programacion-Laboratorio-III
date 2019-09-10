var btnSaludar

window.addEventListener('load',function() {
    btnSaludar= document.getElementById("btnSaludar");
    btnSaludar.addEventListener('click',function(){
        console.log("hola mundo");
    });
    btnSaludar.addEventListener('click',function(){
        console.log("chau mundo");
    });
});
