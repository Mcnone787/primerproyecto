let numeros_paginacion = document.querySelectorAll(".paginacion")
let paginacion_numeros = document.getElementById("paginacion_numeros")
let paginacionDFl = document.getElementById("paginacionDF")
let paginacionIzFl = document.getElementById("paginacionIzFl")
let i_paginas = 0;
let control;
//cojemos todos los elementos y le asignamos un evento de click haciendo referencia a la funcion de pagina_siguiente
numeros_paginacion.forEach(i => {
    i.addEventListener("click", pagina_siguiente)

})

//aqui no servira para cuando hagamos click a la flecha de la derecha podamos avanzar a la siguiente enumeracion disponible

function pagina_siguiente(event) {

    let pagina = event.target.getAttribute("data-pagina")

    let elementosMostrar = document.querySelectorAll(".lista" + pagina);
    let ListaAll = document.querySelectorAll(".listasC");

    ListaAll.forEach($i => {
        $i.classList.add("invisible")

    })
    console.log(ListaAll + "entra")
    let count_main = 0;
    elementosMostrar.forEach($i => {
        $i.classList.remove("invisible")
    })
}
paginacionDFl.addEventListener("click", () => {
    cambio_paginacion(false)
})

paginacionIzFl.addEventListener("click", () => {
    cambio_paginacion(true)
})

//funcion que nos permite poder mostrar la pagina clicada
function cambio_paginacion(control) {
    console.log(control)
    let listaactual = document.querySelectorAll(".pagina" + i_paginas)
    if (control == false) {
        i_paginas++;
    } else {
        i_paginas--;
        if (i_paginas < 0) {
            i_paginas++;
        }
    }
    let nuevalista = document.querySelectorAll(".pagina" + i_paginas)
    console.log(nuevalista)
    if (nuevalista.length <= 0) {

    } else {
        listaactual.forEach(i => {
            i.classList.add("invisible")
            i.classList.remove("visible")
        })
        console.log(numeros_paginacion)
        console.log(nuevalista)
        nuevalista.forEach(i => {
            i.classList.remove("invisible")
            i.classList.add("visible")
        })
    }
}